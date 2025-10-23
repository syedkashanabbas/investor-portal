@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">
  {{-- <div class="overlay-local"><span>Coming Soon</span></div> --}}

  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Feedback e Sondaggi</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">
        Sondaggi rapidi per guidare ciò che costruiremo in seguito.
      </p>
    </div>
    <div class="text-end" data-aos="fade-left">
      <div class="small text-muted">Connesso come</div>
      <div class="fw-semibold">{{ $displayName }}</div>
    </div>
  </div>

  <div class="row g-3">
    {{-- NPS + CSAT --}}
  <div class="col-12 col-xl-7" data-aos="fade-up">
  <div class="card border-0 shadow-sm h-100">
    <div class="card-header bg-white border-0">
      <div class="h6 mb-0"><i class="fas fa-poll me-2 text-primary"></i>Feedback & Sondaggio Investitori</div>
    </div>
    <div class="card-body">
      <form id="fbForm" class="row g-3">
        @csrf

        <!-- Q1 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quanto è probabile che tu continui a investire o consigli la nostra iniziativa ad altri investitori? <span class="text-muted">(0–10)</span></label>
          <div class="d-flex flex-wrap gap-1">
            @for($i=0;$i<=10;$i++)
              <input type="radio" class="btn-check" name="nps" id="nps{{ $i }}" value="{{ $i }}">
              <label class="btn btn-outline-secondary btn-sm" for="nps{{ $i }}">{{ $i }}</label>
            @endfor
          </div>
        </div>

        <!-- Q2 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quanto sei soddisfatto della trasparenza e della comunicazione ricevuta finora? <span class="text-muted">(1–5)</span></label>
          <div class="star-wrap">
            @for($s=1;$s<=5;$s++)
              <input type="radio" class="btn-check" name="csat" id="csat{{ $s }}" value="{{ $s }}">
              <label class="btn btn-outline-warning btn-sm" for="csat{{ $s }}"><i class="fas fa-star"></i></label>
            @endfor
          </div>
        </div>

        <!-- Q3 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quanto ti senti fiducioso riguardo alla nostra strategia e visione a lungo termine? <span class="text-muted">(1–5)</span></label>
          <div class="star-wrap">
            @for($s=1;$s<=5;$s++)
              <input type="radio" class="btn-check" name="confidence" id="conf{{ $s }}" value="{{ $s }}">
              <label class="btn btn-outline-success btn-sm" for="conf{{ $s }}"><i class="fas fa-star"></i></label>
            @endfor
          </div>
        </div>

        <!-- Q4 -->
        <div class="col-12">
          <label class="form-label small text-muted">Ritieni che i report e gli aggiornamenti ricevuti siano chiari e tempestivi?</label>
          <div class="d-flex flex-wrap gap-2">
            <label><input type="radio" name="clarity" value="Sì"> Sì</label>
            <label><input type="radio" name="clarity" value="Abbastanza"> Abbastanza</label>
            <label><input type="radio" name="clarity" value="No"> No</label>
          </div>
        </div>

        <!-- Q5 -->
        <div class="col-12">
          <label class="form-label small text-muted">Ti senti coinvolto nel processo decisionale e informato sui progressi chiave?</label>
          <div class="d-flex flex-wrap gap-2">
            <label><input type="radio" name="involvement" value="Molto"> Molto</label>
            <label><input type="radio" name="involvement" value="Abbastanza"> Abbastanza</label>
            <label><input type="radio" name="involvement" value="Poco"> Poco</label>
            <label><input type="radio" name="involvement" value="Per nulla"> Per nulla</label>
          </div>
        </div>

        <!-- Q6 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quanto sei soddisfatto della gestione del capitale e dell’efficienza operativa? <span class="text-muted">(1–5)</span></label>
          <div class="star-wrap">
            @for($s=1;$s<=5;$s++)
              <input type="radio" class="btn-check" name="capital" id="capital{{ $s }}" value="{{ $s }}">
              <label class="btn btn-outline-info btn-sm" for="capital{{ $s }}"><i class="fas fa-star"></i></label>
            @endfor
          </div>
        </div>

        <!-- Q7 -->
        <div class="col-12">
          <label class="form-label small text-muted">Ti senti sicuro riguardo alla solidità finanziaria del progetto?</label>
          <div class="d-flex flex-wrap gap-2">
            <label><input type="radio" name="trust" value="Sì, completamente"> Sì, completamente</label>
            <label><input type="radio" name="trust" value="Abbastanza"> Abbastanza</label>
            <label><input type="radio" name="trust" value="Non molto"> Non molto</label>
            <label><input type="radio" name="trust" value="Per nulla"> Per nulla</label>
          </div>
        </div>

        <!-- Q8 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quanto consideri utile la nostra piattaforma o dashboard per seguire i tuoi investimenti?</label>
          <div class="d-flex flex-wrap gap-2">
            <label><input type="radio" name="platform" value="Molto utile"> Molto utile</label>
            <label><input type="radio" name="platform" value="Abbastanza utile"> Abbastanza utile</label>
            <label><input type="radio" name="platform" value="Poco utile"> Poco utile</label>
            <label><input type="radio" name="platform" value="Inutile"> Inutile</label>
          </div>
        </div>

        <!-- Q9 -->
        <div class="col-12 col-md-6">
          <label class="form-label small text-muted">Argomento (opzionale)</label>
          <select class="form-select" name="topic" id="fbTopic">
            <option value="">Generale</option>
            <option>Stato del Progetto</option>
            <option>Comunicazione & Trasparenza</option>
            <option>Strategia di Crescita</option>
            <option>Ritorno sull’Investimento (ROI)</option>
            <option>Report Finanziari</option>
            <option>Coinvolgimento Investitori</option>
            <option>Innovazione & Tecnologia</option>
          </select>
        </div>

        <!-- Q10 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quali aspetti della comunicazione o dei report ti piacerebbe migliorare?</label>
          <textarea class="form-control" name="improve_reports" rows="3" placeholder="Esempio: più frequenti aggiornamenti, grafici più chiari, meno testo..."></textarea>
        </div>

        <!-- Q11 -->
        <div class="col-12">
          <label class="form-label small text-muted">Quali aree del progetto ritieni abbiano maggiore potenziale di crescita?</label>
          <textarea class="form-control" name="growth_potential" rows="3" placeholder="Scrivi le aree o i mercati che secondo te offrono opportunità..."></textarea>
        </div>

        <!-- Q12 -->
        <div class="col-12">
          <label class="form-label small text-muted">Hai suggerimenti o richieste specifiche per il nostro team di Investor Relations?</label>
          <textarea class="form-control" name="ir_feedback" rows="3" placeholder="Esempio: maggiore contatto diretto, webinar informativi, Q&A periodici..."></textarea>
        </div>

        <!-- Q13 -->
        <div class="col-12">
          <label class="form-label small text-muted">C'è qualcosa che potremmo migliorare per aumentare la tua fiducia o la tua esperienza come investitore?</label>
          <textarea class="form-control" name="text" id="fbText" rows="4" placeholder="Feedback, suggerimenti o aree di miglioramento…"></textarea>
        </div>

        <!-- Personal Info -->
        <div class="col-12 col-md-4">
          <label class="form-label small text-muted">Il tuo nome</label>
          <input class="form-control" name="name" id="fbName" value="{{ $displayName }}" {{ auth()->check() ? 'readonly' : '' }}>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label small text-muted">Email (opzionale)</label>
          <input type="email" class="form-control" name="email" id="fbEmail" value="{{ $displayEmail }}">
        </div>
        <div class="col-12 col-md-4 d-flex align-items-end">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="fbAnon" name="anonymous">
            <label class="form-check-label small" for="fbAnon">Invia in modo anonimo</label>
          </div>
        </div>

        <!-- Submit -->
        <div class="col-12">
          <button id="btnFbSend" class="btn btn-dark"><i class="fas fa-paper-plane me-1"></i> Invia</button>
          <span class="small text-muted ms-2">Apprezziamo ogni feedback.</span>
          <input type="hidden" id="fbSubmitUrl" value="{{ route('investor.feedback.submit') }}">
        </div>
      </form>
    </div>
  </div>
