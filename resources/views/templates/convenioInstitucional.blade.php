@extends('layout.app')
@section('title', 'Convenio Interinstitucional')
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
    .cf-input, .cf-select, .cf-textarea { width:100%; padding:11px 14px; border:1.5px solid #dce8e7; border-radius:9px; font-size:13px; font-family:'Poppins',sans-serif; color:#2c3e3d; background:#fff; outline:none; box-sizing:border-box; transition:border-color 0.2s,box-shadow 0.2s; }
    .cf-input:focus, .cf-select:focus, .cf-textarea:focus { border-color:var(--primary); box-shadow:0 0 0 3px rgba(74,107,104,0.10); }
    .cf-textarea { resize:vertical; min-height:110px; }
    .cf-group { margin-bottom:18px; }
    .cf-submit { width:100%; padding:14px; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; border:none; border-radius:10px; font-size:13.5px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; cursor:pointer; font-family:'Poppins',sans-serif; transition:opacity 0.2s,transform 0.2s; margin-top:8px; }
    .cf-submit:hover { opacity:0.88; transform:translateY(-1px); }
    .benefit-card { background:var(--primary-ultra); border-radius:12px; padding:20px 22px; height:100%; }
    @media (max-width:576px) { .form-box { padding:28px 20px; } }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Trabaje con Nosotros</span><span>›</span>
            <span>Convenio Interinstitucional</span>
        </div>
        <h1>Convenio Interinstitucional</h1>
        <p>Establezca alianzas estratégicas con el Instituto Neurociencias de Nariño</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-5">
                <div style="background:#fff;border-radius:14px;padding:28px;box-shadow:0 4px 20px rgba(0,0,0,0.06);margin-bottom:20px;">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Alianzas estratégicas</p>
                    <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin:12px 0 14px;">¿Para qué tipo de instituciones?</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2.2;padding-left:18px;margin:0;">
                        <li>Universidades e Instituciones de Educación Superior</li>
                        <li>EPS y aseguradoras en salud</li>
                        <li>Clínicas y hospitales de primer/segundo nivel</li>
                        <li>Empresas (salud ocupacional)</li>
                        <li>Entidades gubernamentales de salud</li>
                        <li>Instituciones de investigación científica</li>
                        <li>Asociaciones médicas y gremiales</li>
                    </ul>
                </div>
                <div class="row g-3">
                    @foreach(['Referencia y contrareferencia de pacientes','Rotaciones académicas y formación','Investigación y publicaciones conjuntas','Alianzas de telemedicina'] as $b)
                        <div class="col-6">
                            <div class="benefit-card">
                                <i class="fa fa-handshake" style="color:var(--primary);font-size:18px;margin-bottom:8px;"></i>
                                <p style="font-size:12px;font-weight:700;color:var(--dark);margin:0;">{{ $b }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-box">
                    <h3 style="font-size:19px;font-weight:800;color:var(--dark);margin-bottom:6px;">Solicitar convenio</h3>
                    <p style="font-size:13.5px;color:#777;margin-bottom:28px;">Complete el formulario y nuestro equipo directivo se comunicará para iniciar el proceso.</p>
                    <form action="{{ route('trabaje.convenio.send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Nombre de la institución <span class="cf-req">*</span></label><input type="text" name="institucion" class="cf-input" required value="{{ old('institucion') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group">
                                    <label class="cf-label">Tipo de institución <span class="cf-req">*</span></label>
                                    <select name="tipo" class="cf-select" required>
                                        <option value="">— Seleccione —</option>
                                        @foreach(['Universidad / IES','EPS / Aseguradora','Clínica / Hospital','Empresa privada','Entidad pública','Otro'] as $t)
                                            <option value="{{ $t }}" {{ old('tipo')==$t?'selected':'' }}>{{ $t }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Nombre del representante <span class="cf-req">*</span></label><input type="text" name="representante" class="cf-input" required value="{{ old('representante') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Cargo del representante <span class="cf-req">*</span></label><input type="text" name="cargo" class="cf-input" required value="{{ old('cargo') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Correo institucional <span class="cf-req">*</span></label><input type="email" name="correo" class="cf-input" required value="{{ old('correo') }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="cf-group"><label class="cf-label">Teléfono / Extensión <span class="cf-req">*</span></label><input type="tel" name="telefono" class="cf-input" required value="{{ old('telefono') }}"></div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Objetivo del convenio <span class="cf-req">*</span></label>
                                    <textarea name="objetivo" class="cf-textarea" placeholder="Describa brevemente el tipo de alianza y sus objetivos…" required>{{ old('objetivo') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cf-group">
                                    <label class="cf-label">Adjunte propuesta (PDF, máx. 5 MB, opcional)</label>
                                    <input type="file" name="propuesta" class="cf-input" accept=".pdf,.doc,.docx" style="padding:8px 12px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div style="display:flex;align-items:flex-start;gap:10px;font-size:12.5px;color:#555;margin-bottom:8px;">
                                    <input type="checkbox" id="privCheck" required style="width:15px;height:15px;flex-shrink:0;margin-top:2px;accent-color:var(--primary);">
                                    <label for="privCheck">Acepto la <a href="{{ route('politicaPrivacidad') }}" target="_blank" style="color:var(--primary);font-weight:600;">Política de Privacidad</a> y autorizo el tratamiento de los datos.</label>
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
