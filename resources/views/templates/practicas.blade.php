@extends('layout.app')
@section('title', 'Prácticas Universitarias')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .form-box { background:#fff; border-radius:18px; box-shadow:0 8px 40px rgba(0,0,0,0.09); padding:44px 48px; }
    .cf-label { display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.7px; color:var(--primary); margin-bottom:6px; }
    .cf-req { color:#cc0033; }
    .cf-input, .cf-select, .cf-textarea {
        width:100%; padding:11px 14px; border:1.5px solid #dce8e7; border-radius:9px;
        font-size:16px; font-family:'Poppins',sans-serif; color:#2c3e3d;
        background:#fff; outline:none; box-sizing:border-box; transition:border-color 0.2s,box-shadow 0.2s;
    }
    .cf-input:focus, .cf-select:focus, .cf-textarea:focus { border-color:var(--primary); box-shadow:0 0 0 3px rgba(74,107,104,0.10); }
    .cf-textarea { resize:vertical; min-height:110px; }
    .cf-group { margin-bottom:18px; }
    .cf-submit { width:100%; padding:14px; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; border:none; border-radius:10px; font-size:13.5px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; cursor:pointer; font-family:'Poppins',sans-serif; transition:opacity 0.2s,transform 0.2s; margin-top:8px; }
    .cf-submit:hover { opacity:0.88; transform:translateY(-1px); }
    .info-card { background:#fff; border-radius:14px; padding:26px; box-shadow:0 4px 20px rgba(0,0,0,0.06); }
    @media (max-width:576px) { .form-box { padding:28px 20px; } }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Trabaje con Nosotros</span><span>›</span>
            <span>Prácticas Universitarias</span>
        </div>
        <h1>Prácticas Universitarias</h1>
        <p>Aprenda junto a los mejores especialistas en neurociencias del suroccidente colombiano</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <!-- Info -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="info-card h-100">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Rotaciones disponibles</p>
                    <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin:12px 0 18px;">Áreas de práctica</h3>
                    @foreach(['Neurología clínica','Epileptología y Neurofisiología','Psiquiatría','Neuropsicología','Psicología clínica','Fisioterapia y Neurorrehabilitación','Medicina general','Tecnología en registros EEG/Polisomnografía'] as $area)
                        <div style="display:flex;gap:10px;align-items:center;margin-bottom:10px;">
                            <i class="fa fa-check-circle" style="color:var(--primary);font-size:14px;flex-shrink:0;"></i>
                            <span style="font-size:13.5px;color:#555;">{{ $area }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card h-100">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Requisitos</p>
                    <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin:12px 0 18px;">¿Qué necesita?</h3>
                    <div style="display:flex;gap:12px;margin-bottom:14px;">
                        <i class="fa fa-university" style="color:var(--primary);font-size:16px;flex-shrink:0;margin-top:2px;"></i>
                        <p style="font-size:13.5px;color:#555;margin:0;">Estar matriculado en un programa de salud o ciencias afines (Medicina, Psicología, Fisioterapia, etc.)</p>
                    </div>
                    <div style="display:flex;gap:12px;margin-bottom:14px;">
                        <i class="fa fa-file-alt" style="color:var(--primary);font-size:16px;flex-shrink:0;margin-top:2px;"></i>
                        <p style="font-size:13.5px;color:#555;margin:0;">Convenio firmado entre su universidad y el Instituto (o solicitar uno nuevo)</p>
                    </div>
                    <div style="display:flex;gap:12px;margin-bottom:14px;">
                        <i class="fa fa-shield-alt" style="color:var(--primary);font-size:16px;flex-shrink:0;margin-top:2px;"></i>
                        <p style="font-size:13.5px;color:#555;margin:0;">Póliza estudiantil vigente y seguro de accidentes</p>
                    </div>
                    <div style="display:flex;gap:12px;">
                        <i class="fa fa-calendar" style="color:var(--primary);font-size:16px;flex-shrink:0;margin-top:2px;"></i>
                        <p style="font-size:13.5px;color:#555;margin:0;">Solicitar con mínimo 30 días de anticipación al inicio de la práctica</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-box">
                    <h3 style="font-size:19px;font-weight:800;color:var(--dark);margin-bottom:6px;">Solicitud de práctica</h3>
                    <p style="font-size:13.5px;color:#777;margin-bottom:28px;">Complete los datos y nuestro equipo de docencia la evaluará y le responderá.</p>
                    <form action="{{ route('trabaje.practicas.send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Nombre <span class="cf-req">*</span></label><input type="text" name="nombre" class="cf-input" required value="{{ old('nombre') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Apellido <span class="cf-req">*</span></label><input type="text" name="apellido" class="cf-input" required value="{{ old('apellido') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Correo electrónico <span class="cf-req">*</span></label><input type="email" name="correo" class="cf-input" required value="{{ old('correo') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Celular <span class="cf-req">*</span></label><input type="tel" name="telefono" class="cf-input" required value="{{ old('telefono') }}"></div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group"><label class="cf-label">Universidad / Institución educativa <span class="cf-req">*</span></label><input type="text" name="universidad" class="cf-input" required value="{{ old('universidad') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Programa académico <span class="cf-req">*</span></label>
                                    <input type="text" name="programa" class="cf-input" placeholder="Ej: Medicina, Fisioterapia..." required value="{{ old('programa') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Semestre / Año cursado <span class="cf-req">*</span></label>
                                    <input type="text" name="semestre" class="cf-input" required value="{{ old('semestre') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Fecha de inicio propuesta</label>
                                    <input type="date" name="fecha_inicio" class="cf-input" value="{{ old('fecha_inicio') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Duración de la práctica</label>
                                    <input type="text" name="duracion" class="cf-input" placeholder="Ej: 3 meses, 480 horas..." value="{{ old('duracion') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Área de rotación solicitada <span class="cf-req">*</span></label>
                                    <select name="area" class="cf-select" required>
                                        <option value="">— Seleccione —</option>
                                        @foreach(['Neurología clínica','Epileptología','Psiquiatría','Neuropsicología','Psicología clínica','Fisioterapia / Neurorrehabilitación','Medicina general','Neurofisiología / EEG'] as $a)
                                            <option value="{{ $a }}" {{ old('area')==$a?'selected':'' }}>{{ $a }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Carta de presentación institucional (PDF, máx. 5 MB)</label>
                                    <input type="file" name="carta" class="cf-input" accept=".pdf,.doc,.docx" style="padding:8px 12px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div style="display:flex;align-items:flex-start;gap:10px;font-size:12.5px;color:#555;margin-bottom:8px;">
                                    <input type="checkbox" id="privCheck" required style="width:15px;height:15px;flex-shrink:0;margin-top:2px;accent-color:var(--primary);">
                                    <label for="privCheck">Acepto la <a href="{{ route('politicaPrivacidad') }}" target="_blank" style="color:var(--primary);font-weight:600;">Política de Privacidad</a> y el tratamiento de los datos personales suministrados.</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="cf-submit">Enviar Solicitud</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

