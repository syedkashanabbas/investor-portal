{{-- resources/views/investor/investor-education.blade.php --}}
@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">

  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Educazione per Investitori</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">
        Spiegazioni brevi e video sintetici su crypto, economia e mercati.
      </p>
    </div>
    <div class="d-flex gap-2" >
      <div class="input-group">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
        <input id="qSearch" type="search" class="form-control" placeholder="Cerca argomenti, tag">
      </div>
      <div class="btn-group">
        <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-sort"></i> Ordina</button>
        <ul class="dropdown-menu dropdown-menu-end" id="sortMenu">
          <li><a class="dropdown-item" href="#" data-sort="newest">Più recenti</a></li>
          <li><a class="dropdown-item" href="#" data-sort="shortest">Più brevi</a></li>
          <li><a class="dropdown-item" href="#" data-sort="popular">Più popolari</a></li>
        </ul>
      </div>
    </div>
  </div>

  {{-- Filters --}}
  <div class="card border-0 shadow-sm mb-3" >
    <div class="card-body">
      <div class="row g-2">
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Argomento</label>
          <select id="fTopic" class="form-select">
            <option value="">Tutti</option>
            <option value="crypto">Crypto</option>
            <option value="economy">Economia</option>
            <option value="markets">Mercati</option>
            <option value="ai">AI</option>
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small text-muted mb-1">Tipo</label>
          <select id="fType" class="form-select">
            <option value="">Qualsiasi</option>
            <option value="video">Video</option>
            <option value="article">Articolo</option>
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small text-muted mb-1">Durata</label>
          <select id="fDur" class="form-select">
            <option value="">Qualsiasi</option>
            <option value="short">&lt; 5 min</option>
            <option value="medium">5–15 min</option>
            <option value="long">&gt; 15 min</option>
          </select>
        </div>
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Livello</label>
          <select id="fLevel" class="form-select">
            <option value="">Qualsiasi</option>
            <option value="beginner">Principiante</option>
            <option value="intermediate">Intermedio</option>
            <option value="advanced">Avanzato</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  {{-- Featured --}}
  <!--<div class="card border-0 shadow-sm mb-4" >-->
  <!--  <div class="card-body">-->
  <!--    <div class="row g-3 align-items-center">-->
  <!--      <div class="col-12 col-lg-4">-->
  <!--        <div class="thumb-hero ratio ratio-16x9 rounded overflow-hidden position-relative">-->
  <!--          <img-->
  <!--            class="w-100 h-100 object-fit-cover img-safe"-->
  <!--            data-seed="featured-economy"-->
  <!--            data-w="1200"-->
  <!--            data-h="675"-->
  <!--            alt="In evidenza">-->
  <!--          <button class="btn btn-light rounded-circle position-absolute top-50 start-50 translate-middle shadow play-btn"-->
  <!--                  data-bs-toggle="modal" data-bs-target="#playerModal"-->
  <!--                  data-src="assets/img/video.jpg"-->
  <!--                  title="Riproduci"><i class="fas fa-play"></i></button>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="col-12 col-lg-8">-->
  <!--        <div class="d-flex justify-content-between align-items-start">-->
  <!--          <div>-->
  <!--            <h2 class="h5 mb-1">Inflazione vs. Tassi: Cosa Muove Davvero i Mercati?</h2>-->
  <!--            <div class="text-muted small">Argomento: Economia • Livello: Principiante • 6:32</div>-->
  <!--          </div>-->
  <!--          <button class="btn btn-sm btn-outline-secondary queue-btn" data-queue='{"title":"Inflation vs. Rates","type":"video","len":392}'>-->
  <!--            <i class="fas fa-clock me-1"></i> Guarda più tardi-->
  <!--          </button>-->
  <!--        </div>-->
  <!--        <p class="mb-0 mt-2 small text-muted">Spiegazione semplice di CPI, tassi di politica monetaria e perché le azioni reagiscono così.</p>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <div class="card border-0 shadow-sm mb-4 position-relative overflow-hidden">
  <!-- Blurred body -->
  <div class="card-body filter-blur">
    <div class="row g-3 align-items-center">
      <div class="col-12 col-lg-4">
        <div class="thumb-hero ratio ratio-16x9 rounded overflow-hidden position-relative">
          <img
            class="w-100 h-100 object-fit-cover img-safe"
            src="assets/img/video.jpg"
            alt="In evidenza">
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <h2 class="h5 mb-1">Inflazione vs. Tassi: Cosa Muove Davvero i Mercati?</h2>
        <p class="mb-0 mt-2 small text-muted">Spiegazione semplice di CPI, tassi di politica monetaria e perché le azioni reagiscono così.</p>
      </div>
    </div>
  </div>

  <!-- Overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
    <span class="text-white fw-bold fs-3 text-uppercase">Coming Soon</span>
  </div>
