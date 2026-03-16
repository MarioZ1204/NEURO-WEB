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
            <div class="col-lg-7">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la neurología?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">La especialidad del sistema nervioso</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Neurología</strong> es la rama de la medicina que se ocupa del diagnóstico y tratamiento de los trastornos del <strong>sistema nervioso central</strong> (cerebro y médula espinal) y del <strong>sistema nervioso periférico</strong> (nervios y músculos).</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">En el Instituto Neurociencias de Nariño, nuestros neurólogos están altamente capacitados para evaluar, diagnosticar y tratar una amplia variedad de condiciones neurológicas con un enfoque integral y centrado en el paciente.</p>
                </div>
            </div>
            <div class="col-lg-5">
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

        <!-- La consulta paso a paso -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">¿Cómo es la consulta?</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Lo que ocurre en su primera visita</h3>
            <div class="row g-3">
                @foreach([
                    ['Anamnesis', 'El especialista realizará una entrevista detallada sobre su historial médico, síntomas actuales y antecedentes familiares.'],
                    ['Examen neurológico', 'Se evaluarán reflejos, fuerza muscular, coordinación, sensibilidad, pares craneales, marcha y estado mental.'],
                    ['Diagnóstico diferencial', 'Con base en la historia y el examen, el neurólogo plantea las posibles causas de sus síntomas.'],
                    ['Plan de estudios', 'Puede ser necesario solicitar estudios imagenológicos (RMN, TAC) o neurofisiológicos (EEG, EMG) complementarios.'],
                    ['Plan terapéutico', 'Se elabora un plan de manejo individualizado: farmacológico, no farmacológico y seguimiento programado.'],
                ] as $i => $step)
                    <div class="col-md-6 col-lg-4">
                        <div style="display:flex;gap:14px;align-items:flex-start;">
                            <div class="step-num">{{ $i+1 }}</div>
                            <div>
                                <p style="font-size:13px;font-weight:700;color:var(--dark);margin-bottom:4px;">{{ $step[0] }}</p>
                                <p style="font-size:12.5px;color:#666;line-height:1.7;margin:0;">{{ $step[1] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Procedimientos Especiales -->
        <div class="info-card mb-5" style="border-left:4px solid var(--primary);">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Procedimientos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Procedimientos Especiales en Neurología</h3>
            <p style="font-size:13.5px;color:#666;margin-bottom:20px;">Intervenciones mínimamente invasivas realizadas por el médico neurólogo especialista.</p>
            <div class="row g-3">
                @foreach([
                    ['fa-syringe', 'Inyección de anestésico — Nervio Periférico', 'Bloqueo de nervio periférico mediante inyección de agente anestésico local, por punto. Indicado en dolor neuropático y diagnóstico diferencial.'],
                    ['fa-dot-circle', 'Bloqueo Unión Mioneural', 'Bloqueo de la unión neuromuscular por punto. Indicado en espasticidad focal, contracturas musculares y dolor miofascial.'],
                    ['fa-flask', 'Inyección de Toxina Botulínica', 'Aplicación de material miorelajante (toxina botulínica tipo A) para tratamiento de espasticidad, distonias y espasmo hemifacial.'],
                    ['fa-microchip', 'Revisión de Neuroestimulador', 'Revisión técnica y programación de dispositivos de neuroestimulación implantados (DBS). Verificación de parámetros, batería y respuesta clínica.'],
                ] as $proc)
                    <div class="col-md-6">
                        <div style="display:flex;gap:14px;align-items:flex-start;background:#f8faf9;border-radius:12px;padding:16px;">
                            <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--primary),var(--primary-dark));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fa {{ $proc[0] }}" style="color:#fff;font-size:16px;"></i>
                            </div>
                            <div>
                                <p style="font-size:13px;font-weight:700;color:var(--dark);margin-bottom:4px;">{{ $proc[1] }}</p>
                                <p style="font-size:12.5px;color:#666;line-height:1.7;margin:0;">{{ $proc[2] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
            <a href="{{ route('especialidades') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Ver todas las especialidades</a>
        </div>
    </div>
</section>
@endsection
