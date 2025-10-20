(function () {
  const el = (id) => document.getElementById(id);
  const seed = JSON.parse((el('seedLiveUpdates')?.textContent || '[]'));

  const colOpp = el('colOpportunity');
  const colProj = el('colProject');
  const colAlert = el('colAlert');

  const countOpp = el('countOpportunity');
  const countProj = el('countProject');
  const countAlert = el('countAlert');

  const fType = el('fType');
  const fChannel = el('fChannel');
  const fSeverity = el('fSeverity');
  const fSearch = el('fSearch');

  const btnPause = el('btnPause');
  const btnClear = el('btnClear');

  const tickerInner = el('tickerInner');

  let paused = false;
  let events = [...seed];      // all events
  let queue = [];              // incoming (simulated)
  let idSeq = Math.max(0, ...events.map(e => e.id || 0)) + 1;

  // --- rendering ---
  function pill(sev) {
    const map = {
      success: 'bg-success-subtle text-success',
      info: 'bg-primary-subtle text-primary',
      warning: 'bg-warning-subtle text-warning',
      danger: 'bg-danger-subtle text-danger'
    };
    return map[sev] || 'bg-light text-dark';
  }

  function card(e) {
    const badge = pill(e.severity);
    const tags = (e.tags || []).map(t => `<span class="tag">${t}</span>`).join('');
    const when = new Date(e.ts.replace(' ', 'T'));
    const time = isNaN(when.getTime()) ? e.ts : when.toLocaleString();

    return `
      <div class="update-card border p-3 mb-3" data-id="${e.id}">
        <div class="d-flex justify-content-between align-items-start">
          <div class="me-2">
            <div class="fw-semibold">${escapeHtml(e.title)}</div>
            <div class="text-muted update-meta">${escapeHtml(e.channel)} • ${time}</div>
          </div>
          <span class="badge ${badge}">${escapeHtml(cap(e.severity))}</span>
        </div>
        <div class="mt-2 text-muted">${escapeHtml(e.msg)}</div>
        <div class="mt-2">${tags}</div>
        <div class="mt-2">
          <button class="btn btn-sm btn-outline-secondary" data-detail='${escapeAttr(JSON.stringify(e))}'
            data-bs-toggle="modal" data-bs-target="#detailModal">Details</button>
        </div>
      </div>`;
  }

  function render() {
    // filter
    const q = (fSearch?.value || '').toLowerCase();
    const t = fType?.value || '';
    const ch = fChannel?.value || '';
    const sv = fSeverity?.value || '';

    const filtered = events.filter(e => {
      const okType = !t || e.type === t;
      const okCh = !ch || e.channel === ch;
      const okSv = !sv || e.severity === sv;
      const hay = `${e.title} ${e.msg} ${(e.tags||[]).join(' ')} ${e.channel} ${e.type}`.toLowerCase();
      const okQ = !q || hay.includes(q);
      return okType && okCh && okSv && okQ;
    });

    // group
    const opp = filtered.filter(e => e.type === 'opportunity');
    const proj = filtered.filter(e => e.type === 'project');
    const alr = filtered.filter(e => e.type === 'alert');

    colOpp.innerHTML = opp.map(card).join('') || `<div class="text-muted small">No opportunities.</div>`;
    colProj.innerHTML = proj.map(card).join('') || `<div class="text-muted small">No project updates.</div>`;
    colAlert.innerHTML = alr.map(card).join('') || `<div class="text-muted small">No alerts.</div>`;

    countOpp.textContent = opp.length;
    countProj.textContent = proj.length;
    countAlert.textContent = alr.length;

    // refresh AOS if present
    if (window.AOS) window.AOS.refresh();
  }

  // ticker
  function setTicker(items) {
    const line = items
      .slice(-8)
      .map(e => `${symbol(e.type)} ${e.title}`)
      .join(' • ');
    tickerInner.innerHTML = `<div class="ticker-track">${escapeHtml(line)}</div>`;
    const track = tickerInner.querySelector('.ticker-track');
    if (track) {
      track.style.display = 'inline-block';
      track.style.paddingLeft = '100%';
      track.style.animation = 'tickerMove 18s linear infinite';
    }
  }

  const style = document.createElement('style');
  style.textContent = `
  @keyframes tickerMove { from { transform: translateX(0); } to { transform: translateX(-100%); } }
  `;
  document.head.appendChild(style);

  function symbol(type) {
    if (type === 'opportunity') return '🟦';
    if (type === 'project') return '🟩';
    if (type === 'alert') return '🟥';
    return '⬜';
  }

  // details modal
  document.addEventListener('show.bs.modal', function (ev) {
    if (ev.target.id !== 'detailModal') return;
    const btn = ev.relatedTarget;
    const data = btn?.getAttribute('data-detail');
    const obj = data ? JSON.parse(data) : null;
    if (!obj) return;
    const body = document.getElementById('detailBody');
    const when = new Date(obj.ts.replace(' ', 'T'));
    body.innerHTML = `
      <div class="row g-3">
        <div class="col-12 col-lg-8">
          <div class="border rounded p-3 h-100">
            <div class="small text-muted">Title</div>
            <div class="fw-semibold">${escapeHtml(obj.title)}</div>
            <div class="small text-muted mt-3">Message</div>
            <div>${escapeHtml(obj.msg)}</div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="border rounded p-3 h-100">
            <div class="small text-muted">Type</div>
            <div class="fw-semibold text-capitalize">${escapeHtml(obj.type)}</div>
            <div class="small text-muted mt-2">Channel</div>
            <div class="fw-semibold">${escapeHtml(obj.channel)}</div>
            <div class="small text-muted mt-2">Severity</div>
            <div><span class="badge ${pill(obj.severity)}">${escapeHtml(cap(obj.severity))}</span></div>
            <div class="small text-muted mt-2">Time</div>
            <div class="fw-semibold">${isNaN(when.getTime()) ? obj.ts : when.toLocaleString()}</div>
            <div class="small text-muted mt-2">Tags</div>
            <div>${(obj.tags||[]).map(t=>`<span class="tag">${escapeHtml(t)}</span>`).join('')}</div>
          </div>
        </div>
      </div>
    `;
  });

  // controls
  [fType, fChannel, fSeverity, fSearch].forEach(i => i && i.addEventListener('input', render));

  btnPause?.addEventListener('click', () => {
    paused = !paused;
    btnPause.innerHTML = paused
      ? `<i class="fas fa-play"></i> Resume`
      : `<i class="fas fa-pause"></i> Pause`;
  });

  btnClear?.addEventListener('click', () => {
    events = [];
    render();
    setTicker(events);
  });

  // --- simulate incoming every 10s (replace with Echo/Pusher later) ---
  const samples = [
    {type:'opportunity', channel:'Deals', severity:'info', title:'Clinic Roll-Up Pitch', msg:'Sponsor open to 20% co-invest.' , tags:['Healthcare','Co-invest']},
    {type:'project', channel:'Projects', severity:'success', title:'Telemed App – Beta', msg:'Beta hits 1k MAU; crash rate <0.6%.', tags:['App','QOS']},
    {type:'alert', channel:'Risk', severity:'warning', title:'Vendor SLA Breach', msg:'ETL nightly lag exceeded 2 hours.', tags:['Data','ETL']},
    {type:'alert', channel:'Risk', severity:'danger', title:'Budget Overrun Risk', msg:'Warehousing robotics +9% forecast.', tags:['CapEx','Robotics']},
    {type:'project', channel:'Ops', severity:'info', title:'Data Center Retrofit', msg:'Cooling cutover scheduled Friday.', tags:['Infra','HVAC']},
  ];

  function pushRandom() {
    if (paused) return;
    const s = samples[Math.floor(Math.random() * samples.length)];
    const now = new Date();
    const evt = {
      id: idSeq++,
      ts: now.toISOString().slice(0,19).replace('T',' '),
      ...s
    };
    queue.push(evt);
  }

  function drainQueue() {
    if (paused) return;
    if (!queue.length) return;
    const e = queue.shift();
    events.push(e);
    render();
    setTicker(events);
    flashNew(e);
  }

  function flashNew(e) {
    const col = e.type === 'opportunity' ? colOpp : e.type === 'project' ? colProj : colAlert;
    const cardEl = col.querySelector(`.update-card[data-id="${e.id}"]`);
    if (!cardEl) return;
    cardEl.style.boxShadow = '0 0 0 3px rgba(13,110,253,.25)';
    setTimeout(() => { cardEl.style.boxShadow = ''; }, 500);
  }

  // optional: Laravel Echo (if loaded globally)
  if (window.Echo) {
    try {
      window.Echo.channel('live-updates')
        .listen('LiveUpdateEvent', (data) => {
          // expected: { id, ts, type, channel, title, msg, severity, tags:[] }
          queue.push(data);
        });
    } catch (_) {}
  }

  // utils
  function cap(s){ return (s||'').charAt(0).toUpperCase() + (s||'').slice(1); }
  function escapeHtml(str){
    return (str||'').replace(/[&<>"']/g, (m)=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[m]));
  }
  function escapeAttr(str){
    return (str||'').replace(/"/g,'&quot;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }

  // init
  render();
  setTicker(events);

  // timers
  setInterval(pushRandom, 10000);  // simulate in
  setInterval(drainQueue, 3000);   // render cadence
})();