</div>

<style>
  .filter-blur {
    filter: blur(6px);
    pointer-events: none;
    user-select: none;
  }
</style>


  <div class="row g-3">
    {{-- Main feed --}}
    <div class="col-12 col-xl-9">
      <div class="row g-3" id="eduGrid">

        {{-- Cards --}}
      <div class="col-12 col-md-6">
  <div class="card border-0 shadow-sm edu-card position-relative overflow-hidden"
       data-title="Bitcoin Halving: Segnale o Rumore?"
       data-topic="crypto"
       data-type="video"
       data-level="beginner"
       data-tags="btc,cycle,miners"
       data-length="420"
       data-date="2025-04-20"
       data-pop="96">

    <!-- Blurred body -->
    <div class="card-body filter-blur">
      <div class="thumb ratio ratio-16x9 rounded overflow-hidden mb-2 position-relative">
        <img
          class="w-100 h-100 object-fit-cover img-safe"
          data-seed="btc-halving"
          data-w="1200"
          data-h="675"
          alt="Bitcoin Halving">
        <span class="badge bg-dark text-white position-absolute end-0 m-2">7:00</span>
        <button class="btn btn-light btn-sm rounded-circle position-absolute bottom-0 start-0 m-2 shadow play-btn"
                data-bs-toggle="modal" data-bs-target="#playerModal"
                data-src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Riproduci">
          <i class="fas fa-play"></i>
        </button>
      </div>
      <h3 class="h6 mb-1">Bitcoin Halving: Segnale o Rumore?</h3>
      <div class="small text-muted mb-2">Crypto • Principiante • Pubblicato 2025-04-20</div>
      <p class="small text-muted mb-2">Cosa cambia davvero, cosa no, e come si adattano i miner.</p>
      <div class="d-flex justify-content-between">
        <div class="d-flex flex-wrap gap-1">
          <span class="badge bg-light text-dark">BTC</span>
          <span class="badge bg-light text-dark">Cicli</span>
        </div>
        <div class="btn-group">
          <button class="btn btn-sm btn-outline-secondary queue-btn" data-queue='{"title":"Bitcoin Halving","type":"video","len":420}'>Metti in coda</button>
          <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#detailModal" data-detail='{"title":"Bitcoin Halving: Segnale o Rumore?","desc":"Note di approfondimento e link.","res":["Cheat Sheet.pdf","Metriche On-chain.xlsx"]}'>Dettagli</button>
        </div>
      </div>
    </div>

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
      <span class="text-white fw-bold fs-3 text-uppercase">Coming Soon</span>
    </div>
  </div>
