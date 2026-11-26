@extends('layout.app')
@section('title', 'Neuropsicología')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .func-box { background:var(--primary-ultra); border-radius:10px; padding:16px 18px; text-align:center; }
    .func-box i { font-size:22px; color:var(--primary); margin-bottom:10px; display:block; }
    .func-box p { font-size:12.5px; color:var(--dark); font-weight:700; margin:0; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Neuropsicología</span>
        </div>
        <h1><i class="fa fa-puzzle-piece" style="margin-right:14px;opacity:0.75;"></i>Neuropsicología</h1>
        <p>Evaluación y rehabilitación de las funciones cognitivas del cerebro</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la neuropsicología?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">El puente entre el cerebro y el comportamiento</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Neuropsicología</strong> estudia la relación entre el funcionamiento cerebral y la conducta humana. Evalúa las <strong>funciones cognitivas</strong> (memoria, atención, lenguaje, razonamiento) mediante baterías de pruebas estandarizadas para identificar si existen alteraciones y su localización neuroanatómica.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La evaluación neuropsicológica es fundamental en el diagnóstico de <strong>demencias</strong>, seguimiento post-lesión cerebral, TDAH, epilepsia y en la planificación de la rehabilitación cognitiva.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/consulta-neuropsicologia.png',
                    'alt' => 'Evaluación de neuropsicología — Instituto Neurociencias de Nariño',
                    'caption' => 'Evaluación de funciones cognitivas',
                    'class' => 'consulta-side-photo--inline',
                ])
                <div class="info-card mt-3" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:14px;">¿Quién necesita esta evaluación?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Pérdida de memoria progresiva</li>
                        <li>Dificultades de atención-concentración</li>
                        <li>Problemas de lenguaje post-ACV</li>
                        <li>Sospecha de demencia o Alzheimer</li>
                        <li>Lesiones cerebrales traumáticas</li>
                        <li>Evaluación pre/post cirugía cerebral</li>
                        <li>Seguimiento en epilepsia</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Funciones cognitivas evaluadas -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Evaluación neuropsicológica</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Funciones cognitivas que evaluamos</h3>
            <div class="row g-3">
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-brain"></i><p>Memoria verbal y visual</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-eye"></i><p>Atención y concentración</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-comments"></i><p>Lenguaje y comunicación</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-chess"></i><p>Funciones ejecutivas</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-shapes"></i><p>Praxias y gnosias</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-compass"></i><p>Orientación temporo-espacial</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-chart-line"></i><p>Velocidad de procesamiento</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-balance-scale"></i><p>Razonamiento y abstracción</p></div></div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-clock" style="color:var(--primary);margin-right:8px;"></i><strong>Duración de la evaluación:</strong> La evaluación neuropsicológica completa puede requerir entre <strong>2 y 4 horas</strong> distribuidas en 1 o 2 sesiones. El neuropsicólogo entregará un informe detallado con los resultados e indicaciones terapéuticas.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('especialidades'), 'secondaryLabel' => 'Ver todas las especialidades'])
    </div>
</section>
@endsection

