@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
@php
  $images = [
    "https://images.pexels.com/photos/6801648/pexels-photo-6801648.jpeg",
    "https://images.pexels.com/photos/6802042/pexels-photo-6802042.jpeg",
    "https://images.pexels.com/photos/5716032/pexels-photo-5716032.jpeg",
    "https://images.pexels.com/photos/4960341/pexels-photo-4960341.jpeg",
    "https://images.pexels.com/photos/5717724/pexels-photo-5717724.jpeg",
  ];
@endphp
<div class="container-fluid py-4">
  <div class="overlay-local"><span>Coming Soon</span></div>

  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Anteprima Progetti Futuri</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">
        Anticipazioni su ciò che verrà — segnale, non fuffa.
      </p>
    </div>
    <div class="d-flex gap-2" data-aos="fade-left">
      <a href="{{ route('investor.projects.status') }}" class="btn btn-outline-secondary">
        <i class="fas fa-project-diagram me-1"></i> Progetti Attuali
      </a>
    </div>
  </div>

  {{-- Filters --}}
  <div class="card border-0 shadow-sm mb-3" data-aos="fade-up">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Settore</label>
          <select id="fSector" class="form-select">
            <option value="">Tutti</option>
            @foreach($sectors as $s)<option value="{{ $s }}">{{ $s }}</option>@endforeach
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small text-muted mb-1">Fase</label>
          <select id="fStage" class="form-select">
            <option value="">Qualsiasi</option>
            @foreach($stages as $s)<option value="{{ $s }}">{{ ucfirst(str_replace('_',' ',$s)) }}</option>@endforeach
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label small text-muted mb-1">Anno Obiettivo</label>
          <select id="fYear" class="form-select">
            <option value="">Qualsiasi</option>
            @foreach($years as $y)<option value="{{ $y }}">{{ $y }}</option>@endforeach
          </select>
        </div>
        <div class="col-12 col-md-3">
          <label class="form-label small text-muted mb-1">Cerca</label>
          <input id="fSearch" class="form-control" placeholder="Titolo, tag, azienda">
        </div>
      </div>
    </div>
  </div>

  {{-- Teasers Grid --}}
  <div class="row g-3" id="teaserGrid">
    @foreach($teasers as $t)
      @php
        $year = preg_match('/(20\d{2})/', $t['target'], $m) ? $m[1] : '';
      @endphp
      <div class="col-12 col-md-6 col-xl-4"
        
           data-sector="{{ $t['sector'] }}"
           data-stage="{{ $t['stage'] }}"
           data-year="{{ $year }}"
           data-tags="{{ strtolower(implode(',', $t['tags'])) }}"
           data-title="{{ strtolower($t['title']) }}"
           data-company="{{ strtolower($t['company']) }}">
        <div class="card border-0 shadow-sm h-100 teaser-card">
          <div class="ratio ratio-16x9 rounded-top overflow-hidden">
           <img
              src="{{ $images[$loop->index % count($images)] }}"
              class="w-100 h-100 object-fit-cover"
              alt="anteprima">
          </div>
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-1">
              <div>
                <div class="small text-muted">{{ $t['company'] }} • {{ $t['sector'] }}</div>
                <h2 class="h6 mb-0">{{ $t['title'] }}</h2>
              </div>
              <span class="badge {{ [
                  'scoping'=>'bg-secondary-subtle text-secondary',
                  'design'=>'bg-primary-subtle text-primary',
                  'partnering'=>'bg-info-subtle text-info',
                  'piloting'=>'bg-warning-subtle text-warning',
                  'po_issued'=>'bg-success-subtle text-success'
                ][$t['stage']] ?? 'bg-light text-dark' }}">
                {{ ucfirst(str_replace('_',' ',$t['stage'])) }}
              </span>
            </div>

            <p class="text-muted small mt-2 mb-3 flex-grow-1">{{ $t['summary'] }}</p>

            <div class="d-flex flex-wrap gap-1 mb-2">
              @foreach($t['tags'] as $tag)
                <span class="badge rounded-pill bg-light text-dark">{{ $tag }}</span>
              @endforeach
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <span class="small text-muted"><i class="fas fa-flag"></i> Obiettivo: <strong>{{ $t['target'] }}</strong></span>
              <div class="btn-group">
                <button class="btn btn-sm btn-outline-secondary" data-details='@json($t)'
                        data-bs-toggle="modal" data-bs-target="#detailModal">Dettagli</button>
                <button class="btn btn-sm btn-dark" data-interest='@json(['id'=>$t['id'],'title'=>$t['title']])'
                        data-bs-toggle="modal" data-bs-target="#interestModal">
                  Registra Interesse
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Footer hint --}}
  <div class="text-center text-muted small mt-3" data-aos="fade-up">
    La pipeline può cambiare in base a due diligence, partner e condizioni di mercato.
  </div>
</div>

{{-- Detail Modal --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i> Dettagli Progetto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="detailBody">
        <div class="text-center text-muted py-5">Caricamento…</div>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

{{-- Interest Modal --}}
<div class="modal fade" id="interestModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="fas fa-handshake me-2"></i> Registra Interesse</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="interestForm" class="row g-2">
          @csrf
          <input type="hidden" id="projectId">
          <div class="col-12">
            <label class="form-label small text-muted mb-1">Progetto</label>
            <input class="form-control" id="projectTitle" readonly>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label small text-muted mb-1">Il tuo nome</label>
            <input class="form-control" id="iName" value="{{ auth()->user()->name ?? '' }}" {{ auth()->check()? 'readonly':'' }}>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label small text-muted mb-1">Email</label>
            <input type="email" class="form-control" id="iEmail" value="{{ auth()->user()->email ?? '' }}">
          </div>
          <div class="col-12">
            <label class="form-label small text-muted mb-1">Nota (opzionale)</label>
            <textarea class="form-control" id="iNote" rows="3" placeholder="Interesse, importo, tempistiche…"></textarea>
          </div>
        </form>
        <small class="text-muted d-block mt-2">Ti ricontatteremo con i prossimi passi e la documentazione.</small>
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button class="btn btn-dark" id="btnSubmitInterest"><i class="fas fa-paper-plane"></i> Invia</button>
      </div>
    </div>
  </div>
</div>


<input type="hidden" id="interestUrl" value="{{ route('investor.future.interest') }}">

<style>
.teaser-card{ border-radius:1rem; transition:transform .12s ease, box-shadow .12s ease; }
.teaser-card:hover{ transform: translateY(-2px); box-shadow:0 8px 24px rgba(0,0,0,.08); }
.badge[class*="-subtle"]{ border:1px solid rgba(0,0,0,.06); }
</style>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/future-preview.js') }}"></script>
@endpush
