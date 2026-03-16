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

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-7">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Subespecialidad</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">¿Qué es la Epileptología?</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Epileptología</strong> es una subespecialidad de la Neurología dedicada exclusivamente al diagnóstico, clasificación y tratamiento de la <strong>epilepsia</strong> y los <strong>síndromes epilépticos</strong>. Incluye el manejo de pacientes con epilepsia refractaria y la evaluación prequirúrgica.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La epilepsia afecta al <strong>1-2% de la población mundial</strong> y se caracteriza por crisis epilépticas recurrentes, no provocadas, debidas a una actividad eléctrica anormal en el cerebro. Con el tratamiento adecuado, más del 70% de los pacientes pueden vivir sin crisis.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-card" style="background:linear-gradient(135deg,#1a2e2c,#2e4a47);color:#fff;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--primary-pale);font-weight:700;margin-bottom:12px;">Tipos de crisis epilépticas</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.9);">
                        <li>Crisis focales (parciales simples)</li>
                        <li>Crisis focales con alteración de consciencia</li>
                        <li>Crisis focales a bilaterales tónico-clónicas</li>
                        <li>Crisis de ausencia (petit mal)</li>
                        <li>Crisis tónico-clónicas generalizadas</li>
                        <li>Crisis mioclónicas</li>
                        <li>Crisis atónicas (de caída)</li>
                        <li>Espasmos infantiles (síndrome de West)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Nuestros servicios epileptológicos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Lo que ofrecemos</h3>
            <div class="row g-3">
                <div class="col-md-6">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                        <p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;"><strong>Clasificación de crisis:</strong> según la liga internacional contra la epilepsia (ILAE 2017).</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                        <p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;"><strong>EEG de alta resolución:</strong> videoelectroencefalografía y monitoreo ambulatorio prolongado.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                        <p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;"><strong>Epilepsia refractaria:</strong> manejo de pacientes que no responden a 2 o más antiepilépticos.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                        <p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;"><strong>Evaluación prequirúrgica:</strong> estudio integral para candidatos a cirugía de epilepsia.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                        <p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;"><strong>Epilepsia y embarazo:</strong> seguimiento especializado y ajuste de medicación.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:16px;margin-top:2px;flex-shrink:0;"></i>
                        <p style="font-size:13.5px;color:#555;line-height:1.7;margin:0;"><strong>Educación al paciente y familia:</strong> primeros auxilios en crisis, calidad de vida.</p>
                    </div>
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
