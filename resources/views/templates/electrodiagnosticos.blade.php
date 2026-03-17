@extends('layout.app')
@section('title', 'Electrodiagnósticos')
@section('content')

<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero {
        background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
        padding: 80px 0 60px;
        text-align: center;
        color: #fff;
    }
    .page-hero h1 { font-size: clamp(28px, 4vw, 48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }

    .electro-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
    }
    .electro-card:hover { transform: translateY(-6px); box-shadow: 0 15px 40px rgba(74,107,104,0.2); }
    .electro-card .e-img {
        height: 180px;
        overflow: hidden;
        position: relative;
    }
    .electro-card .e-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
    .electro-card:hover .e-img img { transform: scale(1.06); }
    .electro-card .e-img .e-label {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: linear-gradient(transparent, rgba(26,46,44,0.85));
        padding: 20px 20px 15px;
        color: #fff;
        font-size: 15px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .electro-card .e-body {
        padding: 22px 22px 25px;
        border-top: 3px solid var(--primary);
    }
    .electro-card .e-body p {
        font-size: 13.5px;
        color: #555;
        line-height: 1.75;
        margin: 0;
    }
    .electro-card .e-body .e-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 14px; }
    .electro-card .e-body .e-tag {
        background: #f0f4f3;
        color: var(--primary);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .process-step {
        display: flex; align-items: flex-start; gap: 20px;
        padding: 25px;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.06);
    }
    .step-num {
        width: 48px; height: 48px;
        background: var(--primary);
        color: #fff;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px;
        font-weight: 900;
        flex-shrink: 0;
    }
    .step-content h6 { font-size: 14px; font-weight: 800; color: var(--dark); margin-bottom: 6px; }
    .step-content p { font-size: 13px; color: #666; margin: 0; line-height: 1.7; }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Servicios</a>
            <span>›</span>
            <span>Electrodiagnósticos</span>
        </div>
        <h1>Electrodiagnósticos</h1>
        <p>Estudios de alta precisión</p>
    </div>
</div>

<!-- Studies -->
<section style="background:#f8faf9; padding: 70px 0;">
    <div class="container">
        <p style="font-size:12px; letter-spacing:3px; text-transform:uppercase; color:var(--primary-light); font-weight:700; margin-bottom:10px;">Nuestros estudios</p>
        <h2 style="font-size:clamp(22px,3vw,36px); font-weight:800; color:var(--dark); margin-bottom:40px;">Estudios Disponibles</h2>
        <!-- Subheading: EEG -->
        <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;margin-top:10px;">Estudios de actividad cerebral</p>
        <h3 style="font-size:20px;font-weight:800;color:var(--dark);margin-bottom:24px;">Electroencefalogramas</h3>
        <div class="row g-4 mb-5">

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/EEG.png') }}" alt="EEG"><div class="e-label">EEG Convencional</div></div>
                    <div class="e-body">
                        <p>Registro estándar de la actividad eléctrica cerebral. Estudio de referencia para el diagnóstico de epilepsia y evaluación neurológica general.</p>
                        <div class="e-tags"><span class="e-tag">Epilepsia</span><span class="e-tag">Encefalopatía</span><span class="e-tag">Urgencias</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/EEGC.png') }}" alt="EEG Computarizado"><div class="e-label">EEG Computarizado</div></div>
                    <div class="e-body">
                        <p>Electroencefalograma con procesamiento digital avanzado de la señal. Permite un análisis más detallado de la actividad eléctrica cerebral.</p>
                        <div class="e-tags"><span class="e-tag">Digital</span><span class="e-tag">Análisis espectral</span><span class="e-tag">Mayor precisión</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/EEGD.png') }}" alt="EEG con Mapeo Cerebral"><div class="e-label">EEG Digital con Mapeo Cerebral</div></div>
                    <div class="e-body">
                        <p>EEG digital con representación topográfica de la actividad eléctrica. Facilita la localización de focos epilépticos y zonas de disfunción cortical.</p>
                        <div class="e-tags"><span class="e-tag">Mapeo Brain</span><span class="e-tag">Localización precisa</span><span class="e-tag">Foco epiléptico</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/VTM.png') }}" alt="Videotelemetría EEG"><div class="e-label">Monitorización EEG por Video y Radio</div></div>
                    <div class="e-body">
                        <p>Monitorización electroencefalográfica simultánea con registro de video. Ideal para caracterizar crisis epilépticas y diferenciar eventos paroxísticos.</p>
                        <div class="e-tags"><span class="e-tag">Video-EEG</span><span class="e-tag">Cargado por hora</span><span class="e-tag">Crisis paroxísticas</span></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Subheading: Sleep -->
        <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;">Estudios de sueño</p>
        <h3 style="font-size:20px;font-weight:800;color:var(--dark);margin-bottom:24px;">Polisomnografía &amp; Medicina del Sueño</h3>
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/PSG1.png') }}" alt="Polisomnografía"><div class="e-label">Estudio Fisiológico Completo del Sueño</div></div>
                    <div class="e-body">
                        <p>Polisomnografía completa nocturna que registra EEG, movimientos oculares, tono muscular, flujo respiratorio, saturación de oxígeno y ECG.</p>
                        <div class="e-tags"><span class="e-tag">Polisomnografía</span><span class="e-tag">Apnea del sueño</span><span class="e-tag">Hipnograma</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/PSG2.png') }}" alt="Polisomnografía Noche Dividida"><div class="e-label">Polisomnografía Noche Dividida</div></div>
                    <div class="e-body">
                        <p>Estudio de sueño en dos fases en una sola noche: diagnóstico de apnea en la primera mitad y titulación de CPAP en la segunda mitad.</p>
                        <div class="e-tags"><span class="e-tag">Split-night</span><span class="e-tag">SAHOS</span><span class="e-tag">CPAP</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/PSG2.png') }}" alt="Titulación CPAP"><div class="e-label">Polisomnograma en Titulación de Dispositivo</div></div>
                    <div class="e-body">
                        <p>Polisomnografía realizada con dispositivo CPAP/BiPAP activo para determinar la presión óptima de tratamiento de la apnea obstructiva del sueño.</p>
                        <div class="e-tags"><span class="e-tag">CPAP titulación</span><span class="e-tag">BiPAP</span><span class="e-tag">Presión óptima</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/TLM.png') }}" alt="Prueba de Latencia Múltiple"><div class="e-label">Pruebas de Latencia Múltiple de Sueño</div></div>
                    <div class="e-body">
                        <p>Evaluación objetiva de la somnolencia diurna excesiva mediante 4–5 siestas controladas. Confirma diagnóstico de narcolepsia e hipersomnias de origen central.</p>
                        <div class="e-tags"><span class="e-tag">Narcolepsia</span><span class="e-tag">Hipersomnia</span><span class="e-tag">TLMS</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/VIG.png') }}" alt="Prueba de Mantenimiento de la Vigilia"><div class="e-label">Prueba de Mantenimiento de la Vigilia</div></div>
                    <div class="e-body">
                        <p>Mide la capacidad del paciente para mantenerse despierto en condiciones de baja estimulación. Usada en conductores profesionales y operadores de maquinaria.</p>
                        <div class="e-tags"><span class="e-tag">PMV</span><span class="e-tag">Seguridad vial</span><span class="e-tag">Control de tratamiento</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="electro-card">
                    <div class="e-img"><img src="{{ asset('assets/img/ACT.png') }}" alt="Actigrafía"><div class="e-label">Monitoreo Sueño-Vigilia (Actigrafía)</div></div>
                    <div class="e-body">
                        <p>Registro ambulatorio del ciclo sueño-vigilia durante 7–14 días mediante un acelerómetro de muñeca. Útil para evaluar ritmos circadianos y patrones de insomnio.</p>
                        <div class="e-tags"><span class="e-tag">Actigrafía</span><span class="e-tag">Circadiano</span><span class="e-tag">7–14 días</span></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Process -->
        <div style="margin-top: 70px;">
            <h3 style="font-size:24px; font-weight:800; color:var(--dark); margin-bottom:30px;">¿Cómo es el proceso?</h3>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-num">1</div>
                        <div class="step-content">
                            <h6>Consulta Médica</h6>
                            <p>El especialista evalúa tu caso y solicita el estudio correspondiente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-num">2</div>
                        <div class="step-content">
                            <h6>Agendamiento</h6>
                            <p>Contacta nuestra recepción para reservar la fecha del estudio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-num">3</div>
                        <div class="step-content">
                            <h6>Realización del Estudio</h6>
                            <p>El técnico neurofisiológico realiza el procedimiento en nuestra sede.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-num">4</div>
                        <div class="step-content">
                            <h6>Entrega de Resultados</h6>
                            <p>El neurólogo interpreta y entrega el informe con los resultados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align:center; margin-top:50px;">
            <a href="#map" class="btn-cta-solid" style="border-radius:25px; padding:13px 35px; font-size:13px; text-decoration:none;">Solicitar Estudio</a>
            &nbsp;
            <a href="{{ route('landing.inicio') }}" class="btn-cta-outline" style="border-radius:25px; padding:11px 33px; font-size:13px; text-decoration:none;">Volver al inicio</a>
        </div>
    </div>
</section>

@endsection