</div>


    {{-- Quick poll + stats --}}
    <div class="col-12 col-xl-5">
      <div class="card border-0 shadow-sm mb-3" data-aos="fade-left">
        <div class="card-header bg-white border-0 d-flex justify-content-between">
          <div class="h6 mb-0"><i class="fas fa-check-circle me-2 text-success"></i>Sondaggio Veloce</div>
        </div>
        <div class="card-body">
          <div class="fw-semibold mb-2">{{ $poll['question'] }}</div>
          <div id="pollOpts" class="d-grid gap-2">
            @foreach($poll['options'] as $opt)
              <button class="btn btn-outline-secondary btn-sm poll-btn" data-id="{{ $poll['id'] }}" data-opt="{{ $opt }}">
                {{ $opt }}
              </button>
            @endforeach
          </div>
          <small class="text-muted d-block mt-2">Un voto per utente (demo lato client).</small>
          <input type="hidden" id="pollUrl" value="{{ route('investor.feedback.poll') }}">
        </div>
      </div>

      <div class="card border-0 shadow-sm" data-aos="fade-left" data-aos-delay="50">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0"><i class="fas fa-chart-bar me-2 text-info"></i>Sentimento Attuale (demo)</div>
        </div>
        <div class="card-body">
          <div class="row g-3 text-center">
            <div class="col-6">
              <div class="display-6 fw-semibold">{{ $stats['nps']['score'] }}</div>
              <div class="small text-muted">Punteggio NPS</div>
              <div class="small text-muted">{{ $stats['nps']['promoters'] }}P / {{ $stats['nps']['passives'] }}Pa / {{ $stats['nps']['detractors'] }}D</div>
            </div>
            <div class="col-6">
              <div class="display-6 fw-semibold">{{ number_format($stats['csat']['avg'],1) }}</div>
              <div class="small text-muted">CSAT (1–5)</div>
              <div class="small text-muted">{{ $stats['csat']['count'] }} risposte</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<style>
.star-wrap .btn{ width:40px; }
</style>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/feedback.js') }}"></script>
@endpush
