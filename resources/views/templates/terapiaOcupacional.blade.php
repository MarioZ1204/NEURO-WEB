@extends('layout.app')
@section('title', 'Terapia Ocupacional')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .func-box { background:var(--primary-ultra); border-radius:10px; padding:16px 18px; text-align:center; height:100%; }
    .func-box i { font-size:22px; color:var(--primary); margin-bottom:10px; display:block; }
    .func-box p { font-size:12.5px; color:var(--dark); font-weight:700; margin:0; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Terapia Ocupacional</span>
        </div>
        <h1><i class="fa fa-hands" style="margin-right:14px;opacity:0.75;"></i>Terapia Ocupacional</h1>
        <p>Recuperación de la autonomía en las actividades de la vida diaria</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la terapia ocupacional?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Independencia en lo que usted hace cada día</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Terapia Ocupacional</strong> ayuda a las personas a recuperar, mantener o desarrollar las habilidades necesarias para realizar sus <strong>actividades cotidianas</strong>: vestirse, alimentarse, asearse, escribir, estudiar, trabajar o disfrutar del tiempo libre.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Trabajamos con niños, adultos y adultos mayores con condiciones neurológicas, del desarrollo o físicas, mediante actividades significativas, entrenamiento de la <strong>motricidad fina</strong>, estimulación cognitiva y la adaptación del entorno para que cada paciente logre la mayor independencia posible.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/terapia-ocupacional.jpg',
                    'alt' => 'Sesión de terapia ocupacional — Instituto Neurociencias de Nariño',
                    'caption' => 'Entrenamiento de motricidad fina y actividades diarias',
                    'class' => 'consulta-side-photo--inline',
                ])
                <div class="info-card mt-3" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:14px;">¿Quién puede beneficiarse?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Secuelas de ACV o trauma craneoencefálico</li>
                        <li>Parkinson, esclerosis múltiple y demencias</li>
                        <li>Lesiones de mano y de miembro superior</li>
                        <li>Niños con retraso en el desarrollo motor</li>
                        <li>Trastorno del espectro autista y TDAH</li>
                        <li>Dificultades sensoriales o de coordinación</li>
                        <li>Adultos mayores con pérdida de autonomía</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Unidad de Terapia Ocupacional</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Áreas de intervención</h3>
            <div class="row g-3">
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-tshirt"></i><p>Actividades de la vida diaria</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-hand-paper"></i><p>Motricidad fina y destreza manual</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-puzzle-piece"></i><p>Estimulación cognitiva</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-child"></i><p>Integración sensorial infantil</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-pen"></i><p>Grafomotricidad y escritura</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-home"></i><p>Adaptación del hogar y del entorno</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-wheelchair"></i><p>Ayudas técnicas y dispositivos</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-briefcase"></i><p>Reintegro escolar y laboral</p></div></div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-route" style="color:var(--primary);margin-right:8px;"></i>¿Cómo es el proceso?</h3>
                    <ol style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li><strong>Valoración ocupacional:</strong> se identifican las actividades que se le dificultan y sus metas.</li>
                        <li><strong>Plan de intervención:</strong> se diseñan actividades terapéuticas acordes a su edad y necesidades.</li>
                        <li><strong>Sesiones de entrenamiento:</strong> práctica guiada de habilidades motoras, cognitivas y sensoriales.</li>
                        <li><strong>Hogar y familia:</strong> se orienta a cuidadores y se recomiendan adaptaciones del entorno.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-clipboard-list" style="color:var(--primary);margin-right:8px;"></i>Recomendaciones para sus sesiones</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li>Asista con ropa cómoda</li>
                        <li>Traiga la orden médica y los informes de otras terapias o valoraciones</li>
                        <li>Si es posible, venga con un familiar o cuidador</li>
                        <li>En niños, comparta los reportes del colegio si existen dificultades escolares</li>
                        <li>Practique en casa las actividades recomendadas por su terapeuta</li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-info-circle" style="color:var(--primary);margin-right:8px;"></i><strong>Trabajo en equipo:</strong> la terapia ocupacional se articula con <strong>Neurología, Neuropsicología, Terapia Física y Fonoaudiología</strong> para ofrecerle una rehabilitación integral.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('landing.tiposTerapia'), 'secondaryLabel' => 'Ver tipos de terapia'])
    </div>
</section>
@endsection