</div>
        <div class="col-12 col-md-6"  data-aos-delay="50">
          <div class="card border-0 shadow-sm edu-card"
               data-title="Curve dei Rendimenti: Indicatore di Recessione 101"
               data-topic="economy"
               data-type="article"
               data-level="beginner"
               data-tags="bonds,macro,term-premium"
               data-length="6"
               data-date="2025-05-08"
               data-pop="88">
            <div class="card-body">
              <h3 class="h6 mb-1">Curve dei Rendimenti: Indicatore di Recessione 101</h3>
              <div class="small text-muted mb-2">Economia • Principiante • Lettura 6 min • 2025-05-08</div>
              <p class="small text-muted mb-2">Perché l’inversione conta, cosa predice e il problema dei falsi segnali.</p>
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-wrap gap-1">
                  <span class="badge bg-light text-dark">Obbligazioni</span>
                  <span class="badge bg-light text-dark">Macro</span>
                </div>
                <div class="btn-group">
                  <button class="btn btn-sm btn-outline-secondary queue-btn" data-queue='{"title":"Yield Curves","type":"article","len":6}'>Leggi dopo</button>
                  <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#articleModal" data-article='{"title":"Curve dei Rendimenti: Indicatore di Recessione 101","body":"<p>Nozioni di base sulla struttura a termine…</p>"}'>Apri</button>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div class="col-12 col-md-6">
  <div class="card border-0 shadow-sm edu-card position-relative overflow-hidden"
       data-title="Ampiezza di Mercato: Quanto è Sano il Rally?"
       data-topic="markets"
       data-type="video"
       data-level="intermediate"
       data-tags="breadth,advance-decline,etfs"
       data-length="540"
       data-date="2025-06-10"
       data-pop="74">

    <!-- Blurred body -->
    <div class="card-body filter-blur">
      <div class="thumb ratio ratio-16x9 rounded overflow-hidden mb-2 position-relative">
        <img
          class="w-100 h-100 object-fit-cover img-safe"
          data-seed="market-breadth"
          data-w="1200"
          data-h="675"
          alt="Ampiezza di Mercato">
        <span class="badge bg-dark text-white position-absolute end-0 m-2">9:00</span>
        <button class="btn btn-light btn-sm rounded-circle position-absolute bottom-0 start-0 m-2 shadow play-btn"
                data-bs-toggle="modal" data-bs-target="#playerModal"
                data-src="https://player.vimeo.com/video/357274789" title="Riproduci">
          <i class="fas fa-play"></i>
        </button>
      </div>
      <h3 class="h6 mb-1">Ampiezza di Mercato: Quanto è Sano il Rally?</h3>
      <div class="small text-muted mb-2">Mercati • Intermedio • Pubblicato 2025-06-10</div>
      <p class="small text-muted mb-2">Come individuare leadership ristrette o partecipazione ampia con rapporti semplici.</p>
      <div class="d-flex justify-content-between">
        <div class="d-flex flex-wrap gap-1">
          <span class="badge bg-light text-dark">Ampiezza</span>
          <span class="badge bg-light text-dark">ETF</span>
        </div>
        <div class="btn-group">
          <button class="btn btn-sm btn-outline-secondary queue-btn" data-queue='{"title":"Market Breadth","type":"video","len":540}'>Metti in coda</button>
          <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#detailModal" data-detail='{"title":"Ampiezza Mercato: Rally Sano?","desc":"Trucchi advance/decline.","res":["Rapporti Ampiezza.pdf"]}'>Dettagli</button>
        </div>
      </div>
    </div>

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50">
      <span class="text-white fw-bold fs-3 text-uppercase">Coming Soon</span>
    </div>
  </div>
