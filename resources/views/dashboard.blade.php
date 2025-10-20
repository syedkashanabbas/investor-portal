@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="py-4 container-fluid">

    <!-- Welcome Banner -->
    <div class="mb-4 row">
        <div class="col-12">
            <div class="p-4 text-white shadow card bg-gradient bg-primary rounded-3">
                <h1 class="mb-1">Benvenuto, {{ $name }}</h1>
                <p class="mb-0">Cockpit Dashboard VIP — tutto ciò di cui hai bisogno a colpo d'occhio.</p>
            </div>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="mb-4 row g-4">
        <div class="col-md-3">
            <div class="p-4 text-center shadow card">
                <h6 class="text-muted">Investimento Totale</h6>
                <h2 class="mb-0 text-primary">$120,000</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 text-center shadow card">
                <h6 class="text-muted">Progetti Attivi</h6>
                <h2 class="mb-0 text-success">2</h2>
            </div>
        </div>
      <div class="col-md-3">
            <div class="card position-relative overflow-hidden text-center p-4 shadow">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                <span class="fs-4 fw-bold text-white">Coming Soon</span>
                </div>
                <h6 class="text-muted">Crescita Annuale</h6>
                <h2 class="mb-0 text-warning">14%</h2>
            </div>
            </div>

            <div class="col-md-3">
            <div class="card position-relative overflow-hidden text-center p-4 shadow">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                <span class="fs-4 fw-bold text-white">Coming Soon</span>
                </div>
                <h6 class="text-muted">Prossimo Pagamento</h6>
                <h2 class="mb-0 text-danger">Dec 30</h2>
            </div>
            </div>

    </div>

    <!-- Charts Row -->
<div class="mb-4 row g-4">
  <div class="col-lg-8">
    <div class="p-4 shadow card position-relative overflow-hidden">
      <div class="overlay">Coming Soon</div>
      <h5 class="card-title">Crescita del Portafoglio</h5>
      <canvas id="growthChart"></canvas>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="p-4 shadow card position-relative overflow-hidden">
      <div class="overlay">Coming Soon</div>
      <h5 class="card-title">Distribuzione degli Investimenti</h5>
      <canvas id="distributionChart"></canvas>
    </div>
  </div>
</div>


    <!-- Interactive Panels -->
<div class="row g-4">
  <div class="col-lg-6">
    <div class="p-4 shadow card h-100 position-relative overflow-hidden">
      <div class="overlay">Coming Soon</div>
      <h5 class="card-title">Aggiornamenti Live</h5>
      <ul class="overflow-auto list-group list-group-flush" style="max-height: 250px;">
        <li class="list-group-item">🚀 Nuovo progetto Alpha lanciato.</li>
        <li class="list-group-item">💰 Rapporto trimestrale caricato.</li>
        <li class="list-group-item">📈 Esposizione Bitcoin aumentata.</li>
        <li class="list-group-item">📑 Contratto NDA disponibile nei documenti.</li>
      </ul>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="p-4 shadow card h-100 position-relative overflow-hidden">
      <div class="overlay">Coming Soon</div>
      <h5 class="card-title">Feedback Rapido</h5>
      <form>
        <div class="mb-3">
          <textarea class="form-control" rows="4" placeholder="Condividi i tuoi pensieri..."></textarea>
        </div>
        <button class="btn btn-primary">Invia</button>
      </form>
    </div>
  </div>
</div>


</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Growth line chart
    new Chart(document.getElementById('growthChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Growth ($)',
                data: [10000, 20000, 25000, 40000, 60000, 120000],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Distribution donut
    new Chart(document.getElementById('distributionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Real Estate', 'Crypto', 'Stocks', 'Bonds'],
            datasets: [{
                data: [40, 25, 20, 15],
                backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545'],
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });
</script>
@endpush
