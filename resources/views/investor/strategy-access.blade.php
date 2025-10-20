{{-- resources/views/investor/strategy-access.blade.php --}}
@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">

  {{-- Intestazione di pagina --}}
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Accesso alle Strategie</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">
        Strategie di crescita del capitale, spiegate con chiarezza. Niente fronzoli, solo tesi → meccanica → rischi → accesso.
      </p>
    </div>
    <div class="d-flex gap-2" data-aos="fade-left">
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
        <input id="qSearch" type="search" class="form-control" placeholder="Cerca strategie, tag, settori">
      </div>
      <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#disclaimerModal">
        <i class="fas fa-shield-alt"></i> Dichiarazioni
      </button>
    </div>
  </div>

  {{-- Filtri --}}
  <div class="card border-0 shadow-sm mb-3" data-aos="fade-up">
    <div class="card-body">
      <div class="row g-3 align-items-end">
        <div class="col-12 col-md-4">
          <label class="form-label small text-muted mb-1">Profilo di Rischio</label>
          <div class="btn-group w-100" role="group">
            <input type="radio" class="btn-check" name="risk" id="riskAll" autocomplete="off" checked>
            <label class="btn btn-outline-secondary" for="riskAll">Tutti</label>
            <input type="radio" class="btn-check" name="risk" id="riskConservative" autocomplete="off">
            <label class="btn btn-outline-secondary" for="riskConservative">Conservatore</label>
            <input type="radio" class="btn-check" name="risk" id="riskBalanced" autocomplete="off">
            <label class="btn btn-outline-secondary" for="riskBalanced">Bilanciato</label>
            <input type="radio" class="btn-check" name="risk" id="riskGrowth" autocomplete="off">
            <label class="btn btn-outline-secondary" for="riskGrowth">Crescita</label>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label small text-muted mb-1">Orizzonte</label>
          <select id="fHorizon" class="form-select">
            <option value="">Qualsiasi</option>
            <option value="short">6–12 mesi (Breve)</option>
            <option value="mid">1–3 anni (Medio)</option>
            <option value="long">3–7 anni (Lungo)</option>
          </select>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label small text-muted mb-1">Tipo di Accesso</label>
          <select id="fAccess" class="form-select">
            <option value="">Qualsiasi</option>
            <option value="co-invest">Co-investimento</option>
            <option value="fund">Fondo</option>
            <option value="spv">SPV</option>
            <option value="public">Mercati Pubblici</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  {{-- Layout del contenuto --}}
  <div class="row g-3">
    <div class="col-12 col-xl-9">
      {{-- Griglia strategie --}}
      <div class="row g-3" id="strategyGrid">

        {{-- Scheda Strategia --}}
        <div class="col-12 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm strategy-card"
               data-title="Dividend Compounder"
               data-tags="equity,dividends,quality,large-cap"
               data-risk="conservative"
               data-horizon="mid"
               data-access="public">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h2 class="h5 mb-1">Dividend Compounder</h2>
                  <div class="text-muted small">Azioni di qualità con dividendi in crescita</div>
                </div>
                <button class="btn btn-sm btn-outline-secondary bookmark-btn" data-id="strat-1" data-bs-toggle="tooltip" title="Salva">
                  <i class="fas fa-star"></i>
                </button>
              </div>

              <div class="d-flex flex-wrap gap-2 my-2">
                <span class="badge bg-success-subtle text-success">Conservatore</span>
                <span class="badge bg-light text-dark">Orizzonte: 1–3a</span>
                <span class="badge bg-primary-subtle text-primary">Pubblico</span>
                <span class="badge bg-light text-dark">Settori: Beni di consumo, Utilities</span>
              </div>

              <div class="row g-2 my-2">
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">IRR Obiettivo</div>
                    <div class="fw-semibold">10–14%</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">Volatilità</div>
                    <div class="fw-semibold">Bassa</div>
                  </div>
                </div>
              </div>

              <div class="progress mb-2" style="height:8px;">
                <div class="progress-bar bg-success" style="width: 80%"></div>
              </div>
              <div class="small text-muted mb-2">Stato: Template di portafoglio attivo</div>

              <div class="accordion accordion-flush" id="acc1">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1-1">
                      Tesi
                    </button>
                  </h2>
                  <div id="c1-1" class="accordion-collapse collapse">
                    <div class="accordion-body small">
                      Focus su aziende con flussi di cassa durevoli, potere di prezzo e crescita dei dividendi pluriennale. Reinvestire i dividendi per ottenere capitalizzazione.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1-2">
                      Meccanica
                    </button>
                  </h2>
                  <div id="c1-2" class="accordion-collapse collapse">
                    <div class="accordion-body small">
                      Paniere equipesato; ribilanciamento trimestrale; screening per payout ratio < 70%, ROIC > WACC, e CAGR dividendi a 5 anni.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1-3">
                      Rischi
                    </button>
                  </h2>
                  <div id="c1-3" class="accordion-collapse collapse">
                    <div class="accordion-body small">
                      Shock dei tassi, concentrazione settoriale, taglio dei dividendi durante le recessioni.
                    </div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal"
                        data-detail='{"title":"Dividend Compounder","access":"Pubblico","min":"$25k","docs":[{"name":"1-pager.pdf"},{"name":"Metodologia.pdf"}]}'>
                  Dettagli
                </button>
                <div class="text-muted small">Ticket Minimo: $25k</div>
              </div>
            </div>
          </div>
        </div>

        {{-- Scheda Strategia --}}
        <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="50">
          <div class="card border-0 shadow-sm strategy-card"
               data-title="Healthcare Roll-up"
               data-tags="private,healthcare,buy-and-build,clinic"
               data-risk="balanced"
               data-horizon="long"
               data-access="spv">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h2 class="h5 mb-1">Healthcare Roll-up</h2>
                  <div class="text-muted small">Acquisizione e consolidamento di cliniche regionali</div>
                </div>
                <button class="btn btn-sm btn-outline-secondary bookmark-btn" data-id="strat-2" data-bs-toggle="tooltip" title="Salva">
                  <i class="fas fa-star"></i>
                </button>
              </div>

              <div class="d-flex flex-wrap gap-2 my-2">
                <span class="badge bg-warning-subtle text-warning">Bilanciato</span>
                <span class="badge bg-light text-dark">Orizzonte: 3–7a</span>
                <span class="badge bg-dark-subtle text-dark">SPV</span>
                <span class="badge bg-light text-dark">Settori: Ambulatoriale, Diagnostica</span>
              </div>

              <div class="row g-2 my-2">
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">IRR Obiettivo</div>
                    <div class="fw-semibold">18–22%</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">Liquidità</div>
                    <div class="fw-semibold">Bassa</div>
                  </div>
                </div>
              </div>

              <div class="progress mb-2" style="height:8px;">
                <div class="progress-bar bg-warning" style="width: 55%"></div>
              </div>
              <div class="small text-muted mb-2">Stato: Costruzione pipeline</div>

              <div class="accordion accordion-flush" id="acc2">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2-1">
                      Tesi
                    </button>
                  </h2>
                  <div id="c2-1" class="accordion-collapse collapse"><div class="accordion-body small">
                    Cliniche frammentate → miglioramento operativo, servizi condivisi e espansione del multiplo di valutazione all'uscita.
                  </div></div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2-2">
                      Meccanica
                    </button>
                  </h2>
                  <div id="c2-2" class="accordion-collapse collapse"><div class="accordion-body small">
                    Acquisire 5–8 piattaforme, standardizzare i sistemi, centralizzare la contrattazione con i pagatori, vendere a buyer strategici.
                  </div></div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2-3">
                      Rischi
                    </button>
                  </h2>
                  <div id="c2-3" class="accordion-collapse collapse"><div class="accordion-body small">
                    Cambiamenti normativi, ritardi nell'integrazione, turnover del personale medico.
                  </div></div>
                </div>
              </div>

              <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal"
                        data-detail='{"title":"Healthcare Roll-up","access":"SPV","min":"$250k","docs":[{"name":"Teaser.pdf"},{"name":"Modello Operativo.xlsx"}]}'>
                  Dettagli
                </button>
                <div class="text-muted small">Ticket Minimo: $250k</div>
              </div>
            </div>
          </div>
        </div>

        {{-- Scheda Strategia --}}
        <div class="col-12 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm strategy-card"
               data-title="Digital Infra Yield"
               data-tags="reits,towers,fiber,infrastructure,yield"
               data-risk="conservative"
               data-horizon="long"
               data-access="fund">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h2 class="h5 mb-1">Digital Infra Yield</h2>
                  <div class="text-muted small">Torri, fibra e data center edge</div>
                </div>
                <button class="btn btn-sm btn-outline-secondary bookmark-btn" data-id="strat-3" data-bs-toggle="tooltip" title="Salva">
                  <i class="fas fa-star"></i>
                </button>
              </div>

              <div class="d-flex flex-wrap gap-2 my-2">
                <span class="badge bg-success-subtle text-success">Conservatore</span>
                <span class="badge bg-light text-dark">Orizzonte: 3–7a</span>
                <span class="badge bg-primary-subtle text-primary">Fondo</span>
                <span class="badge bg-light text-dark">Settori: Telecom, Infrastrutture</span>
              </div>

              <div class="row g-2 my-2">
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">IRR Obiettivo</div>
                    <div class="fw-semibold">12–15%</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">Rendimento</div>
                    <div class="fw-semibold">4–6%</div>
                  </div>
                </div>
              </div>

              <div class="progress mb-2" style="height:8px;">
                <div class="progress-bar bg-success" style="width: 70%"></div>
              </div>
              <div class="small text-muted mb-2">Stato: Shortlist fondi completata</div>

              <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal"
                        data-detail='{"title":"Digital Infra Yield","access":"Fondo","min":"$100k","docs":[{"name":"Checklist Due Diligence.pdf"},{"name":"Termini del Fondo.pdf"}]}'>
                  Dettagli
                </button>
                <div class="text-muted small">Ticket Minimo: $100k</div>
              </div>
            </div>
          </div>
        </div>

        {{-- Scheda Strategia --}}
        <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="50">
          <div class="card border-0 shadow-sm strategy-card"
               data-title="Special Situations"
               data-tags="event-driven,merger,spinoff,distressed"
               data-risk="growth"
               data-horizon="short"
               data-access="co-invest">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h2 class="h5 mb-1">Special Situations</h2>
                  <div class="text-muted small">Event-driven, scorporazioni, erronee valutazioni</div>
                </div>
                <button class="btn btn-sm btn-outline-secondary bookmark-btn" data-id="strat-4" data-bs-toggle="tooltip" title="Salva">
                  <i class="fas fa-star"></i>
                </button>
              </div>

              <div class="d-flex flex-wrap gap-2 my-2">
                <span class="badge bg-danger-subtle text-danger">Crescita</span>
                <span class="badge bg-light text-dark">Orizzonte: 6–12m</span>
                <span class="badge bg-dark-subtle text-dark">Co-investimento</span>
                <span class="badge bg-light text-dark">Settori: Cross-settoriale</span>
              </div>

              <div class="row g-2 my-2">
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">IRR Obiettivo</div>
                    <div class="fw-semibold">20%+</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="border rounded p-2 text-center">
                    <div class="small text-muted">Volatilità</div>
                    <div class="fw-semibold">Alta</div>
                  </div>
                </div>
              </div>

              <div class="progress mb-2" style="height:8px;">
                <div class="progress-bar bg-danger" style="width: 40%"></div>
              </div>
              <div class="small text-muted mb-2">Stato: Ricerca live di idee</div>

              <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal"
                        data-detail='{"title":"Special Situations","access":"Co-investimento","min":"$50k","docs":[{"name":"Playbook.pdf"},{"name":"Screeners.csv"}]}'>
                  Dettagli
                </button>
                <div class="text-muted small">Ticket Minimo: $50k</div>
              </div>
            </div>
          </div>
        </div>

      </div>

      {{-- Feedback --}}
      <div class="card border-0 shadow-sm mt-3" data-aos="fade-up">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
          <div class="h6 mb-0">Feedback</div>
          <small class="text-muted">Cosa dovremmo chiarire o aggiungere?</small>
        </div>
        <div class="card-body">
          <div class="row g-2">
            <div class="col-12 col-lg-10">
              <textarea class="form-control" rows="3" placeholder="Breve e conciso, leggiamo tutto."></textarea>
            </div>
            <div class="col-12 col-lg-2 d-grid">
              <button class="btn btn-dark">Invia</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    {{-- Barra laterale --}}
    <div class="col-12 col-xl-3">
      <div class="card border-0 shadow-sm mb-3" data-aos="fade-left">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0">Letture Rapide</div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0 small" id="quickReads">
            <li class="mb-2"><i class="fas fa-file-alt me-2 text-muted"></i><a href="#" class="text-decoration-none">Come interpretare IRR Obiettivo vs. Rendimento</a></li>
            <li class="mb-2"><i class="fas fa-file-alt me-2 text-muted"></i><a href="#" class="text-decoration-none">Scala di liquidità (cosa e perché)</a></li>
            <li class="mb-2"><i class="fas fa-file-alt me-2 text-muted"></i><a href="#" class="text-decoration-none">Co-investimento vs Fondo vs SPV</a></li>
          </ul>
        </div>
      </div>

      <div class="card border-0 shadow-sm mb-3" data-aos="fade-left" data-aos-delay="50">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0">Download</div>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download me-2"></i>Glossario Strategie (PDF)</a>
            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download me-2"></i>Matrice del Rischio (PDF)</a>
            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download me-2"></i>Guida Allocazione (XLSX)</a>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm" data-aos="fade-left" data-aos-delay="100">
        <div class="card-header bg-white border-0 d-flex justify-content-between">
          <div class="h6 mb-0">Preferiti</div>
          <button class="btn btn-sm btn-outline-secondary" id="btnClearBm"><i class="fas fa-times"></i></button>
        </div>
        <div class="card-body">
          <ul class="list-unstyled small mb-0" id="bmList">
            <li class="text-muted">Nessuno al momento.</li>
          </ul>
        </div>
      </div>
    </div>

  </div>

