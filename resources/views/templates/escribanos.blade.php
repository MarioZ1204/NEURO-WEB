@extends('layout.app')
@section('title', 'Escríbanos')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, #c0620a 0%, #e07d1a 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: rgba(255,255,255,0.82); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.70); margin-bottom: 15px; }
    .breadcrumb-custom a { color: rgba(255,255,255,0.85); text-decoration: none; }
    .contact-form-box { background:#fff; border-radius:18px; box-shadow:0 8px 40px rgba(0,0,0,0.10); padding:44px 48px; }
    .cf-label { display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.7px; color:#4a6b68; margin-bottom:6px; }
    .cf-req { color:#cc0033; }
    .cf-input, .cf-select, .cf-textarea {
        width:100%; padding:11px 14px; border:1.5px solid #dce8e7; border-radius:9px;
        font-size:13px; font-family:'Poppins',sans-serif; color:#2c3e3d;
        background:#fff; outline:none; box-sizing:border-box;
        transition:border-color 0.2s,box-shadow 0.2s;
    }
    .cf-input:focus, .cf-select:focus, .cf-textarea:focus { border-color:#4a6b68; box-shadow:0 0 0 3px rgba(74,107,104,0.10); }
    .cf-textarea { resize:vertical; min-height:130px; }
    .cf-group { margin-bottom:18px; }
    .cf-submit { width:100%; padding:14px; background:linear-gradient(135deg,#c0620a,#e07d1a); color:#fff; border:none; border-radius:10px; font-size:13.5px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; cursor:pointer; font-family:'Poppins',sans-serif; transition:opacity 0.2s,transform 0.2s; margin-top:8px; }
    .cf-submit:hover { opacity:0.88; transform:translateY(-1px); }
    @media (max-width:576px) { .contact-form-box { padding:28px 20px; } }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Escríbanos</span>
        </div>
        <h1>Escríbanos</h1>
        <p>Envíenos su mensaje y le responderemos a la brevedad posible</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if(session('escribanos_success'))
                    <div style="background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:10px;padding:16px 20px;margin-bottom:24px;font-size:14px;">
                        <i class="fa fa-check-circle" style="margin-right:8px;"></i> {{ session('escribanos_success') }}
                    </div>
                @endif

                <div class="contact-form-box">
                    <h3 style="font-size:20px;font-weight:800;color:var(--dark);margin-bottom:6px;">Envíenos un correo</h3>
                    <p style="font-size:13.5px;color:#777;margin-bottom:30px;">Complete el formulario y nuestro equipo le responderá en un plazo máximo de 24 horas hábiles.</p>

                    <form action="{{ route('escribanos.send') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Nombre <span class="cf-req">*</span></label>
                                    <input type="text" name="nombre" class="cf-input" placeholder="Su nombre" required value="{{ old('nombre') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Apellido <span class="cf-req">*</span></label>
                                    <input type="text" name="apellido" class="cf-input" placeholder="Su apellido" required value="{{ old('apellido') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Correo Electrónico <span class="cf-req">*</span></label>
                                    <input type="email" name="correo" class="cf-input" placeholder="correo@ejemplo.com" required value="{{ old('correo') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Teléfono / Celular</label>
                                    <input type="tel" name="telefono" class="cf-input" placeholder="305 000 0000" value="{{ old('telefono') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Asunto <span class="cf-req">*</span></label>
                                    <select name="asunto" class="cf-select" required>
                                        <option value="">— Seleccione el motivo —</option>
                                        <option value="Solicitud de cita" {{ old('asunto')=='Solicitud de cita'?'selected':'' }}>Solicitud de cita</option>
                                        <option value="Información de servicios" {{ old('asunto')=='Información de servicios'?'selected':'' }}>Información de servicios</option>
                                        <option value="Resultados de exámenes" {{ old('asunto')=='Resultados de exámenes'?'selected':'' }}>Resultados de exámenes</option>
                                        <option value="Facturación y pagos" {{ old('asunto')=='Facturación y pagos'?'selected':'' }}>Facturación y pagos</option>
                                        <option value="Petición, Queja o Reclamo" {{ old('asunto')=='Petición, Queja o Reclamo'?'selected':'' }}>Petición, Queja o Reclamo</option>
                                        <option value="Otro" {{ old('asunto')=='Otro'?'selected':'' }}>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Mensaje <span class="cf-req">*</span></label>
                                    <textarea name="mensaje" class="cf-textarea" placeholder="Escriba su mensaje aquí…" required>{{ old('mensaje') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div style="display:flex;align-items:flex-start;gap:10px;font-size:12.5px;color:#555;margin-bottom:8px;">
                                    <input type="checkbox" id="privacyCheck" required style="width:15px;height:15px;flex-shrink:0;margin-top:2px;accent-color:#4a6b68;">
                                    <label for="privacyCheck">He leído y acepto la <a href="{{ route('politicaPrivacidad') }}" target="_blank" style="color:#4a6b68;font-weight:600;">Política de Privacidad</a> y el tratamiento de mis datos personales.</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="cf-submit">Enviar Mensaje</button>
                    </form>
                </div>

                <!-- Datos de contacto directo -->
                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div style="background:#fff;border-radius:12px;padding:20px;box-shadow:0 3px 14px rgba(0,0,0,0.06);text-align:center;">
                            <i class="fa fa-envelope" style="font-size:22px;color:#c0620a;margin-bottom:10px;"></i>
                            <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:var(--dark);margin-bottom:4px;">Correo</p>
                            <a href="mailto:neurocienciasnarino@gmail.com" style="font-size:12px;color:#555;text-decoration:none;">neurocienciasnarino@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background:#fff;border-radius:12px;padding:20px;box-shadow:0 3px 14px rgba(0,0,0,0.06);text-align:center;">
                            <i class="fa fa-phone" style="font-size:22px;color:#c0620a;margin-bottom:10px;"></i>
                            <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:var(--dark);margin-bottom:4px;">Teléfono</p>
                            <a href="tel:6027238141" style="font-size:12px;color:#555;text-decoration:none;">(602) 7238141</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background:#fff;border-radius:12px;padding:20px;box-shadow:0 3px 14px rgba(0,0,0,0.06);text-align:center;">
                            <i class="fa fa-map-marker-alt" style="font-size:22px;color:#c0620a;margin-bottom:10px;"></i>
                            <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:var(--dark);margin-bottom:4px;">Dirección</p>
                            <span style="font-size:12px;color:#555;">C. 14A #34-13, Pasto, Nariño</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
