@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">
  <div class="overlay-local"><span>Coming Soon</span></div>
  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Feed Aggiornamenti Live</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">
        Bacheca in tempo reale per opportunità, aggiornamenti di progetto e avvisi.
      </p>
    </div>
    <div class="d-flex gap-2" data-aos="fade-left">
      <button id="btnPause" class="btn btn-outline-secondary"><i class="fas fa-pause"></i> Pausa</button>
      <button id="btnClear" class="btn btn-outline-dark"><i class="fas fa-broom"></i> Pulisci</button>
    </div>
  </div>

  {{-- Controls --}}
  <div class="card border-0 shadow-sm mb-3" data-aos="fade-up">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Tipo</label>
          <select id="fType" class="form-select">
            <option value="">Tutti</option>
            <option value="opportunity">Opportunità</option>
            <option value="project">Progetto</option>
            <option value="alert">Avviso</option>
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small text-muted mb-1">Canale</label>
          <select id="fChannel" class="form-select">
            <option value="">Tutti</option>
            @foreach($channels as $c)
              <option value="{{ $c }}">{{ $c }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small text-muted mb-1">Gravità</label>
          <select id="fSeverity" class="form-select">
            <option value="">Qualsiasi</option>
            <option value="success">Successo</option>
            <option value="info">Info</option>
            <option value="warning">Avviso</option>
            <option value="danger">Pericolo</option>
          </select>
        </div>
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Cerca</label>
          <input id="fSearch" class="form-control" placeholder="Titolo, tag, messaggio">
        </div>
      </div>
    </div>
  </div>

  {{-- Live Ticker --}}
  <div class="ticker card border-0 shadow-sm mb-3" data-aos="fade-up">
    <div class="card-body py-2">
      <div id="tickerInner" class="ticker-inner small">
        <!-- popolato da JS -->
      </div>
    </div>
  </div>

  {{-- Feed columns --}}
  <div class="row g-3">
    <div class="col-12 col-lg-4" data-aos="fade-up">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
          <div class="h6 mb-0"><i class="fas fa-hand-holding-usd me-2 text-primary"></i>Opportunità</div>
          <span class="badge bg-primary-subtle text-primary" id="countOpportunity">0</span>
        </div>
        <div class="card-body" id="colOpportunity"></div>
      </div>
    </div>
    <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="50">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
          <div class="h6 mb-0"><i class="fas fa-clipboard-check me-2 text-success"></i>Aggiornamenti Progetto</div>
          <span class="badge bg-success-subtle text-success" id="countProject">0</span>
        </div>
        <div class="card-body" id="colProject"></div>
      </div>
    </div>
    <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
          <div class="h6 mb-0"><i class="fas fa-exclamation-triangle me-2 text-danger"></i>Avvisi</div>
          <span class="badge bg-danger-subtle text-danger" id="countAlert">0</span>
        </div>
        <div class="card-body" id="colAlert"></div>
      </div>
    </div>
  </div>

</div>


{{-- Details Modal --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i> Dettagli Aggiornamento</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="detailBody">
        <div class="text-muted py-5 text-center">Caricamento…</div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>


{{-- seed to JS --}}
<script id="seedLiveUpdates" type="application/json">@json($initialEvents)</script>

<style>
.ticker-inner{ white-space:nowrap; overflow:hidden; position:relative }
.ticker-inner::after{ content:""; position:absolute; right:0; top:0; width:60px; height:100%; 
  background:linear-gradient(90deg, rgba(255,255,255,0), #fff 60%); }
.badge[class*="-subtle"]{ border:1px solid rgba(0,0,0,.05); }
.update-card{ border-radius: .8rem; transition: box-shadow .15s ease, transform .1s ease; }
.update-card:hover{ box-shadow:0 6px 18px rgba(0,0,0,.08); transform: translateY(-2px); }
.update-meta{ font-size:.8rem }
.tag{ background:#f1f3f5; border-radius:999px; padding:.15rem .5rem; margin-right:.25rem; font-size:.75rem }
@media (max-width: 575.98px){
  .card-body .update-card{ margin-bottom:.75rem }
}
</style>
@endsection

@push('scripts')
{{-- page JS (separate file) --}}
<script src="{{ asset('assets/js/live-updates.js') }}"></script>
@endpush
