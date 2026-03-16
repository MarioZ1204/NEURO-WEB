@extends('layout.app')
@section('title', 'Estados Financieros')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }

    .ef-card {
        background:#fff; border-radius:14px; padding:24px 28px;
        box-shadow:0 4px 20px rgba(0,0,0,0.07); height:100%;
        display:flex; gap:18px; align-items:flex-start;
        transition:transform 0.22s, box-shadow 0.22s;
    }
    .ef-card:hover { transform:translateY(-3px); box-shadow:0 8px 30px rgba(0,0,0,0.12); }
    .ef-icon {
        width:52px; height:52px; border-radius:12px; flex-shrink:0;
        background:linear-gradient(135deg, var(--primary), var(--primary-dark));
        display:flex; align-items:center; justify-content:center;
    }
    .ef-icon i { color:#fff; font-size:20px; }
    .ef-body h5 { font-size:15px; font-weight:700; color:var(--dark); margin-bottom:5px; }
    .ef-body p  { font-size:13px; color:#666; line-height:1.7; margin-bottom:14px; }
    .ef-actions { display:flex; gap:10px; flex-wrap:wrap; }
    .btn-ef-pdf {
        display:inline-flex; align-items:center; gap:7px;
        background:linear-gradient(135deg, var(--primary), var(--primary-dark));
        color:#fff; padding:9px 18px; border-radius:25px;
        font-size:12px; font-weight:600; text-decoration:none; letter-spacing:0.3px;
        transition:opacity 0.2s;
    }
    .btn-ef-pdf:hover { opacity:0.85; color:#fff; }
    .btn-ef-out {
        display:inline-flex; align-items:center; gap:7px;
        border:1.5px solid var(--primary); color:var(--primary);
        padding:8px 16px; border-radius:25px; font-size:12px;
        font-weight:600; text-decoration:none; letter-spacing:0.3px;
        transition:all 0.2s;
    }
    .btn-ef-out:hover { background:var(--primary); color:#fff; }
    .year-badge {
        background:var(--primary-ultra); color:var(--primary-dark);
        font-size:10px; font-weight:700; padding:3px 10px; border-radius:16px;
        letter-spacing:0.5px; text-transform:uppercase; margin-bottom:10px; display:inline-block;
    }
    .notice-box {
        background:#fffbf0; border:1.5px solid #f0c040; border-radius:12px;
        padding:18px 22px; margin-bottom:40px;
        display:flex; gap:14px; align-items:flex-start;
    }
    .empty-state { text-align:center; padding:60px 20px; color:#aaa; }
    .empty-state i { font-size:48px; margin-bottom:16px; }
</style>

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Nuestra Institución</a><span>›</span>
            <a href="{{ route('marcoLegal') }}">Marco Legal</a><span>›</span>
            <span>Estados Financieros</span>
        </div>
        <h1><i class="fa fa-chart-bar" style="margin-right:14px;opacity:0.75;"></i>Estados Financieros</h1>
        <p>Transparencia financiera del Instituto Neurociencias de Nariño IPS S.A.S.</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-9">
                <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;">Transparencia y rendición de cuentas</p>
                <h2 style="font-size:clamp(20px,2.5vw,30px);font-weight:800;color:var(--dark);margin-bottom:14px;">Estados Financieros Institucionales</h2>
                <p style="font-size:14px;color:#666;line-height:1.8;">Publicamos los estados financieros del Instituto Neurociencias de Nariño IPS S.A.S. como parte de nuestro compromiso con la transparencia y la rendición de cuentas ante pacientes, aseguradoras y organismos de control.</p>
            </div>
        </div>

        <div class="notice-box">
            <i class="fa fa-info-circle" style="color:#c0820a;font-size:20px;margin-top:2px;flex-shrink:0;"></i>
            <div>
                <strong style="font-size:13px;color:#7a5200;display:block;margin-bottom:4px;">Información para su consulta</strong>
                <p style="font-size:12.5px;color:#7a5200;margin:0;">Los documentos publicados en esta sección son de carácter informativo y han sido preparados por el área contable del Instituto. Para consultas específicas escriba a <a href="mailto:contabilidadneurociencias@gmail.com" style="color:var(--primary);font-weight:600;">contabilidadneurociencias@gmail.com</a>.</p>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- ESTADOS FINANCIEROS — Editar este array para agregar PDFs    -->
        <!-- Subir los PDFs a: public/assets/pdf/                         -->
        <!-- ============================================================ -->
        @php
        $estados = [
            /**
             * Para agregar un estado financiero:
             * ['anio' => '2024', 'periodo' => 'Año completo',
             *  'titulo' => 'Estado de Situación Financiera 2024',
             *  'descripcion' => 'Balance general al 31 de diciembre de 2024...',
             *  'archivo' => 'estado-financiero-2024.pdf'],
             *
             * Subir el PDF a public/assets/pdf/ y poner solo el nombre del archivo.
             */

            // ── EJEMPLO — Descomentar y editar ──
            // ['anio' => '2024', 'periodo' => 'Año completo',
            //  'titulo' => 'Estado de Situación Financiera 2024',
            //  'descripcion' => 'Balance general, estado de resultados y flujo de efectivo correspondientes al ejercicio fiscal 2024.',
            //  'archivo' => 'ef-neurociencias-2024.pdf'],
            //
            // ['anio' => '2023', 'periodo' => 'Año completo',
            //  'titulo' => 'Estado de Situación Financiera 2023',
            //  'descripcion' => 'Estados financieros auditados del ejercicio fiscal 2023.',
            //  'archivo' => 'ef-neurociencias-2023.pdf'],
        ];
        @endphp

        @if(count($estados) === 0)
        <div class="empty-state">
            <i class="fa fa-chart-bar" style="color:var(--primary-light);"></i>
            <h4 style="font-size:18px;font-weight:700;color:var(--dark);margin-bottom:8px;">En preparación</h4>
            <p style="font-size:14px;max-width:440px;margin:0 auto;">Los estados financieros serán publicados en esta sección próximamente. Para información contable inmediata contáctenos en <a href="mailto:contabilidadneurociencias@gmail.com" style="color:var(--primary);">contabilidadneurociencias@gmail.com</a>.</p>
        </div>
        @else
        <div class="row g-4">
            @foreach($estados as $ef)
            <div class="col-lg-6">
                <div class="ef-card">
                    <div class="ef-icon"><i class="fa fa-file-pdf"></i></div>
                    <div class="ef-body">
                        <span class="year-badge">{{ $ef['anio'] }} · {{ $ef['periodo'] }}</span>
                        <h5>{{ $ef['titulo'] }}</h5>
                        <p>{{ $ef['descripcion'] }}</p>
                        <div class="ef-actions">
                            <a href="{{ asset('assets/pdf/' . $ef['archivo']) }}" target="_blank" class="btn-ef-pdf">
                                <i class="fa fa-eye"></i> Ver PDF
                            </a>
                            <a href="{{ asset('assets/pdf/' . $ef['archivo']) }}" download class="btn-ef-out">
                                <i class="fa fa-download"></i> Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('marcoLegal') }}" class="btn-cta-outline" style="border-radius:25px;padding:12px 30px;font-size:13px;text-decoration:none;margin-right:10px;">Volver a Marco Legal</a>
            <a href="{{ route('landing.aboutUs') }}" class="btn-cta-outline" style="border-radius:25px;padding:12px 30px;font-size:13px;text-decoration:none;">Nuestra Institución</a>
        </div>
    </div>
</section>
@endsection
