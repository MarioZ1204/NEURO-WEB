@extends('layout.app')
@section('title', 'Psiquiatría')
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
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Psiquiatría</span>
        </div>
        <h1><i class="fa fa-head-side-virus" style="margin-right:14px;opacity:0.75;"></i>Psiquiatría</h1>
        <p>Cuidado integral de la salud mental con enfoque humano y científico</p>
    </div>
</div>

<style>
    .info-card p,
    .info-card li {
        text-align: justify;
    }
</style>
<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">

            <div class="col-lg-4">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Especialidad</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">¿Qué es la Consulta de Psiquiatría?</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La consulta de <strong>Psiquiatría</strong> es un servicio médico especializado orientado a la evaluación, diagnóstico, tratamiento y seguimiento de los trastornos mentales, emocionales y del comportamiento. Es prestado por un médico especialista en Psiquiatría, quien aborda de manera integral la salud mental del paciente, considerando factores biológicos, psicológicos y sociales.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Psiquiatría</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Alcance del servicio</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Este servicio está dirigido a personas que presentan:</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:#555;">
                        <li>Trastornos del estado de ánimo (depresión, trastorno bipolar)</li>
                        <li>Trastornos de ansiedad (ansiedad generalizada, pánico, fobias)</li>
                        <li>Trastornos del sueño</li>
                        <li>Trastornos psicóticos (como la Esquizofrenia)</li>
                        <li>Consumo problemático de sustancias</li>
                        <li>Trastornos de la conducta alimentaria</li>
                        <li>Estrés, crisis emocionales o dificultades de adaptación</li>
                        <li>Problemas de comportamiento o control de impulsos</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--primary-pale);font-weight:700;margin-bottom:12px;">¿Cuándo consultar un psiquiatra?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Tristeza o vacío persistente (más de 2 semanas)</li>
                        <li>Ansiedad intensa o ataques de pánico</li>
                        <li>Cambios drásticos de comportamiento</li>
                        <li>Alucinaciones o ideas delirantes</li>
                        <li>Pensamientos de hacerse daño</li>
                        <li>Dificultad para dormir o comer (severa)</li>
                        <li>Abuso de alcohol u otras sustancias</li>
                        <li>Dificultad para funcionar en el trabajo o familia</li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="info-card mb-5">
            <div class="consulta-proc-row">

                <style>
                    .info-card ul li a {
                       display: block;
                    }
                    .info-card a {
                        color: var(--primary);
                        font-weight: 600;
                        text-decoration: none;
                    }
                    .info-card a:hover {
                        color: var(--primary-dark);
                        text-decoration: underline;
                    }
                    .info-card div,
                    .info-card p,
                    .info-card li {
                        text-align: justify;
                    }
                    .info-card ul {
                        font-size: 12.5px;
                        color: #666;
                        line-height: 1.7;
                        margin-bottom: 4px;
                    }
                </style>

                {{-- Columna izquierda --}}
                <div class="consulta-proc-copy">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary);font-weight:700;margin-bottom:12px;">Procedimientos de atención</p>
                    <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">La consulta se desarrolla a través de las siguientes etapas:</h3>
                    <div class="row g-3">
                        @foreach([
                            ['Historia clínica psiquiátrica', 'Entrevista detallada que incluye motivo de consulta, síntomas actuales, antecedentes personales, familiares, sociales y consumo de sustancias, así como el contexto emocional del paciente.'],
                            ['Evaluación del estado mental', 'Análisis clínico de aspectos como el pensamiento, estado de ánimo, percepción, lenguaje, memoria, juicio y comportamiento.'],
                            ['Apoyo diagnóstico (si aplica)', 'Uso de criterios clínicos, solicitud de exámenes complementarios como electroencefalograma, tomografía axial computarizada cerebral o resonancia magnética cerebral, para descartar causas orgánicas y en algunos casos escalas de evaluación y/o pruebas neuropsicológicas o psicológicas como:
                                <ul style="margin-top:6px;padding-left:16px;">
                                    <li>Pruebas de inteligencia, pruebas de memoria, pruebas de atención y funciones ejecutivas.</li>
                                    <li>Escalas clínicas (depresión, ansiedad, riesgo suicida, etc).</li>
                                    <li>Evaluación neuropsicológica completa.</li>
                                </ul>'],
                            ['Diagnóstico y plan de manejo', 'Formulación de impresión diagnóstica, prescripción de medicamentos (si es necesario), indicación de psicoterapia u otras intervenciones, y definición de plan de seguimiento.'],
                            ['Resultados esperados del servicio', '
                                <ul style="margin-top:6px;padding-left:16px;">
                                    <li>Diagnóstico oportuno y preciso de trastornos mentales.</li>
                                    <li>Estabilización de síntomas emocionales y conductuales.</li>
                                    <li>Mejoría en la calidad de vida y funcionamiento social del paciente.</li>
                                    <li>Prevención de recaídas o complicaciones.</li>
                                    <li>Orientación y educación al paciente y su familia.</li>
                                </ul>'],
                            ['Requisitos para la atención', '
                                <ul style="margin-top:6px;padding-left:16px;">
                                    <li>Documento de identidad.</li>
                                    <li>Historia clínica previa y exámenes relacionados (si los tiene).</li>
                                    <li>Listado de medicamentos actuales.</li>
                                    <li>Asistencia con acompañante en casos de compromiso severo del estado mental.</li>
                                </ul>'],
                        ] as $item)
                            <div class="col-md-12">
                                <div style="display:flex;gap:12px;align-items:flex-start;">
                                    <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                                    <div style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">
                                        <strong>{{ $item[0] }}:</strong> {!! $item[1] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div style="text-align:center;margin-top:24px;padding-top:16px;border-top:1px solid #e8e8e8;">
                            <p style="font-size:12.5px;color:#666;margin:0;">
                                Entre 30 y 60 minutos, dependiendo de la complejidad del caso.
                            </p>
                            <p style="font-size:12.5px;color:#666;margin:0;margin-top:6px;">
                                Este servicio se presta bajo principios de confidencialidad, respeto, ética médica y enfoque humanizado, garantizando una atención integral centrada en el bienestar del paciente.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Columna derecha: panel (foto propia pendiente) --}}
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/consulta-psiquiatria.png',
                    'alt' => 'Consulta de psiquiatría — Instituto Neurociencias de Nariño',
                    'caption' => 'Consulta de psiquiatría en un ambiente confidencial',
                ])

            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary);font-weight:700;margin-bottom:12px;">Patologías que atendemos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Condiciones psiquiátricas</h3>
            <span class="cond-badge">Estrés postraumático</span>
            <span class="cond-badge">Fobias</span>
            <span class="cond-badge">Trastorno de pánico</span>
            <span class="cond-badge">Ansiedad generalizada</span>
            <span class="cond-badge">Trastorno bipolar</span>
            <span class="cond-badge">Depresión</span>
            <span class="cond-badge">Esquizofrenia</span>
            <span class="cond-badge">Anorexia</span>
            <span class="cond-badge">Bulimia</span>
            <span class="cond-badge">Déficit de atención</span>
            <span class="cond-badge">Hiperactividad</span>
            <span class="cond-badge">Autismo</span>
            <span class="cond-badge">Dependencia al alcohol</span>
            <span class="cond-badge">Dependencia al tabaco u otras sustancias</span>
            <span class="cond-badge">Insomnio</span>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-heart" style="color:var(--primary);margin-right:8px;"></i><strong>Recuerde:</strong> Buscar ayuda psiquiátrica es un acto de valentía y autocuidado. Los trastornos mentales tienen tratamiento efectivo. En el Instituto garantizamos <strong>confidencialidad total</strong> y un ambiente de respeto y comprensión.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('especialidades'), 'secondaryLabel' => 'Ver todas las especialidades'])
    </div>
</section>
@endsection
