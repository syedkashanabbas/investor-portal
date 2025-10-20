(function(){
  const $ = (s, r=document)=>r.querySelector(s);
  const $$ = (s, r=document)=>Array.from(r.querySelectorAll(s));

  const grid = $('#teaserGrid');
  const fSector = $('#fSector');
  const fStage  = $('#fStage');
  const fYear   = $('#fYear');
  const fSearch = $('#fSearch');

  // Filter logic
  function applyFilters(){
    const sector = fSector.value;
    const stage  = fStage.value;
    const year   = fYear.value;
    const q      = (fSearch.value||'').toLowerCase();

    $$('#teaserGrid > [data-sector]').forEach(col=>{
      const ok =
        (!sector || col.dataset.sector===sector) &&
        (!stage  || col.dataset.stage===stage) &&
        (!year   || col.dataset.year===year) &&
        (
          (col.dataset.title||'').includes(q) ||
          (col.dataset.company||'').includes(q) ||
          (col.dataset.tags||'').includes(q) ||
          q===''
        );
      col.style.display = ok ? '' : 'none';
    });
    if (window.AOS) AOS.refresh();
  }
  [fSector,fStage,fYear,fSearch].forEach(el=> el && el.addEventListener('input', applyFilters));
  document.addEventListener('DOMContentLoaded', applyFilters);

  // Details modal
  document.addEventListener('show.bs.modal', function(ev){
    if (ev.target.id !== 'detailModal') return;
    const btn = ev.relatedTarget;
    const data = btn?.getAttribute('data-details');
    if (!data) return;
    const p = JSON.parse(data);
    const body = $('#detailBody');
    const bullets = (p.tags||[]).map(t=>`<li>${escapeHtml(t)}</li>`).join('');
    body.innerHTML = `
      <div class="row g-3">
        <div class="col-12 col-md-6">
          <div class="ratio ratio-16x9 rounded overflow-hidden">
            <img src="https://picsum.photos/seed/${encodeURIComponent(p.seed||'future')}/1200/675" class="w-100 h-100 object-fit-cover" alt="">
          </div>
          <div class="small text-muted mt-2">${escapeHtml(p.company)} • ${escapeHtml(p.sector)} • Stage: ${escapeHtml(p.stage)}</div>
        </div>
        <div class="col-12 col-md-6">
          <h5 class="mb-1">${escapeHtml(p.title)}</h5>
          <div class="small text-muted mb-2">Target: <strong>${escapeHtml(p.target)}</strong> • Cap need: $${Number(p.cap_need||0).toLocaleString()}</div>
          <p class="text-muted">${escapeHtml(p.summary)}</p>
          <div class="small text-muted mb-1">Focus areas</div>
          <ul class="mb-0">${bullets||'<li>To be announced</li>'}</ul>
        </div>
      </div>
    `;
  });

  // Interest modal populate
  document.addEventListener('show.bs.modal', function(ev){
    if (ev.target.id !== 'interestModal') return;
    const btn = ev.relatedTarget;
    const d = btn?.getAttribute('data-interest');
    if (!d) return;
    const p = JSON.parse(d);
    $('#projectId').value = p.id;
    $('#projectTitle').value = p.title;
  });

  // Submit interest
  const submitBtn = $('#btnSubmitInterest');
  submitBtn?.addEventListener('click', async ()=>{
    const url = $('#interestUrl')?.value;
    const payload = {
      project_id: Number($('#projectId').value),
      name: $('#iName').value.trim(),
      email: $('#iEmail').value.trim(),
      note: $('#iNote').value.trim(),
    };
    if (!payload.name || !payload.email) {
      toast('Please add name & email.'); return;
    }
    submitBtn.disabled = true;
    const spinner = document.createElement('span');
    spinner.className = 'spinner-border spinner-border-sm ms-2';
    submitBtn.appendChild(spinner);
    try{
      const res = await fetch(url, {
        method:'POST',
        headers:{
          'Accept':'application/json',
          'Content-Type':'application/json',
          'X-CSRF-TOKEN': (document.querySelector('meta[name="csrf-token"]')?.content || '')
        },
        body: JSON.stringify(payload)
      });
      const data = await res.json();
      toast(data.msg || 'Submitted.');
      // close modal
      bootstrap.Modal.getInstance(document.getElementById('interestModal'))?.hide();
    }catch(e){
      toast('Could not submit right now.');
    }finally{
      submitBtn.disabled = false;
      spinner.remove();
    }
  });

  // tiny toast
  function toast(msg){
    let el = document.getElementById('miniToast');
    if(!el){
      el = document.createElement('div');
      el.id='miniToast';
      el.style.position='fixed'; el.style.bottom='16px'; el.style.right='16px';
      el.style.zIndex='1080';
      document.body.appendChild(el);
    }
    el.innerHTML = `
      <div class="alert alert-dark shadow-sm border-0 py-2 px-3 mb-0">${escapeHtml(msg)}</div>
    `;
    setTimeout(()=>{ el.innerHTML=''; }, 2000);
  }

  function escapeHtml(str){
    return (str||'').replace(/[&<>"']/g, (m)=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#3