</div>

        <div class="col-12 col-md-6"  data-aos-delay="50">
          <div class="card border-0 shadow-sm edu-card"
               data-title="AI nella Finanza: Hype o Reali Vantaggi Operativi"
               data-topic="ai"
               data-type="article"
               data-level="intermediate"
               data-tags="automation,backoffice,analytics"
               data-length="8"
               data-date="2025-07-02"
               data-pop="61">
            <div class="card-body">
              <h3 class="h6 mb-1">AI nella Finanza: Hype o Vantaggi Concreti?</h3>
              <div class="small text-muted mb-2">AI • Intermedio • Lettura 8 min • 2025-07-02</div>
              <p class="small text-muted mb-2">Dove l’AI fa davvero risparmiare tempo vs. demo scintillanti che non funzionano.</p>
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-wrap gap-1">
                  <span class="badge bg-light text-dark">Automazione</span>
                  <span class="badge bg-light text-dark">Analisi</span>
                </div>
                <div class="btn-group">
                  <button class="btn btn-sm btn-outline-secondary queue-btn" data-queue='{"title":"AI in Finance","type":"article","len":8}'>Leggi dopo</button>
                  <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#articleModal" data-article='{"title":"AI nella Finanza","body":"<p>Da OCR fatture a punteggio di rischio…</p>"}'>Apri</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      {{-- Pager --}}
      <div class="d-flex justify-content-between align-items-center mt-3" >
        <small class="text-muted" id="resultCount">4 elementi</small>
        <div class="btn-group">
          <button class="btn btn-outline-secondary btn-sm" id="prevPage" disabled>Precedente</button>
          <button class="btn btn-outline-secondary btn-sm" id="nextPage" disabled>Successivo</button>
        </div>
      </div>

    </div>

    {{-- Sidebar --}}
    <div class="col-12 col-xl-3">
      <div class="card border-0 shadow-sm mb-3" >
        <div class="card-header bg-white border-0 d-flex justify-content-between">
          <div class="h6 mb-0">Playlist</div>
          <button class="btn btn-sm btn-outline-secondary" id="btnClearQueue" title="Svuota coda"><i class="fas fa-times"></i></button>
        </div>
        <div class="card-body">
          <ul class="list-unstyled small mb-0" id="queueList">
            <li class="text-muted">Nessun elemento in coda.</li>
          </ul>
        </div>
      </div>

      <div class="card border-0 shadow-sm mb-3"  data-aos-delay="50">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0">Download</div>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download me-2"></i>Macro Cheat Sheet (PDF)</a>
            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download me-2"></i>Guida Crypto (PDF)</a>
            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download me-2"></i>Glossario dei Rischi (PDF)</a>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm"  data-aos-delay="100">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0">Rimani aggiornato</div>
        </div>
        <div class="card-body">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="subToggle">
            <label class="form-check-label" for="subToggle">Inviami lezioni via email (settimanali)</label>
          </div>
          <small class="text-muted d-block mt-2">Le manteniamo brevi e sensate.</small>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- Video Player Modal --}}
<div class="modal fade" id="playerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="fas fa-play-circle me-2"></i> Player</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0">
        <div class="ratio ratio-16x9">
          <iframe id="playerFrame" src="" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- Article Modal --}}
<div class="modal fade" id="articleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-file-alt me-2"></i> Article</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="articleBody">
        <div class="text-center text-muted py-5">Loading…</div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- Details Modal --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i> Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="detailBody">
        <div class="text-center text-muted py-4">Loading…</div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style>
.thumb img, .thumb-hero img { object-fit: cover; }
.play-btn { width: 56px; height: 56px; display:flex; align-items:center; justify-content:center; }
.edu-card .badge { font-weight:600; }
#queueList li + li { margin-top:.35rem; }
</style>
@endsection

@push('scripts')
{{-- Picsum loader + safe fallback (applies to .img-safe) --}}
<script>
(function(){
  function picsum(seed, w, h){
    return `https://picsum.photos/seed/${encodeURIComponent(seed)}/${w}/${h}`;
  }
  function randomPicsum(w, h){
    return `https://picsum.photos/${w}/${h}?random=${Math.floor(Math.random()*1e9)}`;
  }
  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('img.img-safe').forEach(function(img){
      const w = parseInt(img.dataset.w || 1200, 10);
      const h = parseInt(img.dataset.h || 675, 10);
      const seed = img.dataset.seed || 'assets/img/video.jpg';
      img.loading = 'lazy';
      img.decoding = 'async';
      img.referrerPolicy = 'no-referrer';
      img.src = picsum(seed, w, h);
      img.onerror = function(){
        if (img.dataset.tried === '1') {
          img.onerror = null;
          img.src = `data:image/svg+xml;charset=utf-8,` + encodeURIComponent(
            `<svg xmlns='http://www.w3.org/2000/svg' width='${w}' height='${h}'>
               <rect width='100%' height='100%' fill='#e9ecef'/>
               <text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle'
                     font-family='system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif'
                     font-size='16' fill='#6c757d'>image unavailable</text>
             </svg>`
          );
          return;
        }
        img.dataset.tried = '1';
        img.src = randomPicsum(w, h);
      };
    });
  });
})();
</script>

