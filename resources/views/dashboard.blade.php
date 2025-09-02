@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="py-4 container-fluid">

    <!-- Welcome Banner -->
    <div class="mb-4 row">
        <div class="col-12">
            <div class="p-4 text-white shadow card bg-gradient bg-primary rounded-3">
                <h1 class="mb-1">Welcome, {{ $name }}</h1>
                <p class="mb-0">VIP Dashboard cockpit — everything you need at a glance.</p>
            </div>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="mb-4 row g-4">
        <div class="col-md-3">
            <div class="p-4 text-center shadow card">
                <h6 class="text-muted">Total Investment</h6>
                <h2 class="mb-0 text-primary">$120,000</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 text-center shadow card">
                <h6 class="text-muted">Projects Active</h6>
                <h2 class="mb-0 text-success">8</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 text-center shadow card">
                <h6 class="text-muted">Annual Growth</h6>
                <h2 class="mb-0 text-warning">14%</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 text-center shadow card">
                <h6 class="text-muted">Next Payout</h6>
                <h2 class="mb-0 text-danger">Dec 30</h2>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="mb-4 row g-4">
        <div class="col-lg-8">
            <div class="p-4 shadow card">
                <h5 class="card-title">Portfolio Growth</h5>
                <canvas id="growthChart"></canvas>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-4 shadow card">
                <h5 class="card-title">Investment Distribution</h5>
                <canvas id="distributionChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Interactive Panels -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="p-4 shadow card h-100">
                <h5 class="card-title">Live Updates</h5>
                <ul class="overflow-auto list-group list-group-flush" style="max-height: 250px;">
                    <li class="list-group-item">🚀 New project Alpha launched.</li>
                    <li class="list-group-item">💰 Quarterly report uploaded.</li>
                    <li class="list-group-item">📈 Bitcoin exposure increased.</li>
                    <li class="list-group-item">📑 NDA contract available in documents.</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-4 shadow card h-100">
                <h5 class="card-title">Quick Feedback</h5>
                <form>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Share your thoughts..."></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
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
