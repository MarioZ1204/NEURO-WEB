@extends('layout.app')
@section('title', 'Fonoaudiología')
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
            <span>Fonoaudiología</span>
        </div>
        <h1><i class="fa fa-comments" style="margin-right:14px;opacity:0.75;"></i>Fonoaudiología</h1>
        <p>Evaluación y tratamiento del lenguaje, el habla, la voz y la deglución</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la fonoaudiología?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Comunicarse y alimentarse con seguridad</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Fonoaudiología</strong> es la disciplina que evalúa, diagnostica e interviene los trastornos de la <strong>comunicación humana</strong>: el lenguaje, el habla, la voz y la audición, así como las alteraciones de la <strong>deglución</strong> (dificultad para tragar).</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">En el Instituto atendemos con especial énfasis a pacientes con <strong>condiciones neurológicas</strong> —ACV, Parkinson, trauma craneoencefálico, parálisis facial— y a niños con retraso en la adquisición del lenguaje o dificultades en la pronunciación, siempre de la mano de las familias.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/fonoaudiologia.png',
                    'alt' => 'Sesión de fonoaudiología — Instituto Neurociencias de Nariño',
                    'caption' => 'Terapia de lenguaje y habla',
                    'class' => 'consulta-side-photo--inline',
                ])
                <div class="info-card mt-3" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:14px;">¿Cuándo consultar?</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Dificultad para hablar o encontrar palabras tras un ACV</li>
                        <li>Atoramiento o tos al comer o beber</li>
                        <li>Ronquera persistente o cambios en la voz</li>
                        <li>Niños que hablan poco para su edad</li>
                        <li>Errores al pronunciar sonidos</li>
                        <li>Tartamudez</li>
                        <li>Parálisis facial</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Unidad de Fonoaudiología</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Áreas de intervención</h3>
            <div class="row g-3">
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-book-open"></i><p>Lenguaje expresivo y comprensivo</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-comment-dots"></i><p>Habla y articulación</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-microphone"></i><p>Voz</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-utensils"></i><p>Deglución (disfagia)</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-brain"></i><p>Afasias y disartrias</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-wave-square"></i><p>Fluidez (tartamudez)</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-smile"></i><p>Motricidad orofacial</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-ear-listen"></i><p>Comunicación y audición</p></div></div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-route" style="color:var(--primary);margin-right:8px;"></i>¿Cómo es el proceso?</h3>
                    <ol style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li><strong>Valoración fonoaudiológica:</strong> se evalúan lenguaje, habla, voz y deglución según el motivo de consulta.</li>
                        <li><strong>Plan terapéutico:</strong> se establecen objetivos claros y medibles.</li>
                        <li><strong>Sesiones de terapia:</strong> ejercicios y estrategias personalizadas.</li>
                        <li><strong>Orientación familiar:</strong> pautas para practicar en casa y en el entorno escolar o laboral.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-clipboard-list" style="color:var(--primary);margin-right:8px;"></i>Recomendaciones para su cita</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li>Traiga la orden médica y la historia clínica relacionada</li>
                        <li>Si tiene exámenes de audición, imágenes o informes previos, llévelos</li>
                        <li>En niños, procure que asista descansado y acompañado por su cuidador principal</li>
                        <li>Si consulta por deglución, informe qué alimentos o líquidos le generan dificultad</li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-exclamation-circle" style="color:var(--primary);margin-right:8px;"></i><strong>Atención a tiempo:</strong> la dificultad para tragar puede causar desnutrición o neumonías por aspiración. Si usted o un familiar se atora con frecuencia al comer, solicite una valoración cuanto antes.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('landing.tiposTerapia'), 'secondaryLabel' => 'Ver tipos de terapia'])
    </div>
</section>
@endsection
