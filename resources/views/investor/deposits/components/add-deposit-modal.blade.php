<!-- Add Modal -->
<div class="modal fade" id="addDepositModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Nuovo Deposito</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addDepositForm" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Investitore</label>
            <select name="user_id" class="form-select" required>
              @foreach(App\Models\User::where('role', 'investor')->get() as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Importo (€)</label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Metodo di Pagamento</label>
            <input type="text" class="form-control" name="payment_method" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Documento (PDF, DOCX, XLSX)</label>
            <input type="file" class="form-control" name="document" accept=".pdf,.doc,.docx,.xls,.xlsx">
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