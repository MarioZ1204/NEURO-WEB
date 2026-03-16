@extends('layout.app')
@section('title', 'Clínica del Sueño')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, #0d1b2a 0%, #1a2e4a 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: rgba(200,222,221,0.85); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.6); margin-bottom: 15px; }
    .breadcrumb-custom a { color: rgba(255,255,255,0.82); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .disorder-card { background:#f0f6f5; border-radius:12px; padding:20px; border-top:3px solid var(--primary); height:100%; }
    .disorder-card h5 { font-size:14px; font-weight:800; color:var(--dark); margin-bottom:8px; }
    .disorder-card p { font-size:12.5px; color:#666; line-height:1.75; margin:0; }
    .study-badge { display:inline-block; background:var(--primary); color:#fff; font-size:11px; font-weight:700; padding:4px 12px; border-radius:20px; margin:4px 3px; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Servicios</a><span>›</span>
            <span>Clínica del Sueño</span>
        </div>
        <h1><i class="fa fa-moon" style="margin-right:14px;opacity:0.75;"></i>Clínica del Sueño</h1>
        <p>Diagnóstico y tratamiento integral de los trastornos del sueño</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-7">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Medicina del sueño</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">El sueño: pilar fundamental de la salud neurológica</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Clínica del Sueño</strong> del Instituto Neurociencias de Nariño ofrece un programa completo para el estudio y tratamiento de los <strong>trastornos del sueño</strong>, utilizando tecnología de polisomnografía de última generación en un ambiente cómodo y controlado.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Los trastornos del sueño afectan a millones de personas y tienen implicaciones directas sobre la salud cardiovascular, metabólica, mental y neurológica. Una evaluación oportuna puede transformar la calidad de vida del paciente.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-card" style="background:linear-gradient(135deg,#0d1b2a,#1a2e4a);color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(200,222,221,0.7);font-weight:700;margin-bottom:12px;">¿Cuándo consultar?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.9);">
                        <li>Ronquido intenso o pausas en la respiración</li>
                        <li>Somnolencia excesiva durante el día</li>
                        <li>Dificultad para dormir o mantenerse dormido</li>
                        <li>Despertares frecuentes en la madrugada</li>
                        <li>Movimientos involuntarios durante el sueño</li>
                        <li>Pesadillas recurrentes o parálisis del sueño</li>
                        <li>Episodios de confusión nocturna</li>
                        <li>Sensación de cansancio al despertar</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Trastornos -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Condiciones que tratamos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Trastornos del sueño</h3>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <div class="disorder-card">
                        <h5>Apnea del Sueño</h5>
                        <p>Pausas repetidas en la respiración durante el sueño. La apnea obstructiva severa aumenta el riesgo de ACV, hipertensión y arritmias.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="disorder-card">
                        <h5>Insomnio Crónico</h5>
                        <p>Dificultad persistente para iniciar o mantener el sueño, con impacto significativo en el funcionamiento diurno por más de 3 meses.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="disorder-card">
                        <h5>Narcolepsia</h5>
                        <p>Somnolencia diurna excesiva con episodios irresistibles de sueño, cataplejía y parálisis del sueño. Condición neurológica de base autoinmune.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="disorder-card">
                        <h5>Síndrome de Piernas Inquietas</h5>
                        <p>Sensación molesta en las piernas con necesidad irresistible de moverlas. Empeora en reposo y mejora con el movimiento.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="disorder-card">
                        <h5>Parasomnias</h5>
                        <p>Somnambulismo, terrores nocturnos, trastorno conductual del sueño REM y otras conductas anormales durante el sueño.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="disorder-card">
                        <h5>Hipersomnia</h5>
                        <p>Somnolencia excesiva en ausencia de narcolepsia u apnea. Puede ser idiopática o secundaria a otras enfermedades neurológicas.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estudios disponibles -->
        <div style="background:#fff;border-radius:14px;padding:28px;box-shadow:0 4px 20px rgba(0,0,0,0.06);margin-bottom:40px;">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Tecnología diagnóstica</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:18px;">Estudios disponibles</h3>
            <span class="study-badge">Polisomnografía basal</span>
            <span class="study-badge">Polisomnografía diagnóstica</span>
            <span class="study-badge">Titulación CPAP/BiPAP</span>
            <span class="study-badge">Test de latencias múltiples de sueño</span>
            <span class="study-badge">Poligrafía respiratoria</span>
            <span class="study-badge">Actimetría/Actigrafía</span>
            <span class="study-badge">EEG nocturno</span>
            <span class="study-badge">Monitoreo ambulatorio del sueño</span>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
            <a href="{{ route('educacion.polisBasal') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Preparación para la PSG</a>
        </div>
    </div>
</section>
@endsection
