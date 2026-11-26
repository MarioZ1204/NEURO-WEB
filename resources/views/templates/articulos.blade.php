@extends('layout.app')
@section('title', 'Artículos y Revistas')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }

    /* Filter pills */
    .filter-bar { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:32px; }
    .filter-pill {
        padding:7px 18px; border-radius:30px; font-size:12px; font-weight:600;
        border:1.5px solid var(--primary-light); color:var(--primary-dark);
        background:transparent; cursor:pointer; letter-spacing:0.3px;
        transition:all 0.2s;
    }
    .filter-pill:hover, .filter-pill.active {
        background:var(--primary); border-color:var(--primary); color:#fff;
    }

    /* Article card */
    .article-card {
        background:#fff; border-radius:14px;
        box-shadow:0 4px 20px rgba(0,0,0,0.07);
        overflow:hidden; height:100%;
        display:flex; flex-direction:column;
        transition:transform 0.25s, box-shadow 0.25s;
    }
    .article-card:hover { transform:translateY(-4px); box-shadow:0 10px 35px rgba(0,0,0,0.12); }
    .article-card-thumb {
        height:10px;
        background:linear-gradient(135deg,var(--primary),var(--primary-dark));
    }
    .article-card-body { padding:22px 24px; flex:1; display:flex; flex-direction:column; }
    .article-type-badge {
        display:inline-flex; align-items:center; gap:6px;
        font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px;
        padding:4px 12px; border-radius:20px; margin-bottom:12px;
    }
    .badge-pdf  { background:#fff0f0; color:#c0392b; }
    .badge-flip { background:#f0f7ff; color:#1455a0; }
    .badge-link { background:#f0fff4; color:#196b2a; }
    .article-card h5 { font-size:15px; font-weight:700; color:var(--dark); margin-bottom:8px; line-height:1.4; }
    .article-card p  { font-size:13px; color:#666; line-height:1.7; margin-bottom:auto; flex:1; }
    .article-meta { font-size:11px; color:#999; margin:16px 0 0; display:flex; gap:14px; align-items:center; flex-wrap:wrap; }
    .article-actions { padding:16px 24px 20px; display:flex; gap:10px; }
    .btn-read {
        display:inline-flex; align-items:center; gap:7px;
        background:linear-gradient(135deg,var(--primary),var(--primary-dark));
        color:#fff; padding:9px 20px; border-radius:25px; font-size:12px;
        font-weight:600; text-decoration:none; letter-spacing:0.3px;
        transition:opacity 0.2s;
    }
    .btn-read:hover { opacity:0.88; color:#fff; }
    .btn-read-outline {
        display:inline-flex; align-items:center; gap:7px;
        border:1.5px solid var(--primary); color:var(--primary);
        padding:8px 18px; border-radius:25px; font-size:12px;
        font-weight:600; text-decoration:none; letter-spacing:0.3px;
        transition:all 0.2s;
    }
    .btn-read-outline:hover { background:var(--primary); color:#fff; }

    /* Flipbook embed modal */
    .flip-modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.75); z-index:2000; align-items:center; justify-content:center; }
    .flip-modal-overlay.open { display:flex; }
    .flip-modal { background:#fff; border-radius:12px; overflow:hidden; width:min(900px,95vw); max-height:90vh; display:flex; flex-direction:column; }
    .flip-modal-header { background:var(--primary-dark); color:#fff; padding:14px 20px; display:flex; justify-content:space-between; align-items:center; }
    .flip-modal-header h6 { margin:0; font-size:14px; font-weight:700; }
    .flip-modal-close { background:none; border:none; color:#fff; font-size:20px; cursor:pointer; line-height:1; }
    .flip-modal iframe { border:none; flex:1; min-height:70vh; }

    /* Empty state */
    .empty-state { text-align:center; padding:60px 20px; color:#aaa; }
    .empty-state i { font-size:48px; margin-bottom:16px; }
</style>

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Nuestra Institución</a><span>›</span>
            <span>Artículos y Revistas</span>
        </div>
        <h1><i class="fa fa-book-open" style="margin-right:14px;opacity:0.75;"></i>Artículos y Revistas</h1>
        <p>Publicaciones informativas, artículos científicos y material educativo del Instituto Neurociencias de Nariño</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">

        <div class="row mb-4 align-items-center">
            <div class="col-lg-8">
                <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;">Material educativo</p>
                <h2 style="font-size:clamp(20px,2.5vw,30px);font-weight:800;color:var(--dark);margin-bottom:0;">Biblioteca de Recursos</h2>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filter-bar" id="filterBar">
            <button class="filter-pill active" onclick="filterArticles('all', this)">Todos</button>
            <button class="filter-pill" onclick="filterArticles('pdf', this)">PDF</button>
            <button class="filter-pill" onclick="filterArticles('flip', this)">Revista Digital (Heyzine)</button>
            <button class="filter-pill" onclick="filterArticles('link', this)">Artículo / Enlace</button>
        </div>

        <!-- ======================================================= -->
        <!-- ARTÍCULOS -->
        <!-- ======================================================= -->
        @php
        $articulos = [
            /**
             * Para agregar un artículo:
             *
             * TIPO PDF — subir el PDF a public/assets/pdf/ y usar:
             * ['titulo' => '...', 'descripcion' => '...', 'fecha' => 'Ene 2025',
             *  'tipo' => 'pdf', 'area' => 'Neurología',
             *  'url' => '/assets/pdf/nombre-archivo.pdf'],
             *
             * TIPO HEYZINE — obtener el link de compartir de heyzine.com:
             * ['titulo' => '...', 'descripcion' => '...', 'fecha' => 'Ene 2025',
             *  'tipo' => 'flip', 'area' => 'General',
             *  'url' => 'https://heyzine.com/flip-book/XXXXXXXXX.html'],
             *
             * TIPO ENLACE EXTERNO — cualquier URL:
             * ['titulo' => '...', 'descripcion' => '...', 'fecha' => 'Ene 2025',
             *  'tipo' => 'link', 'area' => 'Investigación',
             *  'url' => 'https://...'],
             */

            // ── EJEMPLO — Descomentar y editar cuando tenga publicaciones ──
            // ['titulo' => 'Guía del Paciente: Preparación para EEG',
            //  'descripcion' => 'Todo lo que debe saber antes de realizarse un electroencefalograma en nuestra institución.',
            //  'fecha' => 'Mar 2026', 'tipo' => 'pdf', 'area' => 'Electrodiagnóstico',
            //  'url' => '/assets/pdf/guia-eeg.pdf'],
        ];
        @endphp

        @if(count($articulos) === 0)
        <div class="empty-state" id="articleGrid">
            <i class="fa fa-book-open" style="color:var(--primary-light);"></i>
            <h4 style="font-size:18px;font-weight:700;color:var(--dark);margin-bottom:8px;">Próximamente</h4>
            <p style="font-size:14px;max-width:400px;margin:0 auto;">Estamos preparando contenido educativo e informativo para nuestros pacientes y profesionales de la salud. ¡Vuelve pronto!</p>
        </div>
        @else
        <div class="row g-4" id="articleGrid">
            @foreach($articulos as $art)
            <div class="col-lg-4 col-md-6 article-item" data-tipo="{{ $art['tipo'] }}">
                <div class="article-card">
                    <div class="article-card-thumb"></div>
                    <div class="article-card-body">
                        @if($art['tipo'] === 'pdf')
                            <span class="article-type-badge badge-pdf"><i class="fa fa-file-pdf"></i> PDF</span>
                        @elseif($art['tipo'] === 'flip')
                            <span class="article-type-badge badge-flip"><i class="fa fa-book-open"></i> Revista Digital</span>
                        @else
                            <span class="article-type-badge badge-link"><i class="fa fa-external-link-alt"></i> Artículo</span>
                        @endif
                        <h5>{{ $art['titulo'] }}</h5>
                        <p>{{ $art['descripcion'] }}</p>
                        <div class="article-meta">
                            <span><i class="fa fa-calendar-alt" style="margin-right:4px;"></i> {{ $art['fecha'] }}</span>
                            @if(isset($art['area']))
                            <span style="background:var(--primary-ultra);color:var(--primary-dark);padding:2px 10px;border-radius:16px;font-weight:600;">{{ $art['area'] }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="article-actions">
                        @if($art['tipo'] === 'pdf')
                            <a href="{{ $art['url'] }}" target="_blank" class="btn-read"><i class="fa fa-file-pdf"></i> Ver PDF</a>
                            <a href="{{ $art['url'] }}" download class="btn-read-outline"><i class="fa fa-download"></i> Descargar</a>
                        @elseif($art['tipo'] === 'flip')
                            <button onclick="openFlip('{{ $art['url'] }}', '{{ addslashes($art['titulo']) }}')" class="btn-read"><i class="fa fa-book-open"></i> Leer Revista</button>
                        @else
                            <a href="{{ $art['url'] }}" target="_blank" rel="noopener" class="btn-read"><i class="fa fa-external-link-alt"></i> Abrir Artículo</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('landing.aboutUs') }}" class="btn-cta-outline" style="border-radius:25px;padding:12px 30px;font-size:13px;text-decoration:none;">Volver a Nuestra Institución</a>
        </div>
    </div>
</section>

<!-- Flipbook Modal -->
<div class="flip-modal-overlay" id="flipModal">
    <div class="flip-modal">
        <div class="flip-modal-header">
            <h6 id="flipModalTitle">Revista Digital</h6>
            <button class="flip-modal-close" onclick="closeFlip()">&times;</button>
        </div>
        <iframe id="flipFrame" src="" title="Revista Digital" allowfullscreen></iframe>
    </div>
</div>

<script>
function filterArticles(tipo, btn) {
    document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.article-item').forEach(function(el) {
        el.style.display = (tipo === 'all' || el.dataset.tipo === tipo) ? '' : 'none';
    });
}
function openFlip(url, title) {
    document.getElementById('flipFrame').src = url;
    document.getElementById('flipModalTitle').textContent = title;
    document.getElementById('flipModal').classList.add('open');
}
function closeFlip() {
    document.getElementById('flipFrame').src = '';
    document.getElementById('flipModal').classList.remove('open');
}
document.getElementById('flipModal').addEventListener('click', function(e) {
    if (e.target === this) closeFlip();
});
</script>
@endsection

