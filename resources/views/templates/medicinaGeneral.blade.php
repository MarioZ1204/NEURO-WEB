@extends('layout.app')
@section('title', 'Medicina General')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .srv-row { display:flex; gap:12px; align-items:flex-start; margin-bottom:14px; }
    .srv-row i { font-size:16px; color:#5d6b2e; flex-shrink:0; margin-top:2px; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Medicina General</span>
        </div>
        <h1><i class="fa fa-stethoscope" style="margin-right:14px;opacity:0.75;"></i>Medicina General</h1>
        <p>Atención médica integral de primer nivel como puerta de entrada al cuidado especializado</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-7">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:#5d6b2e;font-weight:700;">Atención primaria</p>
                    <h2 style="font-size:clamp(18px,2vw,26px);font-weight:800;color:var(--dark);margin-bottom:16px;">El médico general como eje del cuidado</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Medicina General</strong> es la especialidad de primer contacto con el sistema de salud. Nuestros médicos generales realizan el diagnóstico de enfermedades agudas y crónicas, gestionan el manejo inicial y coordinan de manera eficiente las remisiones al especialista pertinente.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">En el contexto de un instituto de neurociencias, el médico general juega un papel fundamental en la <strong>detección temprana</strong> de síntomas neurológicos y en la coordinación del cuidado del paciente con múltiples especialistas.</p>
                </div>
            </div>
            <div class="col-lg-5">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/consulta-medicina-general.png',
                    'alt' => 'Consulta de medicina general — Instituto Neurociencias de Nariño',
                    'caption' => 'Atención médica general en nuestra sede',
                    'class' => 'consulta-side-photo--inline',
                ])
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-12">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:#5d6b2e;font-weight:700;">Servicios disponibles</p>
                    <h3 style="font-size:16px;font-weight:800;color:var(--dark);margin-bottom:18px;">Atención médica general</h3>
                    <div class="row g-2">
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Consulta y evaluación médica integral inicial</p></div></div>
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Diagnóstico y tratamiento de enfermedades agudas</p></div></div>
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Seguimiento de enfermedades crónicas (hipertensión, diabetes, etc.)</p></div></div>
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Solicitud e interpretación de exámenes de laboratorio</p></div></div>
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Remisiones a especialistas (Neurología, Psiquiatría, etc.)</p></div></div>
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Prescripción de medicamentos y seguimiento</p></div></div>
                        <div class="col-md-6"><div class="srv-row"><i class="fa fa-check-circle"></i><p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;">Certificados médicos y copias de historia clínica</p></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div style="background:#f0f4e8;border-left:4px solid #5d6b2e;border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-lightbulb" style="color:#5d6b2e;margin-right:8px;"></i><strong>Recuerde:</strong> Si usted presenta síntomas como dolor de cabeza severo, pérdida de memoria reciente, cambios en el habla o la visión, temblores o debilidad en extremidades, la consulta de medicina general puede ser el primer paso para una identificación temprana y remisión oportuna a neurología.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('especialidades'), 'secondaryLabel' => 'Ver todas las especialidades'])
    </div>
</section>
@endsection

