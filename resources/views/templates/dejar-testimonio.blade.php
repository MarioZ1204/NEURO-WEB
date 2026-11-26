@extends('layout.app')
@section('title', '¡Cuéntenos su experiencia!')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero {
        background: linear-gradient(135deg, #4a6b68 0%, #7a9b98 100%);
        padding: 80px 0 60px;
        text-align: center;
        color: #fff;
    }
    .page-hero h1 { font-size: clamp(28px, 4vw, 44px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: rgba(255,255,255,0.85); margin: 0; max-width: 620px; margin-inline: auto; }
    .breadcrumb-custom {
        display: flex; justify-content: center; gap: 8px;
        font-size: 13px; color: rgba(255,255,255,0.70); margin-bottom: 15px;
    }
    .breadcrumb-custom a { color: rgba(255,255,255,0.85); text-decoration: none; }
    .contact-form-box {
        background: #fff; border-radius: 18px; box-shadow: 0 8px 40px rgba(0,0,0,0.10); padding: 44px 48px;
    }
    .cf-label {
        display: block; font-size: 11px; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.7px; color: #4a6b68; margin-bottom: 6px;
    }
    .cf-req { color: #cc0033; }
    .cf-input, .cf-select, .cf-textarea {
        width: 100%; padding: 11px 14px; border: 1.5px solid #dce8e7; border-radius: 9px;
        font-size: 16px; font-family: 'Poppins', sans-serif; color: #2c3e3d;
        background: #fff; outline: none; box-sizing: border-box;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .cf-input:focus, .cf-select:focus, .cf-textarea:focus {
        border-color: #4a6b68; box-shadow: 0 0 0 3px rgba(74,107,104,0.10);
    }
    .cf-textarea { resize: vertical; min-height: 130px; }
    .cf-group { margin-bottom: 18px; }
    .cf-help { font-size: 11px; color: #999; margin: 6px 0 0; line-height: 1.5; }
    .cf-submit {
        width: 100%; padding: 14px; background: linear-gradient(135deg, #4a6b68, #7a9b98);
        color: #fff; border: none; border-radius: 10px; font-size: 13.5px; font-weight: 700;
        letter-spacing: 0.8px; text-transform: uppercase; cursor: pointer; font-family: 'Poppins', sans-serif;
        transition: opacity 0.2s, transform 0.2s; margin-top: 8px;
    }
    .cf-submit:hover { opacity: 0.88; transform: translateY(-1px); }
    @media (max-width: 576px) { .contact-form-box { padding: 28px 20px; } }
</style>

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Reseñas</span>
        </div>
        <h1>¡Cuéntenos su experiencia!</h1>
        <p>Su reseña será revisada antes de publicarse en la página web del Instituto de Neurociencias.</p>
    </div>
</div>

<section style="background: #f8faf9; padding: 70px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if(session('testimonial_success'))
                    <div style="background:#d4edda;color:#155724;border:1px solid #c3e6cb;border-radius:10px;padding:16px 20px;margin-bottom:24px;font-size:14px;">
                        <i class="fa fa-check-circle" style="margin-right:8px;"></i> {{ session('testimonial_success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div style="background:#fee2e2;color:#991b1b;border:1px solid #fecaca;border-radius:10px;padding:16px 20px;margin-bottom:24px;font-size:14px;">
                        <strong>Por favor corrija los siguientes errores:</strong>
                        <ul style="margin: 8px 0 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="contact-form-box">
                    <form action="{{ route('testimonial.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="cf-group">
                            <label class="cf-label" for="name">Nombre completo <span class="cf-req">*</span></label>
                            <input type="text" id="name" name="name" class="cf-input" placeholder="Escriba su nombre completo" required value="{{ old('name') }}">
                        </div>

                        <div class="cf-group">
                            <label class="cf-label" for="detail">Servicio <span class="cf-req">*</span></label>
                            <select id="detail" name="detail" class="cf-select" required>
                                <option value="">Seleccione un servicio</option>
                                @foreach($services as $service)
                                    <option value="{{ $service }}" {{ old('detail') === $service ? 'selected' : '' }}>{{ $service }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="cf-group">
                            <label class="cf-label" for="rating">Calificación <span class="cf-req">*</span></label>
                            <select id="rating" name="rating" class="cf-select" required>
                                <option value="">Seleccione una calificación</option>
                                <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 Estrellas</option>
                                <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 Estrellas</option>
                                <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 Estrellas</option>
                                <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 Estrellas</option>
                                <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 Estrella</option>
                            </select>
                        </div>

                        <div class="cf-group">
                            <label class="cf-label" for="text">Reseña <span class="cf-req">*</span></label>
                            <textarea id="text" name="text" class="cf-textarea" placeholder="Cuéntenos sobre su experiencia..." required minlength="20">{{ old('text') }}</textarea>
                        </div>

                        <div class="cf-group">
                            <label class="cf-label" for="file">Archivo adjunto</label>
                            <input type="file" id="file" name="file" class="cf-input" accept=".pdf,.jpg,.jpeg,.png,.gif">
                            <p class="cf-help">En este campo puede subir un archivo en el que exprese su experiencia. Formatos permitidos: PDF o imagen. Máximo 10 MB.</p>
                        </div>

                        <button type="submit" class="cf-submit">Enviar reseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

