@extends('layout.app')
@section('title', 'Especialidades')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .esp-card { background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.07); transition:transform 0.3s,box-shadow 0.3s; height:100%; text-decoration:none; display:block; }
    .esp-card:hover { transform:translateY(-6px); box-shadow:0 15px 40px rgba(74,107,104,0.18); }
    .esp-card-header { padding:28px 26px 20px; background:linear-gradient(135deg, var(--primary), var(--primary-dark)); }
    .esp-card-header .esp-icon { width:54px; height:54px; background:rgba(255,255,255,0.18); border-radius:14px; display:flex; align-items:center; justify-content:center; margin-bottom:14px; }
    .esp-card-header h5 { color:#fff; font-size:15px; font-weight:800; text-transform:uppercase; letter-spacing:0.5px; margin:0; }
    .esp-card-body { padding:20px 26px 24px; }
    .esp-card-body p { font-size:13.5px; color:#666; line-height:1.75; margin:0; }
    .esp-link { display:inline-flex; align-items:center; gap:6px; margin-top:14px; font-size:11.5px; font-weight:700; color:var(--primary); letter-spacing:0.5px; text-transform:uppercase; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Especialidades</span>
        </div>
        <h1>Nuestras Especialidades</h1>
        <p>Atención especializada, integral y humanizada en neurociencias</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('consulta.neurologia') }}" class="esp-card">
                    <div class="esp-card-header">
                        <div class="esp-icon"><i class="fa fa-brain" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Neurología</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Diagnóstico y tratamiento de enfermedades del sistema nervioso central y periférico: cefaleas, neuropatías, trastornos del movimiento y más.</p>
                        <span class="esp-link">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('consulta.epileptologia') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#2e4a47,#1a2e2c);">
                        <div class="esp-icon"><i class="fa fa-bolt" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Epileptología</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Diagnóstico y manejo especializado de epilepsia y crisis paroxísticas, incluyendo epilepsia refractaria y evaluación prequirúrgica.</p>
                        <span class="esp-link">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('consulta.psiquiatria') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#5c35a0,#7e57c2);">
                        <div class="esp-icon"><i class="fa fa-head-side-virus" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Psiquiatría</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Evaluación y tratamiento de trastornos mentales, del estado de ánimo, ansiedad, esquizofrenia y otras condiciones de salud mental.</p>
                        <span class="esp-link" style="color:#7e57c2;">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('consulta.neuropsicologia') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#c0620a,#e07d1a);">
                        <div class="esp-icon"><i class="fa fa-puzzle-piece" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Neuropsicología</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Evaluación de funciones cognitivas: memoria, atención, lenguaje y funciones ejecutivas. Diagnóstico de demencias y deterioro cognitivo.</p>
                        <span class="esp-link" style="color:#c0620a;">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('consulta.psicologia') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#1455a0,#1976d2);">
                        <div class="esp-icon"><i class="fa fa-heart" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Psicología</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Intervención psicológica para el bienestar emocional, manejo del estrés, ansiedad, duelo y ajuste ante enfermedades neurológicas crónicas.</p>
                        <span class="esp-link" style="color:#1455a0;">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('landing.tiposTerapia') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#1b6b3a,#27ae60);">
                        <div class="esp-icon"><i class="fa fa-running" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Terapia Física</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Rehabilitación funcional, fisioterapia, terapia ocupacional, fonoaudiología y neurorrehabilitación para pacientes con condiciones neurológicas.</p>
                        <span class="esp-link" style="color:#1b6b3a;">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('landing.electrodiagnosticos') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#8d1f1f,#c0392b);">
                        <div class="esp-icon"><i class="fa fa-wave-square" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Electrodiagnóstico</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>EEG, electromiografía, polisomnografía, potenciales evocados y monitoreo ambulatorio para diagnósticos neurofisiológicos precisos.</p>
                        <span class="esp-link" style="color:#8d1f1f;">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('consulta.medicinaGeneral') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#5d6b2e,#7d9140);">
                        <div class="esp-icon"><i class="fa fa-stethoscope" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Medicina General</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Atención médica general para diagnóstico oportuno, manejo de enfermedades agudas, crónicas y remisión al especialista correspondiente.</p>
                        <span class="esp-link" style="color:#5d6b2e;">Conocer más ›</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('servicios.clinicaSueno') }}" class="esp-card">
                    <div class="esp-card-header" style="background:linear-gradient(135deg,#1a2e2c,#2e4a47);">
                        <div class="esp-icon"><i class="fa fa-moon" style="color:#fff;font-size:22px;"></i></div>
                        <h5>Clínica del Sueño</h5>
                    </div>
                    <div class="esp-card-body">
                        <p>Diagnóstico y tratamiento integral de trastornos del sueño: apnea, insomnio, narcolepsia y parasomnias con tecnología de vanguardia.</p>
                        <span class="esp-link">Conocer más ›</span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
@endsection
