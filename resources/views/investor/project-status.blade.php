{{-- resources/views/investor/project-status.blade.php --}}
@extends('layouts.layout1')

@section('title', 'Ethica Holdings | Investor Dashboard')

@section('content')
<div class="container-fluid py-4">
  <div class="overlay-local"><span>Coming Soon</span></div>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1" data-aos="fade-right">Stato dei Progetti</h1>
            <p class="text-muted mb-0" data-aos="fade-right" data-aos-delay="100">Dati statici, atmosfera autentica.</p>
        </div>
        <div class="d-flex gap-2" data-aos="fade-left">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input id="projectSearch" type="search" class="form-control" placeholder="Cerca progetti o tag">
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCardModal">
                <i class="bi bi-plus-lg"></i> Nuova Scheda
            </button>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-3" data-aos="zoom-in">
            <div class="card stat h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="small text-muted">Attivi</div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="display-6 fw-bold" id="statActive">—</div>
                        <span class="badge bg-success-subtle text-success">buono</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3" data-aos="zoom-in" data-aos-delay="50">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="small text-muted">Somma Budget</div>
                    <div class="display-6 fw-bold" id="statBudget">$—</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="small text-muted">Progresso Medio</div>
                    <div class="display-6 fw-bold" id="statAvg">—%</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3" data-aos="zoom-in" data-aos-delay="150">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="small text-muted">Alto Rischio</div>
                    <div class="display-6 fw-bold" id="statRisk">—</div>
                </div>
            </div>
        </div>
    </div>

    @php
        $stages = [
            'backlog' => ['title' => 'Backlog','color' => 'secondary'],
            'in_progress' => ['title' => 'In Corso','color' => 'primary'],
            'review' => ['title' => 'Revisione','color' => 'warning'],
            'done' => ['title' => 'Completato','color' => 'success'],
        ];
    @endphp

    <div class="kanban row g-3">
        @foreach ($stages as $key => $meta)
            <div class="col-12 col-md-6 col-xl-3" data-aos="fade-up">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-white border-0 pb-0 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-{{ $meta['color'] }}">&nbsp;</span>
                            <h2 class="h6 mb-0">{{ $meta['title'] }}</h2>
                            <span class="text-muted small" data-stage-count="{{ $key }}">0</span>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-{{ $meta['color'] }}" data-add-card="{{ $key }}">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-{{ $meta['color'] }}" data-collapse="{{ $key }}">
                                <i class="bi bi-arrows-collapse"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="kanban-col" id="col-{{ $key }}">
                            @foreach ($projects as $p)
                                @if ($p['stage'] === $key)
                                    <div class="kanban-card card border-0 shadow-sm mb-3"
                                         data-id="{{ $p['id'] }}"
                                         data-name="{{ $p['name'] }}"
                                         data-tags="{{ strtolower(implode(',', $p['tags'])) }}"
                                         data-budget="{{ $p['budget'] }}"
                                         data-progress="{{ $p['progress'] }}"
                                         data-risk="{{ $p['risk'] }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="drag-handle text-muted"><i class="bi bi-grip-vertical"></i></span>
                                                    <div>
                                                        <div class="fw-semibold">{{ $p['name'] }}</div>
                                                        <div class="text-muted small">{{ $p['company'] }}</div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <span class="badge bg-light text-dark">ID {{ $p['id'] }}</span>
                                                    @if($p['risk']==='high')
                                                        <span class="badge bg-danger-subtle text-danger">Rischio</span>
                                                    @elseif($p['risk']==='medium')
                                                        <span class="badge bg-warning-subtle text-warning">Attenzione</span>
                                                    @else
                                                        <span class="badge bg-success-subtle text-success">Calmo</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between small">
                                                <div class="text-muted">Budget</div>
                                                <div class="fw-semibold budget-value">${{ number_format($p['budget']) }}</div>
                                            </div>

                                            <div class="progress my-2" style="height:8px;">
                                                <div class="progress-bar" style="width: {{ $p['progress'] }}%"></div>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between small">
                                                <div class="text-muted">
                                                    <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($p['deadline'])->format('M d, Y') }}
                                                </div>
                                                <div class="avatars">
                                                    <img class="rounded-circle shadow-sm avatar" alt="PM"
                                                         src="https://ui-avatars.com/api/?name={{ urlencode(substr($p['company'],0,1)) }}&size=32">
                                                    <img class="rounded-circle shadow-sm avatar" alt="Lead"
                                                         src="https://ui-avatars.com/api/?name={{ urlencode(substr($p['name'],0,1)) }}&size=32">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-1 mt-2">
                                                @foreach ($p['tags'] as $t)
                                                    <span class="badge rounded-pill bg-light text-dark">{{ $t }}</span>
                                                @endforeach
                                            </div>

                                            <div class="mt-3 d-flex justify-content-between">
                                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#timelineModal" data-project='@json($p)'>
                                                    Cronologia
                                                </button>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#attachModal" data-project-id="{{ $p['id'] }}">
                                                        Allega
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#" data-quick-progress="10">+10% progresso</a></li>
                                                        <li><a class="dropdown-item" href="#" data-flag-risk="high">Segnala Alto Rischio</a></li>
                                                        <li><a class="dropdown-item" href="#" data-move-to="review">Sposta in Revisione</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>


