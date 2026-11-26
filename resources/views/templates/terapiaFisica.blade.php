@extends('layout.app')
@section('title', 'Terapia Física')
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
            <span>Terapia Física</span>
        </div>
        <h1><i class="fa fa-running" style="margin-right:14px;opacity:0.75;"></i>Terapia Física</h1>
        <p>Rehabilitación funcional para recuperar movilidad, fuerza y autonomía</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la terapia física?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Movimiento que devuelve calidad de vida</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Terapia Física</strong> (fisioterapia) evalúa y trata las alteraciones del movimiento causadas por lesiones, enfermedades o cirugías. A través del <strong>ejercicio terapéutico, técnicas manuales y modalidades físicas</strong>, busca disminuir el dolor, recuperar la función y prevenir nuevas lesiones.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">En el Instituto tenemos un enfoque especial en la <strong>neurorrehabilitación</strong>: acompañamos a pacientes que han sufrido un ACV, trauma craneoencefálico, lesiones de nervio periférico o enfermedades como Parkinson y esclerosis múltiple, además de las condiciones musculoesqueléticas más frecuentes.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/hero-terapias.png',
                    'alt' => 'Sesión de terapia física — Instituto Neurociencias de Nariño',
                    'caption' => 'Rehabilitación personalizada por sesión',
                    'class' => 'consulta-side-photo--inline',
                ])
                <div class="info-card mt-3" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:14px;">¿Quién puede beneficiarse?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Secuelas de ACV o trauma craneoencefálico</li>
                        <li>Parkinson y otras enfermedades neurológicas</li>
                        <li>Dolor lumbar, cervical o de hombro</li>
                        <li>Hernias discales y estenosis espinal</li>
                        <li>Recuperación después de fracturas o cirugías</li>
                        <li>Tendinopatías y lesiones deportivas</li>
                        <li>Enfermedades respiratorias crónicas</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Unidad de Terapia Física</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Tratamientos que ofrecemos</h3>
            <div class="row g-3">
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-dumbbell"></i><p>Terapia física integral</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-brain"></i><p>Neurorrehabilitación</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-lungs"></i><p>Rehabilitación pulmonar</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-bolt"></i><p>Ondas de choque</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-bone"></i><p>Tracción y descompresión lumbar</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-hand-holding-medical"></i><p>Modalidades mecánicas y manuales</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-heartbeat"></i><p>Piso pélvico</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-spa"></i><p>Drenaje linfático osteopático</p></div></div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-route" style="color:var(--primary);margin-right:8px;"></i>¿Cómo es el proceso?</h3>
                    <ol style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li><strong>Valoración inicial:</strong> el fisioterapeuta evalúa su movilidad, fuerza, dolor y funcionalidad.</li>
                        <li><strong>Plan personalizado:</strong> se definen objetivos y número de sesiones según su condición.</li>
                        <li><strong>Sesiones de tratamiento:</strong> ejercicio terapéutico, técnicas manuales y modalidades físicas.</li>
                        <li><strong>Seguimiento:</strong> se miden avances y se entregan ejercicios para realizar en casa.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-clipboard-list" style="color:var(--primary);margin-right:8px;"></i>Recomendaciones para sus sesiones</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li>Asista con ropa cómoda y calzado deportivo</li>
                        <li>Traiga la orden médica y sus exámenes (radiografías, resonancias, etc.)</li>
                        <li>Llegue 10 minutos antes de su cita</li>
                        <li>Informe si tiene marcapasos, prótesis metálicas o está en embarazo</li>
                        <li>Realice en casa los ejercicios que le indique su terapeuta</li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-clock" style="color:var(--primary);margin-right:8px;"></i><strong>Duración:</strong> cada sesión dura aproximadamente <strong>45 a 60 minutos</strong>. El número total de sesiones depende de su diagnóstico y de la evolución que tenga durante el tratamiento.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('landing.tiposTerapia'), 'secondaryLabel' => 'Ver tipos de terapia'])
    </div>
</section>
@endsection
