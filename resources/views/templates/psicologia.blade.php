@extends('layout.app')
@section('title', 'Psicología')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, #1455a0 0%, #1976d2 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: rgba(255,255,255,0.82); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.65); margin-bottom: 15px; }
    .breadcrumb-custom a { color: rgba(255,255,255,0.85); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .terapia-card { background:var(--primary-ultra); border-radius:12px; padding:20px 22px; height:100%; }
    .terapia-card h5 { font-size:13.5px; font-weight:800; color:var(--dark); margin-bottom:8px; }
    .terapia-card p { font-size:12.5px; color:#666; margin:0; line-height:1.75; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Psicología</span>
        </div>
        <h1><i class="fa fa-heart" style="margin-right:14px;opacity:0.75;"></i>Psicología</h1>
        <p>Apoyo psicológico especializado para pacientes neurológicos y sus familias</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-7">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:#1455a0;font-weight:700;">Servicio de psicología</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Bienestar emocional integral</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">El servicio de <strong>Psicología Clínica</strong> del Instituto ofrece acompañamiento psicológico especializado para personas con enfermedades neurológicas y sus familias, reconociendo que la salud mental es parte fundamental del bienestar global de cada paciente.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Nuestros psicólogos trabajan en equipo con neurólogos y psiquiatras para ofrecer un abordaje integral que considere la dimensión emocional y psicosocial de cada condición clínica.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="info-card" style="background:linear-gradient(135deg,#1455a0,#1976d2);color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:12px;">Motivos de consulta frecuentes</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.9);">
                        <li>Ajuste a diagnóstico neurológico crónico</li>
                        <li>Ansiedad ante procedimientos o exámenes</li>
                        <li>Duelo por pérdida de capacidades</li>
                        <li>Sobrecarga del cuidador familiar</li>
                        <li>Problemas de autoestima / imagen corporal</li>
                        <li>Estrés, burnout y fatiga crónica</li>
                        <li>Apoyo en epilepsia y accidente cerebrovascular</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Enfoques terapéuticos -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:#1455a0;font-weight:700;margin-bottom:12px;">Enfoques de intervención</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">Modalidades terapéuticas disponibles</h3>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="terapia-card">
                        <h5>Terapia Cognitivo-Conductual (TCC)</h5>
                        <p>Para modificar patrones de pensamiento y comportamiento que generan malestar emocional. Altamente efectiva para ansiedad y depresión.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="terapia-card">
                        <h5>Psicología de la Salud</h5>
                        <p>Intervención enfocada en el ajuste psicológico a enfermedades médicas, mejora de adherencia al tratamiento y calidad de vida.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="terapia-card">
                        <h5>Intervención en Crisis</h5>
                        <p>Apoyo inmediato para personas que enfrentan situaciones de alta tensión emocional, duelo o diagnósticos que generan impacto devastador.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="terapia-card">
                        <h5>Psicoterapia de Apoyo</h5>
                        <p>Orientación ventilatoria y emocional para pacientes que necesitan un espacio seguro de expresión durante su proceso de enfermedad.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="terapia-card">
                        <h5>Asesoría a Familias</h5>
                        <p>Orientación para cuidadores y familiares sobre cómo apoyar al paciente, manejar el estrés del cuidado y prevenir el síndrome del cuidador.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="terapia-card">
                        <h5>Mindfulness y Bienestar</h5>
                        <p>Técnicas de atención plena para el manejo del dolor crónico, ansiedad y mejora del bienestar subjetivo en pacientes con enfermedades crónicas.</p>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
            <a href="{{ route('especialidades') }}" class="btn-cta-outline" style="border-radius:25px;padding:11px 33px;font-size:13px;text-decoration:none;margin-left:12px;">Ver todas las especialidades</a>
        </div>
    </div>
</section>
@endsection