{{-- Modals unchanged from before --}}
@include('investor.partials._timeline_modal')
@include('investor.partials._attach_modal')

<style>
.kanban-col{min-height:65vh;padding:.5rem;background:#f8f9fa;border-radius:.75rem;transition:background .2s, transform .2s}
.kanban-col.drop-hover{background:#eef5ff;outline:2px dashed #b9d3ff}
.kanban-card{cursor:grab;border-radius:1rem;transition:transform .12s ease, box-shadow .12s ease}
.kanban-card:active{cursor:grabbing}
.kanban-card.dragging{opacity:.8;transform:rotate(.5deg)}
.drag-handle{cursor:grab}
.avatar{width:24px;height:24px;object-fit:cover;border:2px solid #fff;margin-left:-6px}
.stat .display-6{letter-spacing:.5px}
</style>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css">
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    Dropzone.autoDiscover = false;
    const dz = new Dropzone('#dzProjectFiles', { url: '/noop', autoProcessQueue:false, maxFilesize:5, addRemoveLinks:true });

    const cols = ['backlog','in_progress','review','done'];

    cols.forEach(key => {
        const el = document.getElementById('col-'+key);
        new Sortable(el, {
            group:'kanban',
            animation:180,
            handle:'.drag-handle',
            ghostClass:'bg-light',
            dragClass:'dragging',
            onChoose: evt => { evt.from.classList.add('drop-hover') },
            onUnchoose: evt => { evt.from.classList.remove('drop-hover') },
            onAdd: evt => { evt.to.classList.remove('drop-hover') },
            onOver: evt => { evt.to.classList.add('drop-hover') },
            onEnd: (evt) => {
                evt.to.classList.remove('drop-hover');
                const card = evt.item;
                const newStage = evt.to.id.replace('col-','');
                savePosition(card.dataset.id, newStage, evt.newDraggableIndex);
                flash(card);
                updateCounts();
            }
        });
    });

    document.querySelectorAll('[data-collapse]').forEach(btn=>{
        btn.addEventListener('click',()=>{
            const key = btn.getAttribute('data-collapse');
            document.getElementById('col-'+key).classList.toggle('d-none');
        });
    });

    document.querySelectorAll('[data-add-card]').forEach(btn=>{
        btn.addEventListener('click',()=>{
            const stage = btn.getAttribute('data-add-card');
            const col = document.getElementById('col-'+stage);
            const id = Math.floor(Math.random()*9000)+1000;

            const div = document.createElement('div');
            div.className='kanban-card card border-0 shadow-sm mb-3';
            div.dataset.id=id;
            div.dataset.name='New Project (Draft)';
            div.dataset.tags='draft';
            div.dataset.budget='0';
            div.dataset.progress='10';
            div.dataset.risk='low';

            div.innerHTML=`<div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="drag-handle text-muted"><i class="bi bi-grip-vertical"></i></span>
                        <div><div class="fw-semibold">New Project (Draft)</div><div class="text-muted small">TBD</div></div>
                    </div>
                    <span class="badge bg-light text-dark">ID ${id}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Budget</div>
                    <div class="fw-semibold budget-value">$0</div>
                </div>
                <div class="progress my-2" style="height:8px;"><div class="progress-bar" style="width: 10%"></div></div>
                <div class="d-flex justify-content-between small">
                    <span class="text-muted"><i class="bi bi-calendar-event"></i> —</span>
                    <div class="avatars"><img class="rounded-circle shadow-sm avatar" src="https://ui-avatars.com/api/?name=N&size=32"></div>
                </div>
                <div class="d-flex flex-wrap gap-1 mt-2"><span class="badge rounded-pill bg-light text-dark">Draft</span></div>
                <div class="mt-3 d-flex justify-content-between">
                    <button class="btn btn-sm btn-outline-secondary" disabled>Timeline</button>
                    <button class="btn btn-sm btn-outline-dark" disabled>Attach</button>
                </div>
            </div>`;
            col.prepend(div);
            updateCounts();
        });
    });

    const search = document.getElementById('projectSearch');
    search.addEventListener('input', () => {
        const q = search.value.toLowerCase();
        document.querySelectorAll('.kanban-card').forEach(card => {
            const str = (card.dataset.name + ' ' + (card.dataset.tags||'')).toLowerCase();
            card.style.display = str.includes(q) ? '' : 'none';
        });
        updateCounts();
    });

    document.querySelectorAll('[data-quick-progress]').forEach(a=>{
        a.addEventListener('click', e=>{
            e.preventDefault();
            const card = e.target.closest('.dropdown').parentElement.parentElement.parentElement;
            const bar = card.querySelector('.progress-bar');
            const cur = parseInt(bar.style.width||'0');
            const inc = parseInt(e.target.getAttribute('data-quick-progress'));
            const next = Math.min(cur+inc,100);
            bar.style.width = next+'%';
            card.dataset.progress = next.toString();
            flash(card);
            updateCounts();
        });
    });
    document.querySelectorAll('[data-flag-risk]').forEach(a=>{
        a.addEventListener('click', e=>{
            e.preventDefault();
            const card = e.target.closest('.kanban-card');
            card.dataset.risk = 'high';
            const badgeWrap = card.querySelector('.text-end');
            badgeWrap.querySelectorAll('.badge').forEach(b=>{ if(!b.textContent.trim().startsWith('ID')) b.remove(); });
            const span = document.createElement('span'); span.className='badge bg-danger-subtle text-danger ms-1'; span.textContent='Risk';
            badgeWrap.appendChild(span);
            updateCounts();
        });
    });
    document.querySelectorAll('[data-move-to]').forEach(a=>{
        a.addEventListener('click', e=>{
            e.preventDefault();
            const target = e.target.getAttribute('data-move-to');
            const card = e.target.closest('.kanban-card');
            document.getElementById('col-'+target).prepend(card);
            flash(Project Timelinecard);
            updateCounts();
        });
    });

    function flash(el){ el.style.boxShadow='0 0 0 3px rgba(25,135,84,.25)'; setTimeout(()=>{ el.style.boxShadow=''; },450); }

    function savePosition(id, stage, index){
        const key='kanbanPositions'; const map = JSON.parse(localStorage.getItem(key) || '{}');
        map[id]={stage,index}; localStorage.setItem(key, JSON.stringify(map));
    }

    // NEW: stats computed from data-attributes (robust)
    function updateCounts(){
        ['backlog','in_progress','review','done'].forEach(s=>{
            const span=document.querySelector(`[data-stage-count="${s}"]`);
            const visible=[...document.querySelectorAll(`#col-${s} .kanban-card`)]
                .filter(c=>c.style.display!=='none');
            span.textContent=visible.length;
        });

        const all=[...document.querySelectorAll('.kanban-card')].filter(c=>c.style.display!=='none');

        document.getElementById('statActive').textContent=all.length;

        const sum = all.reduce((a,c)=> a + (parseInt(c.dataset.budget)||0), 0);
        document.getElementById('statBudget').textContent='$'+sum.toLocaleString();

        const avg = all.length ? Math.round(all.reduce((a,c)=> a + (parseInt(c.dataset.progress)||0), 0) / all.length) : 0;
        document.getElementById('statAvg').textContent=avg+'%';

        const riskCount = all.filter(c=> (c.dataset.risk||'').toLowerCase()==='high').length;
        document.getElementById('statRisk').textContent=riskCount;
    }

    updateCounts();
});
</script>
@endpush
