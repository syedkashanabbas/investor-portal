(function(){
  const $ = (s,r=document)=>r.querySelector(s);
  const $$ = (s,r=document)=>Array.from(r.querySelectorAll(s));
  const folders = JSON.parse($('#seedFolders')?.textContent||'[]');
  const files   = JSON.parse($('#seedFiles')?.textContent||'[]');

  // Build map
  const byId = Object.fromEntries(folders.map(f=>[f.id,f]));
  folders.forEach(f=>f.children=[]);
  folders.forEach(f=>{ if(f.parent) byId[f.parent].children.push(f); });
  const root = folders.find(f=>f.parent===null);

  let currentFolder = 'root';
  let viewMode = 'grid'; // 'grid' | 'list'
  let selection = new Set();

  const docTree = $('#docTree');
  const explorer = $('#explorer');
  const crumbs = $('#crumbs');
  const emptyState = $('#emptyState');
  const selCount = $('#selCount');
  const btnDownloadSel = $('#btnDownloadSel');

  const qSearch = $('#qSearch');
  const fType = $('#fType');
  const fTag = $('#fTag');
  const fSort = $('#fSort');

  $('#btnGrid')?.addEventListener('click', ()=>{ explorer.classList.remove('list'); explorer.classList.add('grid'); viewMode='grid'; render(); });
  $('#btnList')?.addEventListener('click', ()=>{ explorer.classList.remove('grid'); explorer.classList.add('list'); viewMode='list'; render(); });

  [qSearch,fType,fTag,fSort].forEach(el => el && el.addEventListener('input', render));

  function buildTree(node, ul){
    const li = document.createElement('li');
    li.dataset.id = node.id;
    li.innerHTML = `
      <div class="node">
        <i class="fas fa-folder${node.children.length ? '' : '-open'} text-warning"></i>
        <span>${node.name}</span>
      </div>
    `;
    li.addEventListener('click', (e)=>{ e.stopPropagation(); go(node.id); });
    ul.appendChild(li);

    if(node.children.length){
      const c = document.createElement('ul');
      c.className = 'children list-unstyled';
      node.children.forEach(ch => buildTree(ch, c));
      ul.appendChild(c);
    }
  }

  function go(folderId){
    currentFolder = folderId;
    selection.clear();
    highlightTree();
    render();
  }

  function highlightTree(){
    $$('#docTree li').forEach(li=> li.classList.toggle('active', li.dataset.id===currentFolder));
    // breadcrumbs
    const chain = [];
    let cur = byId[currentFolder];
    while(cur){ chain.unshift(cur.name); cur = byId[cur.parent]; }
    crumbs.textContent = chain.join(' / ');
  }

  function iconFor(ext){
    const map = {
      pdf:'fa-file-pdf text-danger', doc:'fa-file-word text-primary', docx:'fa-file-word text-primary',
      xls:'fa-file-excel text-success', xlsx:'fa-file-excel text-success',
      ppt:'fa-file-powerpoint text-warning', pptx:'fa-file-powerpoint text-warning',
      zip:'fa-file-archive text-secondary', csv:'fa-file-csv text-success',
      jpg:'fa-file-image text-info', jpeg:'fa-file-image text-info', png:'fa-file-image text-info'
    };
    return map[ext?.toLowerCase()] || 'fa-file text-muted';
  }

  function humanSize(b){
    const u=['B','KB','MB','GB']; let i=0, n=b;
    while(n>=1024 && i<u.length-1){ n/=1024; i++; }
    return `${n.toFixed(n>=100||i===0?0:1)} ${u[i]}`;
  }

  function itemTpl(f){
    const icon = iconFor(f.ext);
    const tags = (f.tags||[]).map(t=>`<span class="badge bg-light text-dark me-1">${t}</span>`).join('');
    if(viewMode==='grid'){
      return `
        <div class="item" data-id="${f.id}">
          <div class="thumb mb-2 ratio ratio-16x9">
            <img src="${f.preview_img}" alt="" class="w-100 h-100" loading="lazy">
          </div>
          <div class="d-flex align-items-start justify-content-between">
            <div class="meta">
              <div class="fw-semibold text-truncate" title="${f.name}"><i class="fas ${icon} me-1"></i>${f.name}</div>
              <div class="kv">Updated ${f.updated_at} • ${humanSize(f.size)}</div>
              <div class="tags mt-1">${tags}</div>
            </div>
            <div class="ms-2">
              <input type="checkbox" class="form-check-input sel">
            </div>
          </div>
          <div class="mt-2 d-flex gap-2">
            <button class="btn btn-sm btn-outline-secondary btn-preview" data-id="${f.id}" data-bs-toggle="modal" data-bs-target="#previewModal"><i class="fas fa-eye"></i></button>
            <a class="btn btn-sm btn-dark" href="${f.download_url}" target="_blank"><i class="fas fa-download"></i></a>
          </div>
        </div>
      `;
    } else {
      return `
        <div class="item d-flex align-items-center justify-content-between" data-id="${f.id}">
          <div class="d-flex align-items-center gap-3 flex-grow-1">
            <input type="checkbox" class="form-check-input sel">
            <i class="fas ${icon}" style="width:18px;"></i>
            <div class="text-truncate" title="${f.name}">${f.name}</div>
          </div>
          <div class="d-none d-md-block" style="width:160px;"><span class="badge bg-light text-dark">${(f.tags||[]).join(', ')||'—'}</span></div>
          <div class="text-muted d-none d-sm-block" style="width:160px;">${f.updated_at}</div>
          <div class="text-muted" style="width:90px; text-align:right;">${humanSize(f.size)}</div>
          <div class="ms-2">
            <button class="btn btn-sm btn-outline-secondary btn-preview" data-id="${f.id}" data-bs-toggle="modal" data-bs-target="#previewModal"><i class="fas fa-eye"></i></button>
            <a class="btn btn-sm btn-dark" href="${f.download_url}" target="_blank"><i class="fas fa-download"></i></a>
          </div>
        </div>
      `;
    }
  }

  function filters(){
    const q = (qSearch?.value||'').toLowerCase();
    const ty = fType?.value||'';
    const tg = fTag?.value||'';

    return files.filter(f=>{
      const inFolder = (currentFolder==='root') ? true : f.folder===currentFolder;
      const okType = !ty || (f.ext===ty);
      const okTag = !tg || (f.tags||[]).includes(tg);
      const hay = `${f.name} ${(f.tags||[]).join(' ')}`.toLowerCase();
      const okQ = !q || hay.includes(q);
      return inFolder && okType && okTag && okQ;
    });
  }

  function sortList(list){
    switch((fSort?.value)||'updated_desc'){
      case 'name_asc':     return list.sort((a,b)=>a.name.localeCompare(b.name));
      case 'size_desc':    return list.sort((a,b)=>b.size-a.size);
      case 'size_asc':     return list.sort((a,b)=>a.size-b.size);
      default:             return list.sort((a,b)=>new Date(b.updated_at)-new Date(a.updated_at));
    }
  }

  function render(){
    const list = sortList(filters());
    explorer.innerHTML = list.map(itemTpl).join('');
    emptyState.style.display = list.length ? 'none' : '';

    // restore checkboxes
    $$('.item .sel', explorer).forEach(cb=>{
      const id = parseInt(cb.closest('.item').dataset.id);
      cb.checked = selection.has(id);
      cb.addEventListener('change', ()=>{
        cb.checked ? selection.add(id) : selection.delete(id);
        selCount.textContent = `${selection.size} selected`;
        btnDownloadSel.disabled = selection.size===0;
      });
    });

    // preview handlers
    $$('.btn-preview', explorer).forEach(btn=>{
      btn.addEventListener('click', ()=>{
        const id = parseInt(btn.getAttribute('data-id'));
        openPreview(id);
      });
    });

    selCount.textContent = `${selection.size} selected`;
    btnDownloadSel.disabled = selection.size===0;

    if (window.AOS) AOS.refresh();
  }

  function openPreview(id){
    const f = files.find(x=>x.id===id); if(!f) return;
    const body = $('#previewBody');
    const dl = $('#previewDownload'); dl.href = f.download_url;

    // basic preview logic:
    // images -> show image; pdf -> show placeholder iframe (download route often forces download, so we still show a hint)
    // others -> meta only
    if(['jpg','jpeg','png'].includes(f.ext)){
      body.innerHTML = `
        <div class="ratio ratio-16x9 rounded overflow-hidden">
          <img src="${f.preview_img}" class="w-100 h-100" alt="">
        </div>
        <div class="mt-3 small text-muted">Updated ${f.updated_at} • ${humanSize(f.size)} • ${f.ext.toUpperCase()}</div>
      `;
    } else if (f.ext==='pdf') {
      body.innerHTML = `
        <div class="ratio ratio-16x9 rounded overflow-hidden bg-light d-flex align-items-center justify-content-center">
          <div class="text-center">
            <i class="fas fa-file-pdf fa-2x text-danger mb-2"></i>
            <div class="mb-2">${f.name}</div>
            <div class="text-muted small">Preview is disabled in demo. Use Download to view.</div>
          </div>
        </div>
        <div class="mt-3 small text-muted">Updated ${f.updated_at} • ${humanSize(f.size)} • PDF</div>
      `;
    } else {
      body.innerHTML = `
        <div class="d-flex align-items-center">
          <i class="fas ${iconFor(f.ext)} fa-2x me-3"></i>
          <div>
            <div class="fw-semibold">${f.name}</div>
            <div class="text-muted small">Updated ${f.updated_at} • ${humanSize(f.size)} • ${f.ext.toUpperCase()}</div>
          </div>
        </div>
        <div class="mt-3 small">${(f.tags||[]).map(t=>`<span class="badge bg-light text-dark me-1">${t}</span>`).join('')}</div>
      `;
    }
  }

  // Bulk download = open each signed link (browser will prompt)
  $('#btnDownloadSel')?.addEventListener('click', ()=>{
    const ids = Array.from(selection);
    if(!ids.length) return;
    ids.forEach(id=>{
      const f = files.find(x=>x.id===id);
      if(f) window.open(f.download_url, '_blank');
    });
  });

  // Request Access (stub)
  $('#btnRequest')?.addEventListener('click', ()=>{
    toast('Request submitted. Team will review.');
  });

  // Tiny toast helper
  function toast(msg){
    let el = $('#docToast');
    if(!el){
      el = document.createElement('div');
      el.id = 'docToast';
      el.style.position='fixed'; el.style.bottom='16px'; el.style.right='16px'; el.style.zIndex='1080';
      document.body.appendChild(el);
    }
    el.innerHTML = `<div class="alert alert-dark shadow-sm border-0 py-2 px-3 mb-0">${msg}</div>`;
    setTimeout(()=>{ el.innerHTML=''; }, 1800);
  }

  // Init
  const rootUl = document.createElement('ul');
  rootUl.className = 'list-unstyled';
  buildTree(root, rootUl);
  docTree.appendChild(rootUl);
  go('root'); // sets crumb + render
})();
