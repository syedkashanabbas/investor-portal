@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Depositi')

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1">I tuoi Depositi</h1>
      <p class="text-muted mb-0">Riepilogo dei tuoi depositi recenti.</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepositModal">
      <i class="fas fa-plus me-1"></i> Nuovo Deposito
    </button>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Riferimento</th>
              <th>Importo</th>
              <th>Metodo</th>
              <th>Stato</th>
              <th>Data</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="depositTable">
            @forelse($deposits as $dep)
              <tr data-id="{{ $dep->id }}">
                <td>{{ $dep->reference_no }}</td>
                <td>£{{ number_format($dep->amount, 2) }}</td>
                <td>{{ $dep->payment_method ?? '-' }}</td>
                <td>
                  <span class="status-badge status-{{ $dep->status }}">{{ ucfirst($dep->status) }}</span>
                </td>
                <td>{{ $dep->created_at->format('d M Y') }}</td>
                <td class="text-end">
                  <button class="btn btn-sm btn-outline-secondary edit-btn" data-bs-toggle="modal" data-bs-target="#editDepositModal" data-deposit='@json($dep)'>
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $dep->id }}">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            @empty
              <tr><td colspan="6" class="text-center text-muted py-4">Nessun deposito trovato.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addDepositModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Nuovo Deposito</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addDepositForm">
          @csrf
          <div class="mb-3">
            <label class="form-label">Importo (£)</label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Metodo di Pagamento</label>
            <input type="text" class="form-control" name="payment_method" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="remarks" rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">Aggiungi</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editDepositModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title">Modifica Deposito</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editDepositForm">
          @csrf
          @method('PUT')
          <input type="hidden" name="id">
          <div class="mb-3">
            <label class="form-label">Importo (£)</label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Metodo di Pagamento</label>
            <input type="text" class="form-control" name="payment_method" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="remarks" rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-dark w-100">Aggiorna</button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
.status-badge { padding: .35rem .75rem; border-radius: 8px; text-transform: capitalize; font-weight: 600; }
.status-pending { background:#fff3cd; color:#856404; }
.status-approved { background:#d4edda; color:#155724; }
.status-rejected { background:#f8d7da; color:#721c24; }
</style>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/investor-deposits.js') }}"></script>
@endpush
