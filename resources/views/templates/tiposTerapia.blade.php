@extends('layout.app')
@section('title', 'Tipos de Terapia')
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

    .terapia-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        min-height: 240px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 18px;
        border: 1px solid rgba(74,107,104,0.08);
    }
    .terapia-card:hover { transform: translateY(-6px); box-shadow: 0 15px 40px rgba(74,107,104,0.18); }
    .terapia-icon {
        width: 54px; height: 54px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .terapia-icon i { color: #ffffff; font-size: 22px; }
    .terapia-content h5 {
        font-size: 16px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--dark);
        margin-bottom: 12px;
    }
    .terapia-content p {
        font-size: 14px;
        color: #5a6f6d;
        line-height: 1.8;
        margin: 0;
    }
    .terapia-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; }
    .terapia-tag {
        background: rgba(74,107,104,0.08);
        color: var(--primary-dark);
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
    }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <a href="{{ route('landing.portafolio') }}">Servicios</a>
            <span>›</span>
            <span>Tipos de Terapia</span>
        </div>
        <h1>Tipos de Terapia</h1>
        <p>Rehabilitación y procedimientos terapéuticos para recuperar función y bienestar</p>
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
                    <div class="terapia-icon" ><i class="fa fa-syringe"></i></div>
                    <div class="terapia-content">
                        <h5>Inyección de Anestésico — Nervio Periférico</h5>
                        <p>Inyección de agente anestésico local para bloqueo de nervio periférico. Se realiza por punto de inyección para manejo del dolor neuropático y diagnóstico diferencial.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por punto</span><span class="terapia-tag">Dolor neuropático</span><span class="terapia-tag">Nervio periférico</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" ><i class="fa fa-dot-circle"></i></div>
                    <div class="terapia-content">
                        <h5>Bloqueo Unión Mioneural</h5>
                        <p>Bloqueo de la unión neuromuscular mediante infiltración de agente farmacológico por punto. Indicado en espasticidad focal, contracturas musculares y dolor miofascial.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Por punto</span><span class="terapia-tag">Espasticidad</span><span class="terapia-tag">Miofascial</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" ><i class="fa fa-flask"></i></div>
                    <div class="terapia-content">
                        <h5>Inyección de Toxina Botulínica</h5>
                        <p>Aplicación de material miorelajante (toxina botulínica tipo A) para tratamiento de espasticidad, distonías, espasmo hemifacial y otras indicaciones neurológicas.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Toxina botulínica</span><span class="terapia-tag">Distonía</span><span class="terapia-tag">Espasticidad</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="terapia-card">
                    <div class="terapia-icon" ><i class="fa fa-microchip"></i></div>
                    <div class="terapia-content">
                        <h5>Revisión de Neuroestimulador</h5>
                        <p>Revisión técnica y programación de dispositivos de neuroestimulación implantados. Incluye verificación de parámetros, batería y respuesta clínica del paciente.</p>
                        <div class="terapia-tags"><span class="terapia-tag">DBS</span><span class="terapia-tag">Neuroestimulación</span><span class="terapia-tag">Seguimiento</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" id="fonoaudiologia">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-comments"></i></div>
                    <div class="terapia-content">
                        <h5>Unidad de Fonoaudiología</h5>
                        <p>Evaluación y tratamiento de lenguaje, habla, voz y deglución, con énfasis en pacientes neurológicos y de rehabilitación.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Lenguaje</span><span class="terapia-tag">Deglución</span><span class="terapia-tag">Comunicación</span></div>
                        <a href="{{ route('consulta.fonoaudiologia') }}" style="display:inline-block;margin-top:10px;font-size:13px;font-weight:700;color:var(--primary);text-decoration:none;">Conocer más ›</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" id="terapia-ocupacional">
                <div class="terapia-card">
                    <div class="terapia-icon"><i class="fa fa-hands"></i></div>
                    <div class="terapia-content">
                        <h5>Unidad de Terapia Ocupacional</h5>
                        <p>Intervención para recuperar autonomía en actividades cotidianas, motricidad fina y participación funcional.</p>
                        <div class="terapia-tags"><span class="terapia-tag">Autonomía</span><span class="terapia-tag">Motricidad fina</span><span class="terapia-tag">Vida diaria</span></div>
                        <a href="{{ route('consulta.terapiaOcupacional') }}" style="display:inline-block;margin-top:10px;font-size:13px;font-weight:700;color:var(--primary);text-decoration:none;">Conocer más ›</a>
                    </div>
                </div>
            </div>

        </div>

        @include('components.page-cta', [
            'title' => '¿Necesita orientación sobre qué terapia es la indicada?',
            'subtitle' => 'Nuestro equipo le guía para encontrar el plan terapéutico más adecuado.',
            'secondaryHref' => route('landing.inicio'),
            'secondaryLabel' => 'Volver al inicio',
        ])
    </div>
</section>

@endsection

