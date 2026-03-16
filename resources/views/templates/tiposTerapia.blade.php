@extends('layout.app')
@section('title', 'Tipos de Terapia')
@section('content')

<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        padding: 80px 0 60px;
        text-align: center;
        color: #fff;
    }
    .page-hero h1 { font-size: clamp(28px, 4vw, 48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }

    .terapia-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
        display: flex; align-items: flex-start; gap: 20px;
    }
    .terapia-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(74,107,104,0.18); }
    .terapia-icon {
        width: 60px; height: 60px;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .terapia-icon i { color: #fff; font-size: 22px; }
    .terapia-content h5 {
        font-size: 15px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--dark);
        margin-bottom: 10px;
    }
    .terapia-content p {
        font-size: 13.5px;
        color: #666;
        line-height: 1.75;
        margin: 0;
    }
    .terapia-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 12px; }
    .terapia-tag {
        background: #f0f4f3;
        color: var(--primary);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    .highlight-banner {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        padding: 50px;
        border-radius: 20px;
        color: #fff;
        text-align: center;
        margin-top: 50px;
    }
    .highlight-banner h3 { font-size: 24px; font-weight: 800; margin-bottom: 12px; }
    .highlight-banner p { font-size: 15px; color: var(--primary-pale); margin-bottom: 25px; }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Servicios</a>
            <span>›</span>
            <span>Tipos de Terapia</span>
        </div>
        <h1>Tipos de Terapia</h1>
        <p>Servicios terapéuticos integrales para tu recuperación y bienestar</p>
    </div>
</div>

<section style="background:#f8faf9; padding: 70px 0;">
    <div class="container">
        <div class="row g-4">

            <!-- Terapia física integral -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-running"></i></div>
                    <div class="terapia-content">
                        <h5>Terapia Física Integral</h5>
                        <p>Plan de rehabilitación funcional completo por sesión. Incluye ejercicio terapéutico, técnicas manuales y modalidades físicas para recuperar movilidad y funcionalidad.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Sesión individual</span><span class="terapia-tag">Rehabilitación motora</span></div>
                    </div>
                </div>
            </div>

            <!-- Rehabilitación pulmonar -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-lungs"></i></div>
                    <div class="terapia-content">
                        <h5>Terapia Física — Rehabilitación Pulmonar</h5>
                        <p>Programa especializado para pacientes con enfermedades respiratorias crónicas. Mejora la capacidad pulmonar, la tolerancia al ejercicio y la calidad de vida.</p>
                        <div class="terapia-tags"><span class="terapia-tag">EPOC</span><span class="terapia-tag">Post-COVID</span><span class="terapia-tag">Ejercicio respiratorio</span></div>
                    </div>
                </div>
            </div>

            <!-- Ondas de choque -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-bolt"></i></div>
                    <div class="terapia-content">
                        <h5>Terapia con Ondas de Choque</h5>
                        <p>Tratamiento no invasivo del sistema osteomuscular mediante ondas acústicas de alta energía. Efectiva en tendinopatías, calcificaciones y dolor crónico.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por sesión</span><span class="terapia-tag">Tendinopatías</span><span class="terapia-tag">Dolor crónico</span></div>
                    </div>
                </div>
            </div>

            <!-- Modalidades mecánicas -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-cogs"></i></div>
                    <div class="terapia-content">
                        <h5>Modalidades Mecánicas de Terapia</h5>
                        <p>Aplicación de fuerzas mecánicas externas para tratar lesiones musculoesqueléticas, mejorar la circulación y reducir contracturas y adherencias tisulares.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Ultrasonido</span><span class="terapia-tag">Compresión</span><span class="terapia-tag">Movilización</span></div>
                    </div>
                </div>
            </div>

            <!-- Modalidades eléctricas -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-plug"></i></div>
                    <div class="terapia-content">
                        <h5>Modalidades Eléctricas — Piso Pélvico</h5>
                        <p>Estimulación eléctrica o electromagnética aplicada a la musculatura del piso pélvico para tratar incontinencia urinaria, disfunción sexual y prolapsos.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Piso pélvico</span><span class="terapia-tag">Electroterapia</span><span class="terapia-tag">Incontinencia</span></div>
                    </div>
                </div>
            </div>

            <!-- Tracción cutánea canal raquídeo -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-arrows-alt-v"></i></div>
                    <div class="terapia-content">
                        <h5>Tracción Cutánea — Descompresión Lumbar</h5>
                        <p>Tracción cutánea para descompresión del canal raquídeo lumbar. Alivia la presión sobre raíces nerviosas en hernias discales y estenosis espinal.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por sesión</span><span class="terapia-tag">Hernia discal</span><span class="terapia-tag">Lumbalgia</span></div>
                    </div>
                </div>
            </div>

            <!-- Tracción esquelética miembros -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-bone"></i></div>
                    <div class="terapia-content">
                        <h5>Tracción Esquelética de Miembros</h5>
                        <p>Aplicación de tracción esquelética en miembros superiores o inferiores para el manejo de fracturas, luxaciones y reducción de espasticidad.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por sesión</span><span class="terapia-tag">Fracturas</span><span class="terapia-tag">Espasticidad</span></div>
                    </div>
                </div>
            </div>

            <!-- Tracción cutánea miembros -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-compress-arrows-alt"></i></div>
                    <div class="terapia-content">
                        <h5>Tracción Cutánea de Miembros</h5>
                        <p>Fuerza de tracción aplicada a través de la piel en miembros para alinear estructuras óseas y articulares, reducir el dolor y facilitar la rehabilitación.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Alineación articular</span><span class="terapia-tag">Reducción de dolor</span></div>
                    </div>
                </div>
            </div>

            <!-- Bomba linfática osteopática -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-hands"></i></div>
                    <div class="terapia-content">
                        <h5>Tratamiento Manipulativo Osteopático — Bomba Linfática</h5>
                        <p>Técnica osteopática para desplazar líquidos de tejidos mediante maniobras de bomba linfática. Reduce edemas, mejora la inmunidad y el drenaje linfático.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por sesión</span><span class="terapia-tag">Edema</span><span class="terapia-tag">Linfático</span></div>
                    </div>
                </div>
            </div>

            <!-- Terapia neural -->
            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-syringe"></i></div>
                    <div class="terapia-content">
                        <h5>Terapia Neural</h5>
                        <p>Técnica terapéutica basada en la aplicación de anestésico local en zonas de interferencia del sistema nervioso autónomo para restablecer la regulación tisular.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por sesión</span><span class="terapia-tag">Dolor crónico</span><span class="terapia-tag">Sistema nervioso autónomo</span></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Procedimientos Especiales -->
        <div class="row mb-4 mt-5">
            <div class="col-12">
                <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;">Procedimientos</p>
                <h3 style="font-size:22px;font-weight:800;color:var(--dark);margin-bottom:6px;">Procedimientos Especiales</h3>
                <p style="font-size:15px;color:#666;">Intervenciones mínimamente invasivas realizadas por médicos especialistas.</p>
            </div>
        </div>
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" style="background:linear-gradient(135deg,#5c35a0,#7e57c2);"><i class="fa fa-syringe"></i></div>
                    <div class="terapia-content">
                        <h5>Inyección de Anestésico — Nervio Periférico</h5>
                        <p>Inyección de agente anestésico local para bloqueo de nervio periférico. Se realiza por punto de inyección para manejo del dolor neuropático y diagnóstico diferencial.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por punto</span><span class="terapia-tag">Dolor neuropático</span><span class="terapia-tag">Nervio periférico</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" style="background:linear-gradient(135deg,#5c35a0,#7e57c2);"><i class="fa fa-dot-circle"></i></div>
                    <div class="terapia-content">
                        <h5>Bloqueo Unión Mioneural</h5>
                        <p>Bloqueo de la unión neuromuscular mediante infiltración de agente farmacológico por punto. Indicado en espasticidad focal, contracturas musculares y dolor miofascial.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por punto</span><span class="terapia-tag">Espasticidad</span><span class="terapia-tag">Miofascial</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" style="background:linear-gradient(135deg,#1455a0,#1976d2);"><i class="fa fa-flask"></i></div>
                    <div class="terapia-content">
                        <h5>Inyección de Toxina Botulínica</h5>
                        <p>Aplicación de material miorelajante (toxina botulínica tipo A) para tratamiento de espasticidad, distonías, espasmo hemifacial y otras indicaciones neurológicas.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Toxina botulínica</span><span class="terapia-tag">Distonía</span><span class="terapia-tag">Espasticidad</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" style="background:linear-gradient(135deg,#1455a0,#1976d2);"><i class="fa fa-microchip"></i></div>
                    <div class="terapia-content">
                        <h5>Revisión de Neuroestimulador</h5>
                        <p>Revisión técnica y programación de dispositivos de neuroestimulación implantados. Incluye verificación de parámetros, batería y respuesta clínica del paciente.</p>
                        <div class="terapia-tags"><span class="terapia-tag">DBS</span><span class="terapia-tag">Neuroestimulación</span><span class="terapia-tag">Seguimiento</span></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Highlight CTA -->
        <div class="highlight-banner">
            <h3>¿Necesitas orientación sobre qué terapia es la indicada?</h3>
            <p>Contáctanos y nuestro equipo te guiará para encontrar el plan terapéutico más adecuado para tu condición.</p>
            <a href="#map" style="display:inline-block; background:#fff; color:var(--primary); padding:12px 30px; border-radius:30px; font-weight:800; font-size:13px; letter-spacing:1px; text-transform:uppercase; text-decoration:none; margin-right:10px; transition: background 0.2s;">Contáctanos</a>
            <a href="{{ route('landing.inicio') }}" style="display:inline-block; background:transparent; color:#fff; border:2px solid rgba(255,255,255,0.5); padding:10px 28px; border-radius:30px; font-weight:700; font-size:13px; letter-spacing:1px; text-transform:uppercase; text-decoration:none;">Volver al inicio</a>
        </div>
    </div>
</section>

@endsection
