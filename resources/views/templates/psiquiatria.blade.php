@extends('layout.app')
@section('title', 'Psiquiatría')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, #5c35a0 0%, #7e57c2 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: rgba(255,255,255,0.82); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.65); margin-bottom: 15px; }
    .breadcrumb-custom a { color: rgba(255,255,255,0.85); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .cond-badge { display:inline-block; background:#f3effc; color:#5c35a0; font-size:11.5px; font-weight:600; padding:5px 13px; border-radius:20px; margin:4px 4px 4px 0; }
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

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-7">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:#7e57c2;font-weight:700;">Especialidad</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Salud Mental: tan importante como la salud física</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Psiquiatría</strong> es la especialidad médica dedicada al diagnóstico, prevención y tratamiento de los <strong>trastornos mentales</strong>, emocionales y del comportamiento. El psiquiatra es un médico especialista que puede prescribir medicamentos y ofrecer psicoterapia.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">En el Instituto, el servicio de psiquiatría trabaja en estrecha colaboración con neurología, neuropsicología y psicología, ofreciendo un abordaje <strong>multidisciplinario</strong> para condiciones que se presentan en la interface mente-cerebro.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-card" style="background:linear-gradient(135deg,#5c35a0,#7e57c2);color:#fff;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:12px;">Señales de alerta</p>
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
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:#7e57c2;font-weight:700;margin-bottom:12px;">Condiciones que tratamos</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:20px;">Áreas de atención psiquiátrica</h3>
            <span class="cond-badge">Trastorno depresivo mayor</span>
            <span class="cond-badge">Trastorno bipolar</span>
            <span class="cond-badge">Trastornos de ansiedad</span>
            <span class="cond-badge">Trastorno de pánico</span>
            <span class="cond-badge">TOC (trastorno obsesivo-compulsivo)</span>
            <span class="cond-badge">Esquizofrenia y psicosis</span>
            <span class="cond-badge">TDAH en adultos</span>
            <span class="cond-badge">Trastornos de la conducta alimentaria</span>
            <span class="cond-badge">Trastorno de estrés postraumático</span>
            <span class="cond-badge">Insomnio crónico (psiquiátrico)</span>
            <span class="cond-badge">Demencias (aspecto conductual)</span>
            <span class="cond-badge">Psiquiatría de enlace neurológico</span>
        </div>

        <div style="background:#f3effc;border-left:4px solid #7e57c2;border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-heart" style="color:#7e57c2;margin-right:8px;"></i><strong>Recuerde:</strong> Buscar ayuda psiquiátrica es un acto de valentía y autocuidado. Los trastornos mentales tienen tratamiento efectivo. En el Instituto garantizamos <strong>confidencialidad total</strong> y un ambiente de respeto y comprensión.</p>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
            <a href="{{ route('especialidades') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Ver todas las especialidades</a>
        </div>
    </div>
</section>
@endsection
