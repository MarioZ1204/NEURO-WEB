@extends('layout.app')
@section('title', 'Neurología')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .cond-badge { display:inline-block; background:var(--primary-ultra); color:var(--primary-dark); font-size:11.5px; font-weight:600; padding:5px 13px; border-radius:20px; margin:4px 4px 4px 0; }
    .step-num { width:36px; height:36px; border-radius:50%; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:800; flex-shrink:0; }
    .info-card a:hover > div {
    box-shadow: 0 4px 16px rgba(0,0,0,0.10);
    transform: translateY(-2px);
    }
    
    
</style>
<style>
    .info-card p,
    .info-card li {
        text-align: justify;
    }
</style>

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Neurología</span>
        </div>
        <h1><i class="fa fa-brain" style="margin-right:14px;opacity:0.75;"></i>Neurología</h1>
        <p>Diagnóstico y tratamiento de enfermedades del sistema nervioso</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">

        <!-- ¿Qué es? -->
        <div class="row g-4 mb-5">

            
            <div class="col-lg-4">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Consulta de neurología</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">La especialidad del sistema nervioso</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La consulta de <strong>Neurología</strong> es un servicio médico especializado orientado a la evaluación, diagnóstico, tratamiento y seguimiento de enfermedades que afectan el sistema nervioso central y periférico, incluyendo el cerebro, la médula espinal, los nervios y los músculos.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Consulta de neurología</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Alcance del servicio</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Este servicio está dirigido a pacientes que presentan síntomas neurológicos tales como cefalea, mareo, vértigo, trastornos del sueño, convulsiones, alteraciones de la memoria, debilidad muscular, trastornos del movimiento, entre otros. Asimismo, incluye el manejo de enfermedades neurológicas agudas y crónicas.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="info-card" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--primary-pale);font-weight:700;margin-bottom:12px;">¿Cuándo consultar un neurólogo?</p>
                    <ul style="font-size:13.5px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Dolores de cabeza frecuentes o muy intensos</li>
                        <li>Mareo, pérdida de equilibrio o inestabilidad</li>
                        <li>Entumecimiento u hormigueo en extremidades</li>
                        <li>Debilidad muscular o dificultad para caminar</li>
                        <li>Pérdida de memoria o confusión</li>
                        <li>Temblores o movimientos involuntarios</li>
                        <li>Problemas de visión inexplicables</li>
                        <li>Dificultad para hablar o entender</li>
                    </ul>
                </div>
            </div>
            

        </div>
        



        <!-- Condiciones tratadas -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Condiciones que tratamos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Áreas de atención neurológica</h3>
            <div>
                <span class="cond-badge">Cefalea y migraña</span>
                <span class="cond-badge">Enfermedad de Parkinson</span>
                <span class="cond-badge">Esclerosis múltiple</span>
                <span class="cond-badge">Accidente cerebrovascular (ACV)</span>
                <span class="cond-badge">Demencias y Alzheimer</span>
                <span class="cond-badge">Neuropatías periféricas</span>
                <span class="cond-badge">Miopatías</span>
                <span class="cond-badge">Trastornos del movimiento</span>
                <span class="cond-badge">Vértigo y mareo crónico</span>
                <span class="cond-badge">Síndrome del túnel carpiano</span>
                <span class="cond-badge">Neuralgia del trigémino</span>
                <span class="cond-badge">Esclerosis lateral amiotrófica</span>
                <span class="cond-badge">Trastornos del sueño (neurológicos)</span>
                <span class="cond-badge">Distonías</span>
            </div>
        </div>
        
                <style>
                    .info-card a {
                        color: var(--primary-light);
                        font-weight: 600;
                        text-decoration: none;
                    }
                    .info-card a:hover {
                        color: var(--primary);
                        text-decoration: underline;
                    }
                    .info-card p {
                        text-align: justify;
                    }
                    .info-card ul {
                        font-size: 12.5px;
                        color: #666;
                        line-height: 1.7;
                        margin-bottom: 4px;
                    }
                </style>
                
                <div class="info-card mb-5">
                    <div style="display:flex;gap:32px;align-items:stretch;">
                
                        {{-- Columna izquierda: 60% --}}
                        <div style="flex:0 0 60%;">
                            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Procedimiento de atención</p>
                            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">La consulta se desarrolla a través de las siguientes etapas:</h3>
                            <div class="row g-2">
                                @foreach([
                                    ['Valoración clínica integral', 'Recolección detallada de la historia clínica, el especialista realizará una entrevista detallada sobre su historial médico, incluyendo motivo de consulta, antecedentes personales, familiares y farmacológicos, síntomas actuales y antecedentes familiares.'],
                                    ['Examen neurológico completo', 'Evaluación del estado mental, funciones cognitivas, nervios craneales, fuerza muscular, reflejos, coordinación, equilibrio, marcha, sensibilidad, pares craneales y estado mental.'],
                                    ['Apoyo diagnóstico (si aplica)', 'Solicitud e interpretación de estudios complementarios:
                                        <ul style="margin-top:6px;padding-left:16px;">
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Electroencefalograma convencional, computarizado y con mapeo cerebral.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Estudio fisiológico completo del sueño [polisomnografía] basal o con titulación de dispositivo médico.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Pruebas de latencia múltiple de sueño.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Prueba de mantenimiento de la vigilia.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Monitoreo de actividad sueño vigilia [actigrafía].</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Monitoreo de presión positiva durante el sueño.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Monitorización electroencefalográfica por video y radio.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Neuroimágenes.</a></li>
                                            <li><a href="/servicios/electrodiagnosticos" target="_blank">Electromiografía u otros exámenes especializados.</a></li>
                                        </ul>'],
                                    ['Diagnóstico y plan terapéutico – procedimientos especiales en neurología', 'Definición del diagnóstico, formulación médica si es necesario, recomendaciones terapéuticas o realización de tratamientos como:
                                        <ul style="margin-top:6px;padding-left:16px;">
                                            <li><a href="/servicios/neuroestimulador" target="_blank">Revisión de neuroestimulador y establecimiento de plan de seguimiento.</a></li>
                                            <li><a href="/servicios/toxina-botulinica" target="_blank">Inyección de material miorrelajante (toxina botulínica) para tratamientos de patologías neurológicas y establecimiento de plan de seguimiento.</a></li>
                                            <li><a href="/servicios/bloqueo-nervio" target="_blank">Inyección de agente anestésico para nervio periférico y establecimiento de plan de seguimiento.</a></li>
                                            <li><a href="/servicios/bloqueo-mioneural" target="_blank">Bloqueo unión mioneural por puntos y establecimiento de plan de seguimiento.</a></li>
                                        </ul>'],
                                        
                                    ] as $i => $step)
                                    <div class="col-md-12">
                                        <div style="display:flex;gap:14px;align-items:flex-start;">
                                            <div class="step-num">{{ $i+1 }}</div>
                                            <div>
                                                <p style="font-size:13px;font-weight:700;color:var(--dark);margin-bottom:4px;">{{ $step[0] }}</p>
                                                <p style="font-size:12.5px;color:#666;line-height:1.7;margin:0;">{!! $step[1] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                @endforeach
                            </div>
                        </div>
                
                        {{-- Columna derecha: 40% --}}
                        <div style="flex:0 0 40%;display:flex;align-items:center;justify-content:center;">
                            <img src="{{ asset('assets/img/consulta.jpg') }}" alt="Procedimiento neurológico"
                                style="width:100%;height:100%;object-fit:cover;border-radius:12px;">
                        </div>
                
                    </div>
                    
                            <div style="text-align:center;margin-top:24px;padding-top:16px;border-top:1px solid #e8e8e8;">
                                    <p style="font-size:12.5px;color:#666;margin:0;">
                                        Duración estimada de la consulta: Entre 20 y 40 minutos, dependiendo de la complejidad del caso y el servicio prestado.
                                    </p>
                                    <p style="font-size:12.5px;color:#666;margin:0;">
                                        Nuestros servicios de Neurología se prestan bajo criterios de calidad, oportunidad, seguridad del paciente y confidencialidad de la información clínica.
                                    </p>
                            </div>
                        </div>
                </div>


<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div class="info-card mb-5" style="border-left:4px solid var(--primary);">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Procedimientos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Procedimientos Especiales en Neurología</h3>
            <p style="font-size:13.5px;color:#666;margin-bottom:20px;">Intervenciones mínimamente invasivas realizadas por el médico neurólogo especialista.</p>
            <div class="row g-3">
                @foreach([
                    ['fa-syringe', 'Inyección de anestésico — Nervio Periférico', 'Bloqueo de nervio periférico mediante inyección de agente anestésico local, por punto. Indicado en dolor neuropático y diagnóstico diferencial.', '/servicios/bloqueo-nervio'],
                    ['fa-dot-circle', 'Bloqueo Unión Mioneural', 'Bloqueo de la unión neuromuscular por punto. Indicado en espasticidad focal, contracturas musculares y dolor miofascial.', '/servicios/bloqueo-mioneural'],
                    ['fa-flask', 'Inyección de Toxina Botulínica', 'Aplicación de material miorelajante (toxina botulínica tipo A) para tratamiento de espasticidad, distonias y espasmo hemifacial.', '/servicios/toxina-botulinica'],
                    ['fa-microchip', 'Revisión de Neuroestimulador', 'Revisión técnica y programación de dispositivos de neuroestimulación implantados (DBS). Verificación de parámetros, batería y respuesta clínica.', '/servicios/neuroestimulador'],
                ] as $proc)
                    <div class="col-md-6">
                        <a href="{{ $proc[3] }}" target="_blank" style="text-decoration:none;display:block;">
                            <div style="display:flex;gap:14px;align-items:flex-start;background:#f8faf9;border-radius:12px;padding:16px;transition:box-shadow 0.2s,transform 0.2s;">
                                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--primary),var(--primary-dark));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="fa {{ $proc[0] }}" style="color:#fff;font-size:16px;"></i>
                                </div>
                                <div>
                                    <p style="font-size:13px;font-weight:700;color:var(--dark);margin-bottom:4px;">{{ $proc[1] }}</p>
                                    <p style="font-size:12.5px;color:#666;line-height:1.7;margin:0;">{{ $proc[2] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    <div style="text-align:center;margin-top:40px;">
        <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
        <a href="{{ route('especialidades') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Ver todas las especialidades</a>
    </div>
</section>
@endsection
