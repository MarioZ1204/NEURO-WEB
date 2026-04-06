@extends('layout.app')
@section('title', 'Epileptología')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, #1a2e2c 0%, #2e4a47 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
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
            <span>Epileptología</span>
        </div>
        <h1><i class="fa fa-bolt" style="margin-right:14px;opacity:0.75;"></i>Epileptología</h1>
        <p>Especialistas en el diagnóstico y tratamiento integral de la epilepsia</p>
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
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Subespecialidad</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">¿Qué es la Epileptología?</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La consulta de <strong>Epileptología</strong> es un servicio médico especializado enfocado en la evaluación, diagnóstico, tratamiento y seguimiento de pacientes con crisis epilépticas y epilepsia. Es una subespecialidad de la Neurología dedicada al estudio integral de los trastornos convulsivos y otras condiciones paroxísticas del sistema nervioso.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Epileptología</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Alcance del servicio</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Este servicio está dirigido a pacientes de todas las edades que presentan:</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:#555;">
                        <li>Crisis convulsivas o sospecha de las mismas</li>
                        <li>Diagnóstico previo de Epilepsia</li>
                        <li>Episodios de pérdida de conciencia o desconexión</li>
                        <li>Movimientos involuntarios o eventos paroxísticos no claros</li>
                        <li>Epilepsia de difícil control (refractaria)</li>
                        <li>Evaluación para cirugía de epilepsia</li>
                        <li>Seguimiento de tratamiento anticonvulsivante</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="info-card" style="background:linear-gradient(135deg,#1a2e2c,#2e4a47);color:#fff;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--primary-pale);font-weight:700;margin-bottom:12px;">¿Cuando consultar un epileptólogo?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.9);">
                        <li>Primeras convulsiones</li>
                        <li>Convulsiones no controladas</li>
                        <li>Dudas sobre si los episodios son realmente epilepsia</li>
                        <li>Pérdida de conciencia sin causa clara</li>
                        <li>Confusión, desorientación o debilidad después de un episodio</li>
                    </ul>
                </div>
            </div>
            
            
        </div>




                      
<div class="info-card mb-5">
    <div style="display:flex;gap:32px;align-items:stretch;">
        
                        <style>
                    .info-card ul li a {
                       display: block;
                    }
                    .info-card a {
                        color: var(--primary-light);
                        font-weight: 600;
                        text-decoration: none;
                    }
                    .info-card a:hover {
                        color: var(--primary);
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

        {{-- Columna izquierda: 60% --}}
        <div style="flex:0 0 60%;">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Procedimientos de atención</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">La consulta se desarrolla a través de las siguientes etapas:</h3>
            <div class="row g-3">
                @foreach([
                    ['Historia clínica especializada', 'Análisis detallado de los episodios (inicio, duración, frecuencia, características), antecedentes personales, familiares y respuesta a tratamientos previos.'],
                    ['Caracterización de las crisis', 'Clasificación del tipo de crisis (focal, generalizada u otras), identificación de posibles desencadenantes y evaluación del impacto en la vida del paciente.'],
                    ['Examen neurológico', 'Valoración integral del estado neurológico para identificar signos asociados o déficits.'],
                    ['Apoyo diagnóstico (si es necesario)', 'Solicitud e interpretación de estudios como: Electroencefalograma (EEG), Video-EEG, Resonancia magnética cerebral, Otros estudios especializados'],
                    ['Diagnóstico y plan de manejo', '<span>Solicitud e interpretación de estudios complementarios:</span>
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
                    ['Diagnóstico y plan terapéutico – procedimientos especiales en epileptología', '<span>Definición del diagnóstico, formulación médica si es necesario, recomendaciones terapéuticas o realización de tratamientos como:</span>
                        <ul style="margin-top:6px;padding-left:16px;">
                            <li><a href="/servicios/neuroestimulador" target="_blank">Revisión de neuroestimulador.</a></li>
                            <li><a href="/servicios/toxina-botulinica" target="_blank">Inyección de material miorrelajante (toxina botulínica) para tratamientos de patologías neurológicas.</a></li>
                            <li><a href="/servicios/bloqueo-nervio" target="_blank">Inyección de agente anestésico para nervio periférico.</a></li>
                            <li><a href="/servicios/bloqueo-mioneural" target="_blank">Bloqueo unión mioneural por puntos y establecimiento de plan de seguimiento.</a></li>
                        </ul>'],
                    ['Resultados esperados del servicio', '
                        <ul style="margin-top:6px;padding-left:16px;">
                            <li>Diagnóstico preciso del tipo de crisis o epilepsia.</li>
                            <li>Control o reducción significativa de las crisis.</li>
                            <li>Optimización del tratamiento farmacológico.</li>
                            <li>Identificación de candidatos a terapias avanzadas (cirugía, neuroestimulación).</li>
                            <li>Educación al paciente y su familia sobre el manejo de la enfermedad y prevención de riesgos.</li>
                        </ul>'],
                    ['Requisitos para la atención', '
                        <ul style="margin-top:6px;padding-left:16px;">
                            <li>Documento de identidad.</li>
                            <li>Historia clínica y exámenes previos (especialmente EEG o neuroimágenes).</li>
                            <li>Registro detallado de las crisis (frecuencia, características, videos si es posible).</li>
                            <li>Listado de medicamentos actuales y previos.</li>
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
                        Este servicio se presta bajo un enfoque especializado, integral y continuo, orientado a mejorar la calidad de vida del paciente y lograr el máximo control posible de las crisis epilépticas.
                    </p>
                </div>
            </div>
        </div>

        {{-- Columna derecha: 40% --}}
        <div style="flex:0 0 40%;display:flex;align-items:center;justify-content:center;">
            <img src="{{ asset('img/consultaN.jpg') }}" alt="Consulta de epileptología"
                style="width:100%;height:100%;object-fit:cover;border-radius:12px;">
        </div>

    </div>
</div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-exclamation-triangle" style="color:var(--primary);margin-right:8px;"></i><strong>Importante:</strong> La epilepsia no es una enfermedad mental ni contagiosa. Con el tratamiento correcto, la mayoría de pacientes puede llevar una vida normal. Si usted o un familiar ha tenido dos o más crisis sin causa aparente, consulte con nuestro equipo de epileptología.</p>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
            <a href="{{ route('especialidades') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Ver todas las especialidades</a>
        </div>
    </div>
</section>
@endsection
