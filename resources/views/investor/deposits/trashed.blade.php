@extends('layouts.layout1')

@section('title', 'Depositi Eliminati | Ethica Holdings')

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h1 class="h3 mb-1">Depositi Eliminati</h1>
      <p class="text-muted mb-0">Elenco dei depositi eliminati con opzioni per il ripristino o l'eliminazione definitiva.</p>
    </div>
    <a href="{{ route('investor.deposits.index') }}" class="btn btn-outline-primary">
      <i class="fas fa-arrow-left me-1"></i> Torna ai Depositi
    </a>
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
              <th>Eliminato Il</th>
              <th class="text-end">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @forelse($deposits as $dep)
              <tr data-id="{{ $dep->id }}">
                <td>{{ $dep->user->name ?? '-' }}</td>
                <td>{{ $dep->reference_no }}</td>
                <td>€{{ number_format($dep->amount, 2) }}</td>
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
                <td><span class="status-badge status-{{ $dep->status }}">{{ ucfirst($dep->status) }}</span></td>
                <td>{{ $dep->deleted_at->format('d M Y') }}</td>
                <td class="text-end">
                  <button class="btn btn-sm btn-outline-success restore-btn" data-id="{{ $dep->id }}">
                    <i class="fas fa-undo"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger force-delete-btn" data-id="{{ $dep->id }}">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            @empty
              <tr><td colspan="8" class="text-center text-muted py-4">Nessun deposito eliminato trovato.</td></tr>
            @endforelse
          </tbody>
        </table>
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
<script>
document.addEventListener('DOMContentLoaded', () => {

  // Restore deposit
  document.querySelectorAll('.restore-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      const confirm = await Swal.fire({
        title: 'Ripristinare questo deposito?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sì, ripristina',
        cancelButtonText: 'Annulla'
      });
      if (!confirm.isConfirmed) return;

      const response = await fetch(`/investor/deposits/${id}/restore`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
      });
      const data = await response.json();

      if (data.success) Swal.fire('Ripristinato!', data.message, 'success').then(() => location.reload());
      else Swal.fire('Errore', data.message || 'Impossibile ripristinare.', 'error');
    });
  });

  // Force delete
  document.querySelectorAll('.force-delete-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      const confirm = await Swal.fire({
        title: 'Eliminazione definitiva?',
        text: 'Questa azione non può essere annullata!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sì, elimina',
        cancelButtonText: 'Annulla'
      });
      if (!confirm.isConfirmed) return;

      const response = await fetch(`/investor/deposits/${id}/force-delete`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
      });
      const data = await response.json();

      if (data.success) Swal.fire('Eliminato!', data.message, 'success').then(() => location.reload());
      else Swal.fire('Errore', data.message || 'Impossibile eliminare.', 'error');
    });
  });

});
</script>
@endpush
