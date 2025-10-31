@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">

  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-3">
  <div>
  <h1 class="h3 mb-1" data-aos="fade-right">Q&amp;A Diretto / Supporto</h1>
  <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">
    Fai domande direttamente. Il nostro team risponde qui.
  </p>
  <p class="text-muted mt-2" data-aos="fade-right" data-aos-delay="150">
    Per assistenza, contatta <a href="mailto:info@ethica.holdings" class="text-primary fw-semibold">info@ethica.holdings</a>.
  </p>
</div>

    <div class="text-end" data-aos="fade-left">
      <div class="small text-muted">Accesso come</div>
      <div class="fw-semibold" id="displayName">{{ $displayName }}</div>
    </div>
  </div>

  <div class="row g-3">
    {{-- Chat / thread --}}
    <div class="col-12 col-lg-8" data-aos="fade-up">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
          <div class="h6 mb-0"><i class="fas fa-comments me-2 text-primary"></i>Conversazione</div>
          <div>
            <span class="badge bg-primary-subtle text-primary me-1" id="badgeCategory">Tutte</span>
            <span class="badge bg-secondary-subtle text-secondary" id="badgePriority">Qualsiasi</span>
          </div>
        </div>
        <div class="card-body" style="height: 60vh; overflow: auto;" id="threadWrap">
          <div id="thread">
            @foreach($thread as $t)
              <div class="msg mb-3 {{ $t['role']==='user' ? 'msg-out' : 'msg-in' }}">
                <div class="d-flex {{ $t['role']==='user' ? 'justify-content-end' : '' }}">
                  <div class="bubble p-3 rounded shadow-sm">
                    <div class="small text-muted mb-1">
                      <strong>{{ $t['from'] }}</strong> • {{ $t['name'] }} • {{ $t['at'] }}
                    </div>
                    <div>{{ $t['msg'] }}</div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="card-footer bg-light">
          <form id="supportForm" class="row g-2 align-items-end">
            @csrf
            <div class="col-12 col-md-3">
              <label class="form-label small text-muted mb-1">Categoria</label>
              <select class="form-select" name="category" id="fCategory">
                @foreach($categories as $c)<option>{{ $c }}</option>@endforeach
              </select>
            </div>
            <div class="col-6 col-md-2">
              <label class="form-label small text-muted mb-1">Priorità</label>
              <select class="form-select" name="priority" id="fPriority">
                @foreach($priorities as $p)<option>{{ $p }}</option>@endforeach
              </select>
            </div>
            <div class="col-6 col-md-3">
              <label class="form-label small text-muted mb-1">Il tuo nome</label>
              <input class="form-control" name="name" id="fName"
                     value="{{ auth()->user()->name ?? session('guest_name','Ospite') }}"
                     {{ auth()->check() ? 'readonly' : '' }}>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label small text-muted mb-1">Messaggio</label>
              <div class="input-group">
                <input class="form-control" name="message" id="fMessage" placeholder="Scrivi la tua domanda…" maxlength="4000">
                <button class="btn btn-dark" id="btnSend"><i class="fas fa-paper-plane"></i></button>
              </div>
            </div>
            <input type="hidden" id="supportSendUrl" value="{{ route('investor.support.send') }}">
          </form>
          <small class="text-muted d-block mt-2">
            Suggerimento: includi l’ID progetto o il periodo del report per velocizzare la risposta.
          </small>
        </div>
      </div>
    </div>

    {{-- Right panel --}}
    <div class="col-12 col-lg-4">


      <div class="card border-0 shadow-sm" data-aos="fade-left" data-aos-delay="50">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0"><i class="fas fa-question-circle me-2 text-warning"></i>FAQ</div>
        </div>
        <div class="card-body small"> 
          <p class="mb-2"><strong>Com’è stata la tua prima impressione del progetto?</strong><br>Hai percepito chiarezza, trasparenza e una visione solida?</p>
          <p class="mb-2"><strong>Le informazioni fornite (report, prospetti, stato progetto) sono state sufficienti?</strong><br>Hai trovato facile reperirle e comprenderle?</p>
          <p class="mb-2"><strong>Come valuti la comunicazione con il team?</strong><br>Risposte rapide, tono professionale, disponibilità alle domande?</p>
          <p class="mb-2"><strong>Ti senti aggiornato sugli sviluppi e i rischi del progetto?</strong><br>Vorresti aggiornamenti più frequenti o sintetici?</p>
          <p class="mb-2"><strong>Quanto ti senti sicuro della direzione finanziaria?</strong><br>Ti sembrano realistici i piani di crescita e i margini previsti?</p>
          <p class="mb-2"><strong>Consiglieresti questo investimento ad altri?</strong><br>Perché sì o perché no?</p>
          <p class="mb-0"><strong>Hai suggerimenti o preoccupazioni da condividere?</strong><br>Ogni osservazione ci aiuta a migliorare il rapporto investitore–progetto.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<style>
.msg .bubble{ max-width: 85%; background:#fff; }
.msg-in  .bubble{ border-left:4px solid #0d6efd10; }
.msg-out .bubble{ background:#0d6efd; color:#fff; }
#threadWrap{ scroll-behavior:smooth; }
</style>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/support.js') }}"></script>
@endpush
