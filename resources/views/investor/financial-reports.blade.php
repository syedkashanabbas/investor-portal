
@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')

<div class="container-fluid py-4">
  <div class="overlay-local"><span>Coming Soon</span></div>
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Report Finanziari</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">Carica. Filtra. Confronta. Visualizza.</p>
    </div>
    <div class="d-flex gap-2" data-aos="fade-left">
      <div class="btn-group">
        <button class="btn btn-outline-secondary" id="btnExportCsv"><i class="bi bi-filetype-csv"></i> Esporta CSV</button>
        <button class="btn btn-outline-secondary" id="btnExportCsv"><i class="bi bi-filetype-csv"></i> Viste Salvate</button>
        <!--<button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">Viste Salvate</button>-->
        <!--<ul class="dropdown-menu dropdown-menu-end">-->
        <!--  <li><a class="dropdown-item" href="#" data-preset="latestQ">Ultimo Trimestre</a></li>-->
        <!--  <li><a class="dropdown-item" href="#" data-preset="annual">Solo Annuale</a></li>-->
        <!--  <li><a class="dropdown-item" href="#" data-preset="corp">Holding (Ethica Corp)</a></li>-->
        <!--</ul>-->
      </div>
      <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#uploadModal">
        <i class="bi bi-upload"></i> Carica
      </button>
    </div>
  </div>

  {{-- Filtri --}}
  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Azienda</label>
          <select id="fCompany" class="form-select">
            <option value="">Tutte</option>
            @foreach (collect($reports)->pluck('company')->unique() as $co)
              <option value="{{ $co }}">{{ $co }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-6 col-md-2">
          <label class="form-label small text-muted mb-1">Anno</label>
          <select id="fYear" class="form-select">
            <option value="">Tutti</option>
            @foreach (collect($reports)->pluck('year')->unique()->sortDesc() as $y)
              <option value="{{ $y }}">{{ $y }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-6 col-md-2">
          <label class="form-label small text-muted mb-1">Trimestre</label>
          <select id="fQuarter" class="form-select">
            <option value="">Tutti</option>
            <option>Q1</option><option>Q2</option><option>Q3</option><option>Q4</option><option value="Y">Annuale</option>
          </select>
        </div>
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Cerca</label>
          <input id="fSearch" class="form-control" placeholder="Titolo, periodo…">
        </div>
        <div class="col-12 col-md-2 d-flex align-items-end">
          <button id="fReset" class="btn btn-outline-secondary w-100">Reimposta</button>
        </div>
      </div>
    </div>
  </div>

  {{-- KPI Snapshot --}}
<div class="row g-3 mb-4">

  <div class="col-12 col-sm-6 col-lg-3" data-aos="zoom-in">
    <div class="card kpi-card h-100 border-0 shadow-sm">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <div class="small text-muted">Ricavi (somma)</div>
          <div class="display-6 fw-bold text-primary mb-2" id="kRevenue">
            ${{ number_format($snapshot['revenue']) }}
          </div>
        </div>
        <canvas id="sparkRev" class="sparkline"></canvas>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3" data-aos="zoom-in" data-aos-delay="50">
    <div class="card kpi-card h-100 border-0 shadow-sm">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <div class="small text-muted">EBITDA (somma)</div>
          <div class="display-6 fw-bold text-success mb-2" id="kEbitda">
            ${{ number_format($snapshot['ebitda']) }}
          </div>
        </div>
        <canvas id="sparkEbitda" class="sparkline"></canvas>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
    <div class="card kpi-card h-100 border-0 shadow-sm">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <div class="small text-muted">Margine Lordo (media)</div>
          <div class="display-6 fw-bold text-warning mb-2" id="kGM">
            {{ number_format($snapshot['gm']*100, 0) }}%
          </div>
        </div>
        <canvas id="sparkGM" class="sparkline"></canvas>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-lg-3" data-aos="zoom-in" data-aos-delay="150">
    <div class="card kpi-card h-100 border-0 shadow-sm">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <div class="small text-muted">Margine Netto (media)</div>
          <div class="display-6 fw-bold text-danger mb-2" id="kNM">
            {{ number_format($snapshot['nm']*100, 0) }}%
          </div>
        </div>
        <canvas id="sparkNM" class="sparkline"></canvas>
      </div>
    </div>
  </div>

</div>


  <div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
      <div class="h6 mb-0">Catalogo Report</div>
      <small class="text-muted">Ordina cliccando sulle intestazioni</small>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="reportsTable">
          <thead class="table-light">
            <tr>
              <th data-sort="company">Azienda</th>
              <th data-sort="title">Titolo</th>
              <th data-sort="period">Periodo</th>
              <th class="text-end" data-sort="revenue">Ricavi</th>
              <th class="text-end" data-sort="ebitda">EBITDA</th>
              <th class="text-end" data-sort="gm">ML</th>
              <th class="text-end" data-sort="nm">MN</th>
              <th data-sort="created">Caricato</th>
              <th data-sort="uploader">Da</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reports as $r)
              <tr class="report-row"
                  data-company="{{ $r['company'] }}"
                  data-year="{{ $r['year'] }}"
                  data-quarter="{{ $r['quarter'] }}"
                  data-title="{{ strtolower($r['title']) }}"
                  data-period="{{ strtolower($r['period']) }}"
                  data-revenue="{{ $r['revenue'] }}"
                  data-ebitda="{{ $r['ebitda'] }}"
                  data-gm="{{ $r['gm'] }}"
                  data-nm="{{ $r['nm'] }}"
                  data-created="{{ $r['created_at'] }}"
                  data-uploader="{{ $r['uploader'] }}">
                <td>{{ $r['company'] }}</td>
                <td>{{ $r['title'] }}</td>
                <td><span class="badge bg-dark-subtle text-dark">{{ $r['period'] }}</span></td>
                <td class="text-end">${{ number_format($r['revenue']) }}</td>
                <td class="text-end">${{ number_format($r['ebitda']) }}</td>
                <td class="text-end">{{ number_format($r['gm']*100,1) }}%</td>
                <td class="text-end">{{ number_format($r['nm']*100,1) }}%</td>
                <td>{{ $r['created_at'] }}</td>
                <td>{{ $r['uploader'] }}</td>
                <td class="text-end">
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-secondary" data-view='@json($r)' data-bs-toggle="modal" data-bs-target="#viewModal">Visualizza</button>
                    <a class="btn btn-sm btn-outline-dark" href="{{ $r['file'] }}" target="_blank">Scarica</a>
                    <button class="btn btn-sm btn-outline-dark" data-compare='@json($r)'>Confronta</button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Confronto Rapido --}}
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
      <div class="h6 mb-0">Confronto Rapido</div>
      <small class="text-muted">Scegli due righe → Confronta</small>
    </div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-12 col-lg-6">
          <div class="border rounded p-3 h-100" id="cmpA">Nessuna selezione</div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="border rounded p-3 h-100" id="cmpB">Nessuna selezione</div>
        </div>
      </div>
      <div class="mt-3">
        <div class="border rounded p-3 bg-light" id="cmpDiff">—</div>
      </div>
    </div>
  </div>

  {{-- Registro Attività --}}
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-0">
      <div class="h6 mb-0">Registro Attività</div>
    </div>
    <div class="card-body p-0">
      <ul class="list-group list-group-flush">
        @foreach ($audit as $a)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
              <span class="badge bg-secondary me-2">&nbsp;</span>
              <strong>{{ $a['action'] }}</strong> — {{ $a['what'] }}
            </span>
            <span class="text-muted small">{{ $a['by'] }} • {{ $a['at'] }}</span>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