</div>

{{-- Details Modal --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-briefcase me-2"></i> Dettagli Strategia</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="detailBody">
        <div class="text-center text-muted py-5">Caricamento…</div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button class="btn btn-dark"><i class="fas fa-envelope me-2"></i>Richiedi Accesso</button>
      </div>
    </div>
  </div>
</div>

{{-- Disclosures Modal --}}
<div class="modal fade" id="disclaimerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="fas fa-shield-alt me-2"></i> Informative</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body small">
        Questa è una panoramica educativa. Non costituisce offerta, sollecitazione o consulenza. Le performance passate ≠ rendimenti futuri. Tutti gli obiettivi sono illustrativi.
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>


<style>
.strategy-card .badge { font-weight: 600; }
.strategy-card .bookmark-btn .fas { opacity:.5; }
.strategy-card .bookmark-btn.active .fas { color:#ffc107; opacity:1; }
#bmList li + li { margin-top:.35rem; }
</style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

  // --- Search + Filter (client-side, static dataset) ---
  const qSearch = document.getElementById('qSearch');
  const fHorizon = document.getElementById('fHorizon');
  const fAccess = document.getElementById('fAccess');
  const riskRadios = ['riskAll','riskConservative','riskBalanced','riskGrowth'].map(id=>document.getElementById(id));
  const cards = [...document.querySelectorAll('.strategy-card')];

  function currentRisk(){
    if (document.getElementById('riskConservative').checked) return 'conservative';
    if (document.getElementById('riskBalanced').checked) return 'balanced';
    if (document.getElementById('riskGrowth').checked) return 'growth';
    return '';
  }

  function applyFilters(){
    const q = (qSearch.value||'').toLowerCase();
    const risk = currentRisk();
    const hz = fHorizon.value;
    const acc = fAccess.value;

    cards.forEach(card=>{
      const title = (card.dataset.title||'').toLowerCase();
      const tags = (card.dataset.tags||'').toLowerCase();
      const ok =
        (!risk || card.dataset.risk===risk) &&
        (!hz || card.dataset.horizon===hz) &&
        (!acc || card.dataset.access===acc) &&
        (title.includes(q) || tags.includes(q) || q==='');
      card.parentElement.style.display = ok ? '' : 'none';
    });

    if (window.AOS) AOS.refresh();
  }

  [qSearch, fHorizon, fAccess, ...riskRadios].forEach(el=>{
    el && el.addEventListener('input', applyFilters);
  });

  // --- Bookmarks with localStorage ---
  const BM_KEY = 'strategyBookmarks';
  const bmList = document.getElementById('bmList');
  function getBm(){ try { return JSON.parse(localStorage.getItem(BM_KEY)||'[]'); } catch { return []; } }
  function setBm(arr){ localStorage.setItem(BM_KEY, JSON.stringify(arr)); renderBm(); }
  function renderBm(){
    const bms = getBm();
    bmList.innerHTML = bms.length ? '' : '<li class="text-muted">None yet.</li>';
    bms.forEach(it=>{
      const li = document.createElement('li');
      li.innerHTML = `<i class="fas fa-star text-warning me-1"></i> ${it.title}`;
      bmList.appendChild(li);
    });
    // toggle active stars on cards
    document.querySelectorAll('.bookmark-btn').forEach(btn=>{
      const id = btn.dataset.id;
      const on = bms.some(x=>x.id===id);
      btn.classList.toggle('active', on);
    });
  }
  document.querySelectorAll('.bookmark-btn').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const id = btn.dataset.id;
      const title = btn.closest('.strategy-card').dataset.title || 'Strategy';
      let bms = getBm();
      if (bms.some(x=>x.id===id)) bms = bms.filter(x=>x.id!==id);
      else bms.push({id, title});
      setBm(bms);
    });
  });
  document.getElementById('btnClearBm')?.addEventListener('click', ()=>{
    localStorage.removeItem(BM_KEY); renderBm();
  });

  // --- Detail modal (static payload embedded in data-detail) ---
  const detailModal = document.getElementById('detailModal');
  detailModal.addEventListener('show.bs.modal', (evt)=>{
    const btn = evt.relatedTarget;
    const data = JSON.parse(btn.getAttribute('data-detail')||'{}');
    const docs = (data.docs||[]).map(d=>`<li class="list-group-item d-flex justify-content-between align-items-center">
      ${d.name}<a href="#" class="btn btn-sm btn-outline-secondary">Download</a></li>`).join('');
    document.getElementById('detailBody').innerHTML = `
      <div class="row g-3">
        <div class="col-12 col-md-6">
          <div class="border rounded p-3 h-100">
            <div class="small text-muted">Strategy</div>
            <div class="fw-semibold">${data.title||'-'}</div>
            <div class="small text-muted mt-2">Access</div>
            <div class="fw-semibold">${data.access||'-'}</div>
            <div class="small text-muted mt-2">Minimum</div>
            <div class="fw-semibold">${data.min||'-'}</div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="border rounded p-3 h-100">
            <div class="small text-muted">Documents</div>
            <ul class="list-group list-group-flush">${docs||'<li class="list-group-item text-muted">No documents yet.</li>'}</ul>
          </div>
        </div>
      </div>
    `;
  });

  // First render
  renderBm();
  applyFilters();
});
</script>
@endpush
