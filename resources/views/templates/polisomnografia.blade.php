@extends('layout.app')
@section('title', 'Preparación para Polisomnografía')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(24px,3.5vw,42px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; flex-wrap: wrap; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); }
    .phase-card { background:#fff; border-radius:12px; padding:22px; box-shadow:0 3px 14px rgba(0,0,0,0.06); height:100%; border-top:3px solid var(--primary); }
    .phase-card h5 { font-size:14px; font-weight:800; color:var(--dark); margin-bottom:10px; }
    .phase-card p, .phase-card li { font-size:13px; color:#666; line-height:1.8; }
    .faq-item { border-bottom:1px solid #eee; padding:16px 0; }
    .faq-item:last-child { border-bottom:none; }
    .faq-q { font-size:14px;font-weight:700;color:var(--dark);margin-bottom:8px;cursor:pointer; }
    .faq-a { font-size:13.5px; color:#666; line-height:1.8; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('servicios.clinicaSueno') }}">Clínica del Sueño</a><span>›</span>
            <span>Preparación Polisomnografía</span>
        </div>
        <h1>Preparación para<br>Polisomnografía</h1>
        <p>Guía completa para su estudio del sueño</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Antes de su estudio</p>
            <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin:12px 0 16px;">¿Qué es la Polisomnografía y cómo prepararse?</h2>
            <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>polisomnografía (PSG)</strong> es el registro nocturno de múltiples señales fisiológicas durante el sueño. Es el examen de referencia para detectar trastornos como apnea del sueño, narcolepsia, insomnio grave y parasomnias. El estudio es completamente <strong>indoloro y no invasivo</strong>.</p>
        </div>

        <!-- Fases del estudio -->
        <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:18px;">Fases del estudio</p>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="phase-card">
                    <h5><i class="fa fa-sun" style="color:var(--primary);margin-right:8px;"></i>Antes del estudio</h5>
                    <ul style="padding-left:18px;margin:0;">
                        <li>Lave el cabello sin acondicionador</li>
                        <li>No use productos capilares</li>
                        <li>Evite café y alcohol todo el día</li>
                        <li>No tome siestas</li>
                        <li>Cene de forma ligera</li>
                        <li>Tome sus medicamentos habituales</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="phase-card">
                    <h5><i class="fa fa-moon" style="color:var(--primary);margin-right:8px;"></i>Durante el estudio</h5>
                    <p>Al llegar, el técnico instalará electrodos en el cuero cabelludo, cara y piernas, y sensores en el pecho y dedo (oxímetro). Tendrá un cuarto privado y cómodo para dormir. El técnico supervisa desde una sala adjunta sin interrumpir su sueño, excepto si es necesario.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="phase-card">
                    <h5><i class="fa fa-clipboard-check" style="color:var(--primary);margin-right:8px;"></i>Después del estudio</h5>
                    <p>Al despertar (normalmente entre 5:00 y 6:00 AM), el técnico retirará todos los electrodos y sensores. El análisis del registro tardará varios días. Su médico citará una consulta de entrega de resultados para explicarle los hallazgos y el plan de manejo.</p>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:6px;">Preguntas frecuentes</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Dudas comunes sobre la PSG</h3>
            <div class="faq-item">
                <p class="faq-q"><i class="fa fa-question-circle" style="color:var(--primary);margin-right:8px;"></i>¿El estudio es doloroso?</p>
                <p class="faq-a">No. La colocación de electrodos no causa dolor. Se usan pasta conductora y cinta médica. El proceso de instalación toma aproximadamente 45-60 minutos.</p>
            </div>
            <div class="faq-item">
                <p class="faq-q"><i class="fa fa-question-circle" style="color:var(--primary);margin-right:8px;"></i>¿Puedo ir al baño durante la noche?</p>
                <p class="faq-a">Sí. Los cables tienen suficiente longitud para desconectarle temporalmente. Avise al técnico usando el dispositivo de llamado en la habitación.</p>
            </div>
            <div class="faq-item">
                <p class="faq-q"><i class="fa fa-question-circle" style="color:var(--primary);margin-right:8px;"></i>¿Qué pasa si no puedo dormir bien esa noche?</p>
                <p class="faq-a">Es normal sentirse un poco diferente el primer día. El técnico está preparado para manejar estas situaciones. Incluso con sueño fragmentado, generalmente se obtiene suficiente información para el diagnóstico.</p>
            </div>
            <div class="faq-item">
                <p class="faq-q"><i class="fa fa-question-circle" style="color:var(--primary);margin-right:8px;"></i>¿Cuándo recibiré los resultados?</p>
                <p class="faq-a">El médico especialista analiza el registro en detalle. Los resultados estarán disponibles típicamente entre 5 y 10 días hábiles.</p>
            </div>
            <div class="faq-item">
                <p class="faq-q"><i class="fa fa-question-circle" style="color:var(--primary);margin-right:8px;"></i>¿Puedo llevar a alguien conmigo?</p>
                <p class="faq-a">Por regla general, el acompañante no puede quedarse a dormir en la habitación del estudio. Sin embargo, puede participar en el proceso de recepción. Consulte con el equipo para casos especiales (menores de edad, discapacidad severa).</p>
            </div>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('servicios.clinicaSueno') }}" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Clínica del Sueño</a>
            <a href="{{ route('landing.inicio') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Volver al inicio</a>
        </div>
    </div>
</section>
@endsection