</div>

{{-- Modale Caricamento --}}
<div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="bi bi-upload me-2"></i> Carica Report</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('investor.reports.upload') }}" class="dropzone dz-clickable border-2 border-dashed rounded p-5 bg-light" id="dzReports" method="post" enctype="multipart/form-data">
          @csrf
          <div class="dz-message text-center">
            <i class="bi bi-cloud-upload display-4 d-block mb-3 text-primary"></i>
            <span class="fs-5 fw-semibold">Trascina i file qui o clicca per caricare</span>
            <div class="text-muted small mt-1">PDF, XLSX, CSV fino a 10MB</div>
          </div>
        </form>
        <small class="text-muted d-block mt-3"><i class="bi bi-info-circle"></i> Demo: i file non verranno ancora salvati.</small>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

{{-- Modale Visualizzazione --}}
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="bi bi-bar-chart-line me-2"></i> Dettagli Report</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="viewBody">
        <div class="text-muted text-center py-5">Seleziona un report.</div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>


<style>
#reportsTable th { white-space: nowrap; cursor: pointer; }
#reportsTable td { vertical-align: middle; }
.dropzone.dz-drag-hover { background:#eaf4ff; border-color:#0d6efd; }
</style>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css">
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>

{{-- Charts --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function(){
  // Dropzone (demo)
  Dropzone.autoDiscover = false;
  new Dropzone('#dzReports', {
    paramName: 'file',
    maxFilesize: 10,
    acceptedFiles: '.pdf,.xlsx,.xls,.csv',
    autoProcessQueue: false
  });

  // Filters
  const fCompany = document.getElementById('fCompany');
  const fYear = document.getElementById('fYear');
  const fQuarter = document.getElementById('fQuarter');
  const fSearch = document.getElementById('fSearch');
  const fReset = document.getElementById('fReset');
  [fCompany,fYear,fQuarter,fSearch].forEach(el => el.addEventListener('input', applyFilters));
  fReset.addEventListener('click', ()=>{
    fCompany.value=''; fYear.value=''; fQuarter.value=''; fSearch.value='';
    applyFilters();
  });

  // Presets
  document.querySelectorAll('[data-preset]').forEach(a=>{
    a.addEventListener('click', e=>{
      e.preventDefault();
      const p = a.getAttribute('data-preset');
      if(p==='latestQ'){ fQuarter.value='Q1'; fYear.value='2025'; fCompany.value=''; fSearch.value=''; }
      if(p==='annual'){ fQuarter.value='Y'; fYear.value=''; fCompany.value=''; fSearch.value=''; }
      if(p==='corp'){ fCompany.value='Ethica Corp'; fYear.value=''; fQuarter.value=''; fSearch.value=''; }
      applyFilters();
    });
  });

  // Sorting
  let sortState = { key: null, dir: 1 };
  document.querySelectorAll('#reportsTable thead th[data-sort]').forEach(th=>{
    th.addEventListener('click', ()=>{
      const key = th.dataset.sort;
      sortState.dir = (sortState.key===key) ? -sortState.dir : 1;
      sortState.key = key;
      sortTable();
      applyFilters(); // keep filters and refresh charts
    });
  });

  function sortTable(){
    const tbody = document.querySelector('#reportsTable tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const getVal = (tr, k)=>{
      if(k==='created') return new Date(tr.dataset.created).getTime();
      if(['revenue','ebitda','gm','nm'].includes(k)) return parseFloat(tr.dataset[k]) || 0;
      return (tr.dataset[k]||'').toString().toLowerCase();
    };
    rows.sort((a,b)=>{
      const va = getVal(a, sortState.key), vb = getVal(b, sortState.key);
      if(va<vb) return -1*sortState.dir;
      if(va>vb) return  1*sortState.dir;
      return 0;
    });
    rows.forEach(r=>tbody.appendChild(r));
  }

  // CSV export (visible rows)
  document.getElementById('btnExportCsv').addEventListener('click', ()=>{
    const visible = [...document.querySelectorAll('#reportsTable tbody tr')].filter(tr=>tr.style.display!=='none');
    const head = ['Company','Title','Period','Revenue','EBITDA','GM','NM','Uploaded','By'];
    const rows = visible.map(tr=>[
      tr.dataset.company,
      tr.dataset.title.toUpperCase(),
      tr.dataset.period.toUpperCase(),
      tr.dataset.revenue,
      tr.dataset.ebitda,
      (parseFloat(tr.dataset.gm)*100).toFixed(1)+'%',
      (parseFloat(tr.dataset.nm)*100).toFixed(1)+'%',
      tr.dataset.created,
      tr.dataset.uploader
    ]);
    const csv = [head.join(','), ...rows.map(r=>r.join(','))].join('\n');
    const blob = new Blob([csv], {type:'text/csv;charset=utf-8;'});
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'financial_reports.csv';
    a.click();
  });

  // Filtering + KPIs + Charts
  function applyFilters(){
    const co = fCompany.value;
    const yr = fYear.value;
    const qt = fQuarter.value;
    const q  = (fSearch.value||'').toLowerCase();

    document.querySelectorAll('#reportsTable tbody tr').forEach(tr=>{
      const ok =
        (!co || tr.dataset.company===co) &&
        (!yr || tr.dataset.year===yr) &&
        (!qt || tr.dataset.quarter===qt) &&
        (tr.dataset.title.includes(q) || tr.dataset.period.includes(q) || q==='');

      tr.style.display = ok ? '' : 'none';
    });

    updateSnapshot();
    rebuildCharts();
  }

function visibleRows(){
  const rows = [...document.querySelectorAll('#reportsTable tbody tr')];
  const vis  = rows.filter(tr=>tr.style.display!=='none');
  return vis.length ? vis : rows; // fallback so charts never empty
}


  function updateSnapshot(){
    const rows = visibleRows();
    const rev  = rows.reduce((a,tr)=> a + parseInt(tr.dataset.revenue||0), 0);
    const ebt  = rows.reduce((a,tr)=> a + parseInt(tr.dataset.ebitda||0), 0);
    const gms  = rows.map(tr=> parseFloat(tr.dataset.gm||0));
    const nms  = rows.map(tr=> parseFloat(tr.dataset.nm||0));
    const gm   = gms.length ? Math.round((gms.reduce((a,b)=>a+b,0)/gms.length)*100) : 0;
    const nm   = nms.length ? Math.round((nms.reduce((a,b)=>a+b,0)/nms.length)*100) : 0;

    document.getElementById('kRevenue').textContent = '$'+rev.toLocaleString();
    document.getElementById('kEbitda').textContent  = '$'+ebt.toLocaleString();
    document.getElementById('kGM').textContent      = gm+'%';
    document.getElementById('kNM').textContent      = nm+'%';

    // update sparks
    const byPeriod = aggregateByPeriod(rows);
    setSpark(sparkRev, Object.keys(byPeriod), Object.values(byPeriod).map(x=>x.revenue));
    setSpark(sparkEbitda, Object.keys(byPeriod), Object.values(byPeriod).map(x=>x.ebitda));
    setSpark(sparkGM, Object.keys(byPeriod), Object.values(byPeriod).map(x=>Math.round((x.gmSum/x.count)*100)));
    setSpark(sparkNM, Object.keys(byPeriod), Object.values(byPeriod).map(x=>Math.round((x.nmSum/x.count)*100)));
  }

  // Aggregations
  function aggregateByPeriod(rows){
    // period like "2025-Q1" or "2024-Y"
    const map = {};
    rows.forEach(tr=>{
      const p = tr.dataset.period.toUpperCase();
      if(!map[p]) map[p] = {revenue:0, ebitda:0, gmSum:0, nmSum:0, count:0};
      map[p].revenue += parseInt(tr.dataset.revenue||0);
      map[p].ebitda  += parseInt(tr.dataset.ebitda||0);
      map[p].gmSum   += parseFloat(tr.dataset.gm||0);
      map[p].nmSum   += parseFloat(tr.dataset.nm||0);
      map[p].count++;
    });
    // sort keys by year/quarter order
    const ordered = Object.keys(map).sort((a,b)=>{
      const [ya,qa] = a.split('-'); const [yb,qb] = b.split('-');
      if(ya!==yb) return ya>yb ? 1 : -1;
      const order = {Y:5,Q1:1,Q2:2,Q3:3,Q4:4};
      return (order[qa]||0) - (order[qb]||0);
    });
    const out = {}; ordered.forEach(k=>out[k]=map[k]);
    return out;
  }

  function aggregateShareByCompany(rows){
    const map = {};
    rows.forEach(tr=>{
      const c = tr.dataset.company;
      map[c] = (map[c]||0) + parseInt(tr.dataset.revenue||0);
    });
    return map;
  }

  function aggregateRevenueSeriesByCompany(rows){
    // returns {labels:[periods], series:{Company:[values in same order]}}
    const byP = aggregateByPeriod(rows);
    const labels = Object.keys(byP);
    const companies = [...new Set(rows.map(r=>r.dataset.company))];
    const series = {};
    companies.forEach(c=> series[c] = new Array(labels.length).fill(0));
    rows.forEach(tr=>{
      const p = tr.dataset.period.toUpperCase();
      const c = tr.dataset.company;
      const idx = labels.indexOf(p);
      if(idx>=0) series[c][idx] += parseInt(tr.dataset.revenue||0);
    });
    return { labels, series };
  }

  // Charts
  let revTrend, shareDonut, sparkRev, sparkEbitda, sparkGM, sparkNM;

  function createSpark(ctx){
    return new Chart(ctx, {
      type: 'line',
      data: { labels: [], datasets:[{ data:[], tension:.3, fill:false, pointRadius:0, borderWidth:2 }] },
      options: { plugins:{legend:{display:false}, tooltip:{enabled:false}}, scales:{x:{display:false}, y:{display:false}}, elements:{line:{borderColor:getComputedStyle(document.body).getPropertyValue('--bs-primary')||'#0d6efd'}} }
    });
  }
  function setSpark(chart, labels, data){
    chart.data.labels = labels;
    chart.data.datasets[0].data = data;
    chart.update();
  }

  function createRevTrend(labels, datasets){
    if(revTrend) revTrend.destroy();
    revTrend = new Chart(document.getElementById('revTrend'), {
      type: 'bar',
      data: { labels, datasets },
      options: {
        responsive:true,
        scales: { x: { stacked: document.getElementById('toggleStacked').checked }, y: { stacked: document.getElementById('toggleStacked').checked, ticks:{ callback:(v)=>'$'+Number(v).toLocaleString() } } },
        plugins: { legend: { position:'bottom' } }
      }
    });
  }

  function createShareDonut(labels, data){
    if(shareDonut) shareDonut.destroy();
    shareDonut = new Chart(document.getElementById('shareDonut'), {
      type: 'doughnut',
      data: { labels, datasets:[{ data }] },
      options: { plugins:{ legend:{ position:'bottom' } } }
    });
  }

  function rebuildCharts(){
    const rows = visibleRows();

    // Revenue trend
    const stacked = document.getElementById('toggleStacked').checked;
    const { labels, series } = aggregateRevenueSeriesByCompany(rows);
    let datasets;
    if(stacked){
      datasets = Object.keys(series).map((name, i)=>({
        label: name, data: series[name], borderWidth:0
      }));
    } else {
      // sum all to single line (use bar for consistency)
      const summed = labels.map((_,i)=> Object.values(series).reduce((a,arr)=>a+(arr[i]||0),0));
      datasets = [{ label:'Revenue', data: summed, borderWidth:0 }];
    }
    createRevTrend(labels, datasets);

    // Donut share
    const shareMap = aggregateShareByCompany(rows);
    createShareDonut(Object.keys(shareMap), Object.values(shareMap));
  }

  // View modal
  const viewModal = document.getElementById('viewModal');
  viewModal.addEventListener('show.bs.modal', (evt)=>{
    const btn = evt.relatedTarget;
    const r = JSON.parse(btn.getAttribute('data-view'));
    const html = `
      <div class="row g-3">
        <div class="col-12 col-md-6">
          <div class="border rounded p-3 h-100">
            <div class="small text-muted">Company</div>
            <div class="fw-semibold">${r.company}</div>
            <div class="small text-muted mt-2">Period</div>
            <div class="fw-semibold">${r.period}</div>
            <div class="small text-muted mt-2">Title</div>
            <div class="fw-semibold">${r.title}</div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="border rounded p-3 h-100">
            <div class="small text-muted">Revenue</div>
            <div class="fw-semibold">$${Number(r.revenue).toLocaleString()}</div>
            <div class="small text-muted mt-2">EBITDA</div>
            <div class="fw-semibold">$${Number(r.ebitda).toLocaleString()}</div>
            <div class="small text-muted mt-2">Margins</div>
            <div class="fw-semibold">GM ${Math.round(r.gm*100)}% • NM ${Math.round(r.nm*100)}%</div>
          </div>
        </div>
      </div>
      <div class="mt-3">
        <a class="btn btn-dark" href="${r.file}" target="_blank"><i class="bi bi-download"></i> Download</a>
      </div>
    `;
    document.getElementById('viewBody').innerHTML = html;
  });

  // Compare logic
  let pickA = null, pickB = null;
  document.querySelectorAll('[data-compare]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const r = JSON.parse(btn.getAttribute('data-compare'));
      if(!pickA){ pickA = r; renderPick('A', r); return; }
      if(!pickB){ pickB = r; renderPick('B', r); renderDiff(); return; }
      pickA = pickB; renderPick('A', pickA);
      pickB = r;     renderPick('B', pickB);
      renderDiff();
    });
  });
  function renderPick(slot, r){
    const el = document.getElementById('cmp'+slot);
    el.innerHTML = `
      <div class="d-flex justify-content-between">
        <div><strong>${r.company}</strong><br><span class="text-muted small">${r.period} • ${r.title}</span></div>
        <span class="badge bg-light text-dark">#${r.id}</span>
      </div>
      <div class="mt-2 small">
        Rev $${Number(r.revenue).toLocaleString()} • EBITDA $${Number(r.ebitda).toLocaleString()} • GM ${Math.round(r.gm*100)}% • NM ${Math.round(r.nm*100)}%
      </div>`;
  }
  function renderDiff(){
    if(!(pickA && pickB)){ document.getElementById('cmpDiff').textContent='—'; return; }
    const dRev = (pickB.revenue - pickA.revenue);
    const dEbt = (pickB.ebitda - pickA.ebitda);
    const dGM  = Math.round((pickB.gm - pickA.gm)*100);
    const dNM  = Math.round((pickB.nm - pickA.nm)*100);
    document.getElementById('cmpDiff').innerHTML = `
      <div><strong>Δ Revenue:</strong> ${dRev>=0?'+':''}$${Math.abs(dRev).toLocaleString()} ${dRev>=0? '↑':'↓'}</div>
      <div><strong>Δ EBITDA:</strong> ${dEbt>=0?'+':''}$${Math.abs(dEbt).toLocaleString()} ${dEbt>=0? '↑':'↓'}</div>
      <div><strong>Δ GM:</strong> ${dGM>=0?'+':''}${Math.abs(dGM)}% ${dGM>=0? '↑':'↓'}</div>
      <div><strong>Δ NM:</strong> ${dNM>=0?'+':''}${Math.abs(dNM)}% ${dNM>=0? '↑':'↓'}</div>
    `;
  }

  // Chart instances: sparks + main
  sparkRev = createSpark(document.getElementById('sparkRev'));
  sparkEbitda = createSpark(document.getElementById('sparkEbitda'));
  sparkGM = createSpark(document.getElementById('sparkGM'));
  sparkNM = createSpark(document.getElementById('sparkNM'));

  document.getElementById('toggleStacked').addEventListener('change', rebuildCharts);

  // First render
  sortTable();      // ensures stable initial sort state visuals
  applyFilters();   // also builds charts

});
</script>
@endpush
