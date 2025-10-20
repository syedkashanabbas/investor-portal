<div class="modal fade" id="timelineModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="bi bi-clock-history me-2"></i> Cronologia del Progetto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="timelineBody" class="position-relative">
          {{-- JS will inject steps here --}}
          <div class="text-center text-muted py-5">
            <i class="bi bi-hourglass-split display-6 d-block mb-3"></i>
            <span class="fw-semibold">Caricamento delle fasi del progetto...</span>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<style>
#timelineBody ul.list-group { border-radius: .75rem; overflow: hidden; }
#timelineBody li { border-left: 4px solid #0d6efd; padding-left: .75rem; }
#timelineBody li .bi { font-size: 1.2rem; }
</style>
