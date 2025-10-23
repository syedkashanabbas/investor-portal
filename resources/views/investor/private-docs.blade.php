@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">

  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h1 class="h3 mb-1" data-aos="fade-right">Documenti Privati</h1>
      <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">Download sicuri: NDA, contratti, pacchetti.</p>
    </div>
    <div class="d-flex gap-2" data-aos="fade-left">
      <button class="btn btn-outline-secondary" id="btnGrid"><i class="fas fa-th"></i></button>
      <button class="btn btn-outline-secondary" id="btnList"><i class="fas fa-list"></i></button>
    </div>
    @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

  </div>

  <div class="row g-3">
    {{-- Left: Folder Tree --}}
    <div class="col-12 col-lg-3" data-aos="fade-up">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-0">
          <div class="h6 mb-0"><i class="fas fa-folder-open me-2 text-warning"></i>Cartelle</div>
        </div>
        <div class="card-body p-2">
          <ul class="doc-tree list-unstyled" id="docTree">
            {{-- costruito da JS dal seed --}}
          </ul>
        </div>
      </div>
    </div>

    {{-- Right: Explorer --}}
    <div class="col-12 col-lg-9">
      
      {{-- Upload Section --}}
      <div class="card border-0 shadow-sm mb-3" data-aos="fade-up">
        <div class="card-body">
          <form id="uploadForm" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-end g-2">
              <div class="col-md-5">
                <label class="form-label small mb-1 text-muted">Cartella</label>
                <select name="folder" id="uploadFolder" class="form-select">
                  @foreach($folders as $f)
                    @if($f['parent'])
                      <option value="{{ $f['name'] }}">{{ $f['name'] }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="col-md-5">
                <label class="form-label small mb-1 text-muted">Seleziona File</label>
                <input type="file" name="file" id="uploadFile" class="form-control" required>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">
                  <i class="fas fa-upload me-1"></i>Carica
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      {{-- Toolbar --}}
      <div class="card border-0 shadow-sm mb-3" data-aos="fade-up">
        <div class="card-body">
          <div class="row g-2 align-items-end">
            <div class="col-12 col-md-4">
              <label class="form-label small text-muted mb-1">Cerca</label>
              <input id="qSearch" class="form-control" placeholder="Nome file, tag…">
            </div>
            <div class="col-6 col-md-3">
              <label class="form-label small text-muted mb-1">Tipo</label>
              <select id="fType" class="form-select">
                <option value="">Tutti</option>
                @foreach($types as $t)<option value="{{ $t }}">{{ strtoupper($t) }}</option>@endforeach
              </select>
            </div>
            <div class="col-6 col-md-3">
              <label class="form-label small text-muted mb-1">Tag</label>
              <select id="fTag" class="form-select">
                <option value="">Qualsiasi</option>
                @foreach($tags as $t)<option value="{{ $t }}">{{ $t }}</option>@endforeach
              </select>
            </div>
            <div class="col-12 col-md-2">
              <label class="form-label small text-muted mb-1">Ordina</label>
              <select id="fSort" class="form-select">
                <option value="updated_desc">Recenti</option>
                <option value="name_asc">Nome A–Z</option>
                <option value="size_desc">Dimensione ↓</option>
                <option value="size_asc">Dimensione ↑</option>
              </select>
            </div>
          </div>
          <div class="mt-2 d-flex align-items-center gap-2 small">
            <div id="crumbs" class="text-muted">Tutti i documenti</div>
            <div class="ms-auto">
              <span id="selCount" class="text-muted">0 selezionati</span>
              <div class="btn-group ms-2">
                <button id="btnDownloadSel" class="btn btn-sm btn-dark" disabled><i class="fas fa-download me-1"></i>Scarica</button>
                <button id="btnRequest" class="btn btn-sm btn-outline-secondary"><i class="fas fa-lock me-1"></i>Richiedi Accesso</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Explorer area --}}
      <div class="card border-0 shadow-sm" data-aos="fade-up">
        <div class="card-body">
          <div id="explorer" class="explorer grid">
            {{-- elementi popolati da JS --}}
          </div>
          <div class="text-center text-muted small mt-2" id="emptyState" style="display:none;">Nessun documento in questa vista.</div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Preview Modal --}}
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-eye me-2"></i> Anteprima</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="previewBody">
        <div class="text-center text-muted py-5">Caricamento…</div>
      </div>
      <div class="modal-footer bg-light">
        <a id="previewDownload" class="btn btn-dark" href="#" target="_blank"><i class="fas fa-download me-1"></i>Scarica</a>
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

{{-- Seeds to JS --}}
<script id="seedFolders" type="application/json">@json($folders)</script>
<script id="seedFiles" type="application/json">@json($files)</script>

<style>
/* Tree */
.doc-tree li{ padding:.25rem .5rem; border-radius:.5rem; cursor:pointer; }
.doc-tree li.active{ background:#eef5ff; color:#0d6efd; }
.doc-tree .node{ display:flex; align-items:center; gap:.5rem; }
.doc-tree .children{ margin-left:1.25rem; }

/* Explorer */
.explorer.grid{ display:grid; grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); gap:12px; }
.explorer.list .item{ display:flex; align-items:center; gap:12px; }
.item{ border:1px solid rgba(0,0,0,.06); border-radius:.75rem; padding:.6rem; transition:box-shadow .12s, transform .08s; }
.item:hover{ box-shadow:0 8px 20px rgba(0,0,0,.06); transform: translateY(-2px); }
.item .thumb{ border-radius:.5rem; background:#f6f7f9; overflow:hidden; }
.item .meta{ font-size:.84rem; }
.item .tags .badge{ font-weight:600; }
.item .sel{ width:18px; height:18px; }
.kv{ color:#6c757d; }
</style>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/private-docs.js') }}"></script>

<script>
document.querySelector('#uploadForm')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
  const data = new FormData(form);
  const btn = form.querySelector('button');
  btn.disabled = true;
  btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Caricamento...';

  try {
    const res = await fetch('{{ route("investor.docs.upload") }}', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      body: data
    });

    // Explicitly check status before parsing
    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    const out = await res.json();

    if (out.success) {
      toast('File caricato con successo!');
      form.reset();

      // Fix spinner instantly
      btn.disabled = false;
      btn.innerHTML = '<i class="fas fa-upload me-1"></i>Carica';

      // Refresh page smoothly after short delay
      setTimeout(() => {
        window.location.href = '{{ route("investor.docs") }}';
      }, 700);
    } else {
      toast('Errore durante il caricamento.');
      btn.disabled = false;
      btn.innerHTML = '<i class="fas fa-upload me-1"></i>Carica';
    }
  } catch (err) {
    console.error('Upload error:', err);
    toast('Upload fallito.');
    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-upload me-1"></i>Carica';
  }
});

</script>
@endpush