<script>
document.addEventListener('DOMContentLoaded', function(){

  // --- Filtering, sorting, pagination ---
  const qSearch = document.getElementById('qSearch');
  const fTopic  = document.getElementById('fTopic');
  const fType   = document.getElementById('fType');
  const fDur    = document.getElementById('fDur');
  const fLevel  = document.getElementById('fLevel');
  const gridColEls = [...document.querySelectorAll('#eduGrid > .col-12')]; // card columns
  const resultCount = document.getElementById('resultCount');

  let page = 1, perPage = 8;

  function durBucket(len){
    const n = parseInt(len||0);
    if (n===0) return '';
    if (n < 300) return 'short';
    if (n <= 900) return 'medium';
    return 'long';
  }

  function sortCards(list, mode){
    const get = (el, k) => el.querySelector('.edu-card').dataset[k];
    return list.sort((a,b)=>{
      if(mode==='shortest'){
        return (parseInt(get(a,'length')||0) - parseInt(get(b,'length')||0));
      }
      if(mode==='popular'){
        return (parseInt(get(b,'pop')||0) - parseInt(get(a,'pop')||0));
      }
      // newest
      return (new Date(get(b,'date')) - new Date(get(a,'date')));
    });
  }

  function applyFilters(){
    const q = (qSearch.value||'').toLowerCase();
    const t = fTopic.value;
    const ty= fType.value;
    const d = fDur.value;
    const lv= fLevel.value;

    gridColEls.forEach(col=>{
      const card = col.querySelector('.edu-card');
      const ok =
        (!t  || card.dataset.topic===t) &&
        (!ty || card.dataset.type===ty) &&
        (!lv || card.dataset.level===lv) &&
        (!d  || durBucket(card.dataset.length)===d) &&
        ((card.dataset.title||'').toLowerCase().includes(q) ||
         (card.dataset.tags||'').toLowerCase().includes(q) ||
         q==='');
      col.style.display = ok ? '' : 'none';
    });

    paginate();
    if (window.AOS) AOS.refresh();
  }

  // Sort menu
  document.querySelectorAll('#sortMenu [data-sort]').forEach(a=>{
    a.addEventListener('click', (e)=>{
      e.preventDefault();
      const mode = a.getAttribute('data-sort');
      const visible = gridColEls.filter(col=>col.style.display!=='none');
      sortCards(visible, mode).forEach(col=> col.parentElement.insertBefore(col, col.parentElement.firstChild));
      paginate(true);
      if (window.AOS) AOS.refresh();
    });
  });

  // Pagination
  const prevBtn = document.getElementById('prevPage');
  const nextBtn = document.getElementById('nextPage');
  prevBtn.addEventListener('click', ()=>{ page=Math.max(1,page-1); paginate(); });
  nextBtn.addEventListener('click', ()=>{ page=page+1; paginate(); });

  function paginate(reset=false){
    const items = gridColEls.filter(col=>col.style.display!=='none');
    if (reset) page = 1;
    const total = items.length;
    const pages = Math.max(1, Math.ceil(total/perPage));
    page = Math.min(page, pages);

    items.forEach((col, idx)=>{
      const start = (page-1)*perPage;
      const end   = start + perPage;
      col.style.display = (idx>=start && idx<end) ? '' : 'none';
    });

    resultCount.textContent = total + ' items';
    prevBtn.disabled = (page<=1);
    nextBtn.disabled = (page>=pages);
  }

  [qSearch,fTopic,fType,fDur,fLevel].forEach(el=> el.addEventListener('input', applyFilters));

  // --- Queue (watch/read later) with localStorage ---
  const QKEY = 'eduQueue';
  const queueList = document.getElementById('queueList');

  function getQ(){ try { return JSON.parse(localStorage.getItem(QKEY)||'[]'); } catch { return []; } }
  function setQ(val){ localStorage.setItem(QKEY, JSON.stringify(val)); renderQueue(); }

  function renderQueue(){
    const q = getQ();
    queueList.innerHTML = q.length ? '' : '<li class="text-muted">Nothing queued.</li>';
    q.forEach((it,i)=>{
      const li = document.createElement('li');
      const len = it.type==='article' ? (it.len+' min read') : (Math.floor(it.len/60)+':'+String(it.len%60).padStart(2,'0'));
      li.innerHTML = `<i class="fas fa-${it.type==='video'?'play-circle':'file-alt'} me-1 text-muted"></i> ${it.title} <span class="text-muted">• ${len}</span>`;
      queueList.appendChild(li);
    });
  }

  document.querySelectorAll('.queue-btn').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const payload = JSON.parse(btn.getAttribute('data-queue')||'{}');
      const q = getQ();
      if (!q.some(x=>x.title===payload.title)) q.push(payload);
      setQ(q);
    });
  });

  document.getElementById('btnClearQueue')?.addEventListener('click', ()=>{
    localStorage.removeItem(QKEY); renderQueue();
  });

  // --- Video Player Modal ---
  const playerModal = document.getElementById('playerModal');
  playerModal.addEventListener('show.bs.modal', (evt)=>{
    const btn = evt.relatedTarget;
    const src = btn.getAttribute('data-src');
    document.getElementById('playerFrame').src = src + (src.includes('?')?'&':'?') + 'autoplay=1';
  });
  playerModal.addEventListener('hidden.bs.modal', ()=>{
    document.getElementById('playerFrame').src = '';
  });

  // --- Article Modal ---
  const articleModal = document.getElementById('articleModal');
  articleModal.addEventListener('show.bs.modal', (evt)=>{
    const btn = evt.relatedTarget;
    const data = JSON.parse(btn.getAttribute('data-article')||'{}');
    document.getElementById('articleBody').innerHTML = `
      <h5 class="mb-2">${data.title||'Article'}</h5>
      <div class="small text-muted mb-2">Quick read</div>
      <div>${data.body||'<p>Coming soon…</p>'}</div>
    `;
  });

  // --- Details Modal ---
  const detailModal = document.getElementById('detailModal');
  detailModal.addEventListener('show.bs.modal', (evt)=>{
    const btn = evt.relatedTarget;
    const data = JSON.parse(btn.getAttribute('data-detail')||'{}');
    const res = (data.res||[]).map(n=>`<li class="list-group-item d-flex justify-content-between align-items-center">${n}<a href="#" class="btn btn-sm btn-outline-secondary">Download</a></li>`).join('');
    document.getElementById('detailBody').innerHTML = `
      <div class="small text-muted">Overview</div>
      <div class="fw-semibold mb-2">${data.title||'-'}</div>
      <div class="text-muted mb-3">${data.desc||'—'}</div>
      <div class="small text-muted">Resources</div>
      <ul class="list-group list-group-flush">${res || '<li class="list-group-item text-muted">None yet.</li>'}</ul>
    `;
  });

  // --- Subscribe toggle (local only) ---
  const subToggle = document.getElementById('subToggle');
  const SKEY = 'eduSub';
  subToggle.checked = localStorage.getItem(SKEY)==='1';
  subToggle.addEventListener('change', ()=> localStorage.setItem(SKEY, subToggle.checked?'1':'0'));

  // First render
  renderQueue();
  applyFilters(); // also paginates
});
</script>
@endpush
