@extends('layout.app')
@section('title', 'Oftalmología')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .func-box { background:var(--primary-ultra); border-radius:10px; padding:16px 18px; text-align:center; height:100%; }
    .func-box i { font-size:22px; color:var(--primary); margin-bottom:10px; display:block; }
    .func-box p { font-size:12.5px; color:var(--dark); font-weight:700; margin:0; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Oftalmología</span>
        </div>
        <h1><i class="fa fa-eye" style="margin-right:14px;opacity:0.75;"></i>Oftalmología</h1>
        <p>Diagnóstico, tratamiento y prevención de las enfermedades de los ojos y la visión</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la oftalmología?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Cuidamos su visión en cada etapa de la vida</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Oftalmología</strong> es la especialidad médica que se ocupa del diagnóstico y tratamiento de las enfermedades del <strong>ojo, los párpados, la vía lagrimal y la órbita</strong>, así como de los trastornos de la visión. El oftalmólogo evalúa la salud ocular de forma integral para detectar a tiempo condiciones que pueden afectar su calidad de vida.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">En el Instituto trabajamos de la mano con <strong>Neurología</strong>, ya que muchas alteraciones visuales —visión doble, pérdida súbita de visión, cambios en el campo visual o dolor de cabeza asociado— pueden tener un origen neurológico y requieren una valoración conjunta.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/consulta-oftalmologia.jpg',
                    'alt' => 'Consulta de oftalmología — Instituto Neurociencias de Nariño',
                    'caption' => 'Evaluación integral de la salud visual',
                    'class' => 'consulta-side-photo--inline',
                ])
                <div class="info-card mt-3" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:14px;">¿Cuándo consultar?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Visión borrosa de lejos o de cerca</li>
                        <li>Visión doble o pérdida súbita de visión</li>
                        <li>Ojo rojo, dolor o sensibilidad a la luz</li>
                        <li>Destellos, “moscas volantes” o sombras</li>
                        <li>Dolor de cabeza asociado a esfuerzo visual</li>
                        <li>Diabetes o hipertensión arterial</li>
                        <li>Antecedentes familiares de glaucoma</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Valoración oftalmológica</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">¿Qué incluye su consulta?</h3>
            <div class="row g-3">
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-glasses"></i><p>Agudeza visual y refracción</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-eye"></i><p>Examen externo y biomicroscopía</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-tint"></i><p>Medición de la presión intraocular</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-crosshairs"></i><p>Fondo de ojo (retina y nervio óptico)</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-arrows-alt"></i><p>Motilidad ocular</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-bullseye"></i><p>Valoración del campo visual</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-brain"></i><p>Enfoque neuro-oftalmológico</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-notes-medical"></i><p>Plan de tratamiento y seguimiento</p></div></div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-stethoscope" style="color:var(--primary);margin-right:8px;"></i>Condiciones que atendemos</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li>Defectos refractivos: miopía, hipermetropía, astigmatismo y presbicia</li>
                        <li>Glaucoma y control de la presión ocular</li>
                        <li>Cataratas</li>
                        <li>Retinopatía diabética e hipertensiva</li>
                        <li>Ojo seco, conjuntivitis e inflamaciones oculares</li>
                        <li>Alteraciones del nervio óptico y de la visión de origen neurológico</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-clipboard-list" style="color:var(--primary);margin-right:8px;"></i>Recomendaciones para su cita</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li>Traiga sus gafas o lentes de contacto actuales y fórmulas anteriores</li>
                        <li>Lleve la lista de medicamentos que toma</li>
                        <li>Si le dilatan las pupilas, su visión puede quedar borrosa por algunas horas: venga acompañado y evite conducir</li>
                        <li>Traiga exámenes previos o historia clínica relacionada</li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-info-circle" style="color:var(--primary);margin-right:8px;"></i><strong>Prevención:</strong> se recomienda un control visual al menos <strong>una vez al año</strong>, especialmente si usted tiene más de 40 años, diabetes, hipertensión o antecedentes familiares de enfermedades oculares.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('consulta.oftalmologiaPediatrica'), 'secondaryLabel' => 'Ver Oftalmología Pediátrica'])
    </div>
</section>
@endsection
