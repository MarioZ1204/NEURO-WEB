@extends('layout.app')
@section('title', 'Postule su Hoja de Vida')
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
    @media (max-width:576px) { .form-box { padding:28px 20px; } }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Trabaje con Nosotros</span><span>›</span>
            <span>Hoja de Vida</span>
        </div>
        <h1>Postule su Hoja de Vida</h1>
        <p>Haga parte del equipo humano del Instituto Neurociencias de Nariño</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div style="position:sticky;top:calc(var(--navbar-h) + 20px);">
                    <h3 style="font-size:20px;font-weight:800;color:var(--dark);margin-bottom:16px;">¿Por qué trabajar con nosotros?</h3>
                    <p style="font-size:14px;color:#666;line-height:1.9;margin-bottom:24px;">En el Instituto Neurociencias de Nariño valoramos el talento humano como nuestro principal activo. Ofrecemos un ambiente de trabajo colaborativo, con desarrollo profesional continuo y un propósito claro: mejorar la calidad de vida de nuestros pacientes.</p>
                    <div style="display:flex;gap:12px;margin-bottom:14px;">
                        <i class="fa fa-graduation-cap" style="color:var(--primary);font-size:18px;flex-shrink:0;margin-top:2px;"></i>
                        <div><strong style="font-size:13px;color:var(--dark);">Formación continua</strong><p style="font-size:12.5px;color:#666;margin:4px 0 0;">Acceso a jornadas académicas, congresos y actualización científica.</p></div>
                    </div>
                    <div style="display:flex;gap:12px;margin-bottom:14px;">
                        <i class="fa fa-users" style="color:var(--primary);font-size:18px;flex-shrink:0;margin-top:2px;"></i>
                        <div><strong style="font-size:13px;color:var(--dark);">Equipo interdisciplinario</strong><p style="font-size:12.5px;color:#666;margin:4px 0 0;">Trabaje junto a especialistas de alto nivel en neurociencias.</p></div>
                    </div>
                    <div style="display:flex;gap:12px;">
                        <i class="fa fa-map-marker-alt" style="color:var(--primary);font-size:18px;flex-shrink:0;margin-top:2px;"></i>
                        <div><strong style="font-size:13px;color:var(--dark);">Ubicación central</strong><p style="font-size:12.5px;color:#666;margin:4px 0 0;">Sede principal en Pasto, Nariño, de fácil acceso.</p></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                @if(session('hv_success'))
                    <div style="background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:10px;padding:16px 20px;margin-bottom:24px;font-size:14px;">
                        <i class="fa fa-check-circle" style="margin-right:8px;"></i> {{ session('hv_success') }}
                    </div>
                @endif
                <div class="form-box">
                    <h3 style="font-size:19px;font-weight:800;color:var(--dark);margin-bottom:6px;">Formulario de postulación</h3>
                    <p style="font-size:13.5px;color:#777;margin-bottom:28px;">Complete el formulario y adjunte su hoja de vida. Nuestro equipo de Gestión Humana la revisará y se comunicará con usted.</p>
                    <form action="{{ route('trabaje.hojaDeVida.send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Nombre <span class="cf-req">*</span></label>
                                    <input type="text" name="nombre" class="cf-input" required value="{{ old('nombre') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Apellido <span class="cf-req">*</span></label>
                                    <input type="text" name="apellido" class="cf-input" required value="{{ old('apellido') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Correo Electrónico <span class="cf-req">*</span></label>
                                    <input type="email" name="correo" class="cf-input" required value="{{ old('correo') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Teléfono / Celular <span class="cf-req">*</span></label>
                                    <input type="tel" name="telefono" class="cf-input" required value="{{ old('telefono') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Profesión / Título obtenido <span class="cf-req">*</span></label>
                                    <input type="text" name="profesion" class="cf-input" placeholder="Ej: Médico, Fisioterapeuta, Psicólogo..." required value="{{ old('profesion') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Cargo de interés <span class="cf-req">*</span></label>
                                    <select name="cargo" class="cf-select" required>
                                        <option value="">— Seleccione el área —</option>
                                        <option value="Médico especialista" {{ old('cargo')=='Médico especialista'?'selected':'' }}>Médico especialista</option>
                                        <option value="Médico general" {{ old('cargo')=='Médico general'?'selected':'' }}>Médico general</option>
                                        <option value="Enfermería" {{ old('cargo')=='Enfermería'?'selected':'' }}>Enfermería</option>
                                        <option value="Fisioterapia / Terapia Física" {{ old('cargo')=='Fisioterapia / Terapia Física'?'selected':'' }}>Fisioterapia / Terapia Física</option>
                                        <option value="Psicología / Neuropsicología" {{ old('cargo')=='Psicología / Neuropsicología'?'selected':'' }}>Psicología / Neuropsicología</option>
                                        <option value="Tecnología en Neurofisiología" {{ old('cargo')=='Tecnología en Neurofisiología'?'selected':'' }}>Tecnología en Neurofisiología</option>
                                        <option value="Área administrativa" {{ old('cargo')=='Área administrativa'?'selected':'' }}>Área administrativa</option>
                                        <option value="Otro" {{ old('cargo')=='Otro'?'selected':'' }}>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Adjunte su Hoja de Vida (PDF / DOC, máx. 5 MB) <span class="cf-req">*</span></label>
                                    <input type="file" name="hoja_de_vida" class="cf-input" accept=".pdf,.doc,.docx" required style="padding:8px 12px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Mensaje adicional (opcional)</label>
                                    <textarea name="mensaje" class="cf-textarea" placeholder="Carta de presentación breve, disponibilidad, expectativas…">{{ old('mensaje') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div style="display:flex;align-items:flex-start;gap:10px;font-size:12.5px;color:#555;margin-bottom:8px;">
                                    <input type="checkbox" id="privacyCheck" required style="width:15px;height:15px;flex-shrink:0;margin-top:2px;accent-color:var(--primary);">
                                    <label for="privacyCheck">Acepto la <a href="{{ route('politicaPrivacidad') }}" target="_blank" style="color:var(--primary);font-weight:600;">Política de Privacidad</a> y el tratamiento de los datos personales suministrados con fines de selección de personal.</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="cf-submit">Enviar Postulación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

