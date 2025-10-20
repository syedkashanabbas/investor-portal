<div class="modal fade" id="attachModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="bi bi-paperclip me-2"></i> Allega Documenti</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="/noop" class="dropzone dz-clickable border-2 border-dashed rounded p-5 bg-light" id="dzProjectFiles">
            @csrf
            <div class="dz-message text-center">
                <i class="bi bi-cloud-upload display-4 d-block mb-3 text-primary"></i>
                <span class="fs-5 fw-semibold">Trascina i file qui o clicca per caricare</span>
                <div class="text-muted small mt-1">PDF, DOCX, XLSX, immagini fino a 5MB</div>
            </div>
        </form>
        <small class="text-muted d-block mt-3"><i class="bi bi-info-circle"></i> Questo è solo demo. I file non verranno caricati realmente.</small>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<style>
#dzProjectFiles { transition: background .3s; }
#dzProjectFiles.dz-drag-hover { background:#eaf4ff; border-color:#0d6efd; }
</style>
