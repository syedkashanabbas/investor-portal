@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Depositi')

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1">Depositi</h1>
      <p class="text-muted mb-0">Riepilogo dei depositi (attivi e rimossi).</p>
    </div>

    @if(auth()->user()->isAdmin())
      <div class="d-flex gap-2">
        <a href="{{ route('investor.deposits.trashed') }}" class="btn btn-outline-dark">
          <i class="fas fa-trash-restore me-1"></i> View Trashed
        </a>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepositModal">
          <i class="fas fa-plus me-1"></i> Nuovo Deposito
        </button>
      </div>
    @endif
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Utente</th>
              <th>Riferimento</th>
              <th>Importo</th>
              <th>Metodo</th>
              <th>Documento</th>
              <th>Stato</th>
              <th>Deposited Date</th>
              <th class="text-end">Azioni</th>
            </tr>
          </thead>
          <tbody id="depositTable">
            @forelse($deposits as $dep)
              <tr data-id="{{ $dep->id }}">
                <td>{{ $dep->user->name ?? '-' }}</td>
                <td>{{ $dep->reference_no }}</td>
                <td>£{{ number_format($dep->amount, 2) }}</td>
                <td>{{ $dep->payment_method ?? '-' }}</td>
                <td>
                  @if($dep->document_path)
                    <a href="{{ asset('storage/'.$dep->document_path) }}" target="_blank" class="btn btn-sm btn-outline-info">
                      <i class="fas fa-file"></i> View
                    </a>
                  @else
                    <span class="text-muted">No Doc</span>
                  @endif
                </td>
                <td>
                  <span class="status-badge status-{{ $dep->status }}">{{ ucfirst($dep->status) }}</span>
                </td>
                <td>{{ $dep->created_at->format('d M Y') }}</td>
                <td class="text-end">
                  @if(auth()->user()->isAdmin())
                    <button class="btn btn-sm btn-outline-secondary edit-btn" data-bs-toggle="modal" data-bs-target="#editDepositModal" data-deposit='@json($dep)'>
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $dep->id }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @empty
              <tr><td colspan="8" class="text-center text-muted py-4">Nessun deposito trovato.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@if(auth()->user()->isAdmin())

@include('investor.deposits.components.add-deposit-modal')
@include('investor.deposits.components.edit-deposit-modal')
@endif

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
