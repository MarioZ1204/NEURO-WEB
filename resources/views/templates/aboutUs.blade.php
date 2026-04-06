@extends('layout.app')
@section('title', 'Nuestra Institución')
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

    .info-card {
        background: #fff;
        border-radius: 16px;
        padding: 35px 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        height: 100%;
        border-top: 4px solid var(--primary);
    }
    .info-card .card-icon { margin-bottom: 20px; }
    .info-card h4 { font-size: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: var(--dark); margin-bottom: 12px; }
    .info-card p { font-size: 14px; color: #666; line-height: 1.8; margin: 0; text-align: justify; }

    .service-row {
        padding: 40px 0 20px;
    }
    .service-row img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 6px 25px rgba(74,107,104,0.15);
    }
    .service-list { list-style: none; padding: 0; margin: 20px 0; }
    .service-list li {
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
        color: #444;
        display: flex; gap: 10px; align-items: flex-start;
    }
    .service-list li span.dot {
        width: 8px; height: 8px;
        background: var(--primary);
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 6px;
    }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <span>Nuestra Institución</span>
        </div>
        <h1>Nuestra Institución</h1>
        <p>Instituto Neurociencias de Nariño IPS S.A.S · Pasto, Nariño</p>
    </div>
</div>

<!-- Misión, Visión, Valores -->
<section style="background:#f8faf9; padding: 70px 0;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <div class="card-icon">
                        <div style="width:56px;height:56px;background:linear-gradient(135deg,var(--primary),var(--primary-dark));border-radius:14px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa fa-bullseye" style="font-size:24px;color:#fff;"></i>
                        </div>
                    </div>
                    <h4>Misión</h4>
                    <p>Prestar servicios especializados en neurociencias con calidad, calidez y compromiso, orientados a la promoción, prevención, diagnóstico y tratamiento integral de enfermedades neurológicas, contribuyendo al bienestar y la calidad de vida de nuestros pacientes en Nariño y el sur del país.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <div class="card-icon">
                        <div style="width:56px;height:56px;background:linear-gradient(135deg,#2e4a47,#1a2e2c);border-radius:14px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa fa-eye" style="font-size:24px;color:#fff;"></i>
                        </div>
                    </div>
                    <h4>Visión</h4>
                    <p>Ser reconocidos para 2030 como la institución de referencia en neurociencias en el suroccidente colombiano, distinguida por la excelencia médica, la actualización tecnológica permanente y el compromiso genuino con el bienestar neurológico y mental de cada paciente que atendemos.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="info-card">
                    <div class="card-icon">
                        <div style="width:56px;height:56px;background:linear-gradient(135deg,#5c35a0,#7e57c2);border-radius:14px;display:flex;align-items:center;justify-content:center;">
                            <i class="fa fa-star" style="font-size:24px;color:#fff;"></i>
                        </div>
                    </div>
                    <h4>Valores Institucionales</h4>
                    <p>
                        <strong>Humanización:</strong> El paciente es el centro de todo.<br><br>
                        <strong>Excelencia:</strong> Estándares científicos de alto nivel.<br><br>
                        <strong>Compromiso:</strong> Con la salud y dignidad de cada persona.<br><br>
                        <strong>Ética:</strong> Transparencia y responsabilidad en cada decisión.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quiénes somos -->
<section style="background:#fff; padding: 70px 0;">
    <div class="container">
        <div class="row align-items-center g-5 service-row">
            <div class="col-lg-6">
                <img src="{{ asset('assets/img/ABOUT.png') }}" alt="Instituto Neurociencias de Nariño">
            </div>
            <div class="col-lg-6">
                <p style="font-size:12px; letter-spacing:3px; text-transform:uppercase; color:var(--primary-light); font-weight:700; margin-bottom:10px;">Quiénes somos</p>
                <h2 style="font-size:clamp(22px,3vw,36px); font-weight:800; color:var(--dark); margin-bottom:20px;">Instituto Neurociencias de Nariño IPS S.A.S</h2>
                <p style="font-size:15px; color:#555; line-height:1.8; text-align:justify; margin-bottom:15px;">
                    Somos una institución de salud especializada en el campo de las neurociencias, con sede en Pasto, Nariño. Ofrecemos un modelo de atención integral que combina la consulta neurológica especializada, los estudios electrodiagnósticos de alta precisión y los servicios terapéuticos, bajo un mismo techo.
                </p>
                <p style="font-size:15px; color:#555; line-height:1.8; text-align:justify;">
                    Contamos con un equipo de médicos especialistas, terapeutas y personal de apoyo altamente calificados, comprometidos con brindar una atención personalizada, compasiva y basada en la mejor evidencia científica disponible.
                </p>
                <ul class="service-list">
                    <li><span class="dot"></span>Habilitada ante la Secretaría de Salud de Nariño</li>
                    <li><span class="dot"></span>Vigilada por la Superintendencia Nacional de Salud</li>
                    <li><span class="dot"></span>Equipos de diagnóstico de última generación</li>
                    <li><span class="dot"></span>Atención humanizada y centrada en el paciente</li>
                </ul>
            </div>
        </div>
    </div>
</section>


@endsection
