@extends('layout.app')
@section('title', 'Tipos de Consulta')
@section('content')

<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 80px 0 60px;
        text-align: center;
        color: #fff;
    }
    .page-hero h1 { font-size: clamp(28px, 4vw, 48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }

    .consulta-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
    }
    .consulta-card:hover { transform: translateY(-6px); box-shadow: 0 15px 40px rgba(74,107,104,0.18); }
    .consulta-card .c-header {
        background: var(--primary);
        padding: 25px 25px 20px;
        display: flex; align-items: center; gap: 15px;
    }
    .consulta-card .c-header .icon-circle {
        width: 50px; height: 50px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .consulta-card .c-header h5 {
        color: #fff;
        font-size: 15px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0;
    }
    .consulta-card .c-body {
        padding: 25px;
    }
    .consulta-card .c-body p {
        font-size: 14px;
        color: #555;
        line-height: 1.8;
        margin: 0;
        text-align: justify;
    }
    .consulta-card .c-body ul {
        list-style: none;
        padding: 0;
        margin: 12px 0 0;
    }
    .consulta-card .c-body ul li {
        font-size: 13.5px;
        color: #444;
        padding: 5px 0;
        display: flex; gap: 8px; align-items: flex-start;
    }
    .consulta-card .c-body ul li::before {
        content: "›";
        color: var(--primary);
        font-weight: 900;
        font-size: 16px;
        line-height: 1.2;
        flex-shrink: 0;
    }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Servicios</a>
            <span>›</span>
            <span>Tipos de Consulta</span>
        </div>
        <h1>Tipos de Consulta</h1>
        <p>Atención neurológica especializada y personalizada para cada paciente</p>
    </div>
</div>

<section style="background:#f8faf9; padding: 70px 0;">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-9">
                <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:10px;">Portafolio de Consultas</p>
                <h2 style="font-size:clamp(22px,3vw,36px);font-weight:800;color:var(--dark);margin-bottom:14px;">Servicios de Consulta Especializada</h2>
                <p style="font-size:15px;color:#666;line-height:1.8;margin:0;">Ofrecemos consultas de primera vez y de control en todas nuestras especialidades, así como valoraciones interdisciplinarias, psicoterapias y evaluaciones neuropsicológicas.</p>
            </div>
        </div>

        <div class="row g-4">

            <!-- Neurología -->
            <div class="col-lg-6 col-md-6">
                <div class="consulta-card">
                    <div class="c-header">
                        <div class="icon-circle">
                            <i class="fa fa-brain" style="color:#fff; font-size:20px;"></i>
                        </div>
                        <h5>Neurología General</h5>
                    </div>
                    <div class="c-body">
                        <p>Evaluación, diagnóstico y tratamiento de enfermedades del sistema nervioso central y periférico. Atención médica integral con enfoque humano y científico.</p>
                        <ul>
                            <li>Consulta primera vez y control</li>
                            <li>Cefaleas y migrañas</li>
                            <li>Mareo y vértigo de origen neurológico</li>
                            <li>Trastornos del movimiento</li>
                            <li>Neuropatías periféricas</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Epileptología -->
            <div class="col-lg-6 col-md-6">
                <div class="consulta-card">
                    <div class="c-header" style="background:var(--primary-dark);">
                        <div class="icon-circle">
                            <i class="fa fa-bolt" style="color:#fff; font-size:20px;"></i>
                        </div>
                        <h5>Epileptología</h5>
                    </div>
                    <div class="c-body">
                        <p>Diagnóstico y manejo especializado de epilepsia y otras crisis paroxísticas no epilépticas, con seguimiento continuo y ajuste de tratamiento.</p>
                        <ul>
                            <li>Diagnóstico y clasificación de epilepsia</li>
                            <li>Optimización antiepiléptica</li>
                            <li>Epilepsia refractaria</li>
                            <li>Crisis epilépticas en niños y adultos</li>
                            <li>Evaluación prequirúrgica de epilepsia</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Neurología Cognitiva -->
            <div class="col-lg-6 col-md-6">
                <div class="consulta-card">
                    <div class="c-header" style="background:var(--primary-light);">
                        <div class="icon-circle">
                            <i class="fa fa-head-side-brain" style="color:#fff; font-size:20px;"></i>
                        </div>
                        <h5>Neurología Cognitiva</h5>
                    </div>
                    <div class="c-body">
                        <p>Evaluación de funciones cognitivas superiores. Diagnóstico y manejo de demencias, deterioro cognitivo y otras condiciones que afectan la memoria y conducta.</p>
                        <ul>
                            <li>Deterioro cognitivo leve y demencias</li>
                            <li>Enfermedad de Alzheimer</li>
                            <li>Demencia vascular</li>
                            <li>Trastornos conductuales y de memoria</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Consulta de Sueño -->
            <div class="col-lg-6 col-md-6">
                <div class="consulta-card">
                    <div class="c-header" style="background:var(--primary);">
                        <div class="icon-circle">
                            <i class="fa fa-moon" style="color:#fff; font-size:20px;"></i>
                        </div>
                        <h5>Medicina del Sueño</h5>
                    </div>
                    <div class="c-body">
                        <p>Diagnóstico y tratamiento integral de los trastornos del sueño, mediante evaluación clínica especializada y estudios de polisomnografía.</p>
                        <ul>
                            <li>Insomnio crónico</li>
                            <li>Síndrome de apnea obstructiva del sueño</li>
                            <li>Hipersomnia y narcolepsia</li>
                            <li>Parasomnias y movimientos anormales durante el sueño</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div style="text-align:center; margin-top:50px;">
            <p style="font-size:16px; color:#555; margin-bottom:20px;">¿Deseas agendar una consulta?</p>
            <a href="#map" class="btn-cta-solid" style="border-radius:25px; padding:13px 35px; font-size:13px; text-decoration:none;">Contáctanos</a>
            &nbsp;
            <a href="{{ route('landing.inicio') }}" class="btn-cta-outline" style="border-radius:25px; padding:11px 33px; font-size:13px; text-decoration:none;">Volver al inicio</a>
        </div>
    </div>
</section>

@endsection
