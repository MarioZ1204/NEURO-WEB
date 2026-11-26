@extends('admin.layout')
@section('title', 'Ajustes del sitio')
@section('content')
<div class="ad-top">
    <div>
        <h1>Ajustes del sitio</h1>
        <p>Estos datos se ven en el menú, el pie de página y la portada. No hay que tocar código.</p>
    </div>
</div>

<div class="ad-split">
<form method="POST" action="{{ route('admin.settings.update') }}" class="ad-card ad-card-pad" enctype="multipart/form-data" id="settingsForm">
    @csrf
    @method('PUT')

    @if($errors->any())
        <div class="ad-alert err">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <h3 style="margin:0 0 16px;font-size:16px;">Contacto</h3>
    <div class="ad-field">
        <label>PBX</label>
        <input type="text" name="phone_fixed_display" value="{{ old('phone_fixed_display', $site['phone_fixed_display']) }}" required>
    </div>
    <div class="ad-field">
        <label>WhatsApp 1 — etiqueta</label>
        <input type="text" name="wa1_label" value="{{ old('wa1_label', $site['wa1_label']) }}" required>
    </div>
    <div class="ad-field">
        <label>WhatsApp 1 — número</label>
        <input type="text" name="wa1_display" value="{{ old('wa1_display', $site['wa1_display']) }}" required>
    </div>
    <div class="ad-field">
        <label>WhatsApp 2 — etiqueta</label>
        <input type="text" name="wa2_label" value="{{ old('wa2_label', $site['wa2_label']) }}" required>
    </div>
    <div class="ad-field">
        <label>WhatsApp 2 — número</label>
        <input type="text" name="wa2_display" value="{{ old('wa2_display', $site['wa2_display']) }}" required>
    </div>
    <div class="ad-field">
        <label>Correo visible</label>
        <input type="email" name="contact_email" value="{{ old('contact_email', $site['contact_email']) }}" required>
    </div>
    <div class="ad-field">
        <label>Dirección</label>
        <input type="text" name="address" value="{{ old('address', $site['address']) }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Enlace de Google Maps</label>
        <input type="url" name="maps_url" value="{{ old('maps_url', $site['maps_url']) }}" required style="max-width:100%;">
    </div>

    <h3 style="margin:28px 0 16px;font-size:16px;">Horarios</h3>
    <div class="ad-field">
        <label>Lunes a viernes</label>
        <input type="text" name="hours_weekdays" value="{{ old('hours_weekdays', $site['hours_weekdays']) }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Sábados</label>
        <input type="text" name="hours_saturday" value="{{ old('hours_saturday', $site['hours_saturday']) }}" required style="max-width:100%;">
    </div>

    <h3 style="margin:28px 0 16px;font-size:16px;">Redes</h3>
    <div class="ad-field">
        <label>Facebook</label>
        <input type="url" name="facebook" value="{{ old('facebook', $site['facebook']) }}" style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Instagram</label>
        <input type="url" name="instagram" value="{{ old('instagram', $site['instagram']) }}" style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>YouTube (opcional)</label>
        <input type="url" name="youtube" value="{{ old('youtube', $site['youtube'] ?? '') }}" style="max-width:100%;" placeholder="https://www.youtube.com/@...">
    </div>
    <div class="ad-field">
        <label>TikTok (opcional)</label>
        <input type="url" name="tiktok" value="{{ old('tiktok', $site['tiktok'] ?? '') }}" style="max-width:100%;" placeholder="https://www.tiktok.com/@...">
        <p style="margin:6px 0 0;font-size:12px;color:#6b8080;">YouTube y TikTok solo aparecen en el sitio si tienen un enlace.</p>
    </div>

    <h3 style="margin:28px 0 16px;font-size:16px;">Pagos y donaciones</h3>
    <div class="ad-field">
        <label>Correo para enviar comprobantes</label>
        <input type="email" name="payments_email" value="{{ old('payments_email', $site['payments_email'] ?? '') }}" required>
    </div>
    @foreach(['qr_pagos' => ['Código QR de pagos', 'assets/img/qr-pagos.jpg'], 'qr_donaciones' => ['Código QR de donaciones', 'assets/img/qr-donaciones.jpg']] as $qrField => [$qrLabel, $qrDefault])
        <div class="ad-field">
            <label>{{ $qrLabel }} (JPG o PNG, máx. 4 MB)</label>
            <p style="margin:0 0 8px;"><img src="{{ setting_image($qrField . '_path', $qrDefault) }}" alt="" style="height:110px;border-radius:8px;border:1px solid #e2ebe9;"></p>
            <input type="file" name="{{ $qrField }}" accept="image/jpeg,image/png,image/webp">
            @if(!empty($site[$qrField . '_path']))
                <label style="margin-top:8px;text-transform:none;font-weight:500;"><input type="checkbox" name="remove_{{ $qrField }}" value="1"> Volver al código original</label>
            @endif
        </div>
    @endforeach

    <h3 style="margin:28px 0 16px;font-size:16px;">Banner de aviso</h3>
    <div class="ad-field">
        <label>Segundos visibles antes de cerrarse solo</label>
        <input type="number" name="banner_seconds" min="5" max="300" value="{{ old('banner_seconds', $site['banner_seconds'] ?? 30) }}" required>
        <p style="margin:6px 0 0;font-size:12px;color:#6b8080;">Mínimo 5, máximo 300. Si el visitante pulsa ×, no vuelve a verlo hasta que cambies el banner.</p>
    </div>

    <h3 style="margin:28px 0 16px;font-size:16px;">Portada (primer slide)</h3>
    <div class="ad-field">
        <label>Antetítulo</label>
        <input type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $site['hero_eyebrow']) }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Título línea 1</label>
        <input type="text" name="hero_line1" value="{{ old('hero_line1', $site['hero_line1']) }}" required>
    </div>
    <div class="ad-field">
        <label>Título línea 2</label>
        <input type="text" name="hero_line2" value="{{ old('hero_line2', $site['hero_line2']) }}" required>
    </div>
    <div class="ad-field">
        <label>Frase destacada</label>
        <input type="text" name="hero_em" value="{{ old('hero_em', $site['hero_em']) }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Descripción</label>
        <textarea name="hero_desc" required>{{ old('hero_desc', $site['hero_desc']) }}</textarea>
    </div>

    <h3 style="margin:28px 0 16px;font-size:16px;">Sección «Nuestros servicios» (inicio)</h3>
    <div class="ad-field">
        <label>Título</label>
        <input type="text" name="services_title" value="{{ old('services_title', $site['services_title'] ?? '') }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Subtítulo</label>
        <input type="text" name="services_subtitle" value="{{ old('services_subtitle', $site['services_subtitle'] ?? '') }}" style="max-width:100%;">
        <p style="margin:6px 0 0;font-size:12px;color:#6b8080;">Las tarjetas se editan en <a href="{{ route('admin.homeServices.index') }}">Servicios del inicio</a>.</p>
    </div>

    <h3 style="margin:28px 0 16px;font-size:16px;">Llamado final del inicio</h3>
    <div class="ad-field">
        <label>Título</label>
        <input type="text" name="cta_title" value="{{ old('cta_title', $site['cta_title'] ?? '') }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Texto</label>
        <input type="text" name="cta_desc" value="{{ old('cta_desc', $site['cta_desc'] ?? '') }}" style="max-width:100%;">
    </div>

    <button class="ad-btn ad-btn-primary" type="submit">Guardar cambios</button>
</form>
@include('admin.partials.live-preview', [
    'form' => '#settingsForm',
    'url' => route('admin.preview.settings'),
    'targets' => ['.hero-section'],
    'fieldTargets' => [
        'hero_' => '.hero-section',
        'services_' => '#services',
        'cta_' => '.cta-banner',
        'qr_' => '@qr',
        'remove_qr_' => '@qr',
        'payments_email' => '@qr',
        'banner_seconds' => '.hero-section',
        '*' => 'footer',
    ],
    'note' => 'Al hacer clic en un campo, la vista previa lo muestra en su lugar. Nada se publica hasta pulsar «Guardar cambios».',
])
</div>
@endsection
