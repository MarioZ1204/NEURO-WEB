<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') · INNAR</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/LOGO2.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #4a6b68;
            --primary-dark: #2e4a47;
            --primary-light: #7fa8a4;
            --primary-pale: #c8dedd;
            --primary-ultra: #eef5f4;
            --accent: #e8f0ef;
            --dark: #0f1f1e;
            --text: #2c3e3d;
            --text-light: #6b8080;
            --sidebar: #1a2e2c;
        }
        * { box-sizing: border-box; }
        html, body { margin: 0; min-height: 100%; }
        body { font-family: 'Poppins', sans-serif; background: #f3f6f5; color: var(--dark); }
        a { color: var(--primary); }
        .ad-shell { display: flex; min-height: 100vh; }
        .ad-sidebar {
            width: 250px; flex-shrink: 0; background: var(--sidebar); color: #fff;
            padding: 22px 0 16px; display: flex; flex-direction: column;
        }
        .ad-brand {
            display: flex; align-items: center; gap: 10px;
            padding: 0 18px 18px; border-bottom: 1px solid rgba(255,255,255,.08); margin-bottom: 8px;
        }
        .ad-brand img { height: 36px; width: auto; }
        .ad-brand span { font-size: 11px; letter-spacing: .1em; text-transform: uppercase; color: #9fb8b5; font-weight: 700; }
        .ad-nav { flex: 1; }
        .ad-nav a {
            display: flex; align-items: center; gap: 10px;
            color: #d7e6e4; text-decoration: none; padding: 9px 18px; font-size: 13.5px; font-weight: 500;
        }
        .ad-nav a i { width: 18px; text-align: center; opacity: .85; }
        .ad-nav a:hover, .ad-nav a.is-active { background: rgba(255,255,255,.1); color: #fff; }
        .ad-nav a.is-active { box-shadow: inset 3px 0 0 #e8b84a; }
        .ad-nav-label { padding: 16px 18px 6px; font-size: 10px; letter-spacing: .14em; text-transform: uppercase; color: #7a9693; font-weight: 700; }
        .ad-badge { background: #e8b84a; color: #1a2e2c; border-radius: 99px; padding: 1px 7px; font-size: 11px; font-weight: 700; margin-left: auto; }
        .ad-main { flex: 1; padding: 28px 32px 40px; min-width: 0; }
        .ad-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; flex-wrap: wrap; margin-bottom: 8px; }
        .ad-top h1 { margin: 0 0 6px; font-size: 24px; font-weight: 800; color: var(--dark); }
        .ad-top p { margin: 0 0 18px; color: var(--text-light); font-size: 14px; }
        .ad-alert { padding: 12px 14px; border-radius: 8px; margin-bottom: 16px; }
        .ad-alert.ok { background: #e7f6ee; color: #146c43; }
        .ad-alert.err { background: #fdecec; color: #9b1c1c; }
        .ad-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 12px; margin-bottom: 22px; }
        .ad-stat { background: #fff; border-radius: 12px; padding: 16px; text-decoration: none; color: inherit; box-shadow: 0 4px 16px rgba(0,0,0,.06); }
        .ad-stat:hover { transform: translateY(-1px); color: inherit; }
        .ad-stat .k { font-size: 11px; text-transform: uppercase; color: var(--text-light); letter-spacing: .04em; font-weight: 600; }
        .ad-stat .n { font-size: 28px; font-weight: 800; margin-top: 4px; color: var(--primary-dark); }
        .ad-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,.06); overflow: hidden; }
        .ad-card-pad { padding: 18px; }
        .ad-table { width: 100%; border-collapse: collapse; }
        .ad-table th, .ad-table td { text-align: left; padding: 12px; border-bottom: 1px solid #e2ebe9; font-size: 14px; }
        .ad-table th { background: #f8fbfa; font-size: 11px; text-transform: uppercase; color: var(--text-light); letter-spacing: .04em; }
        .ad-pill { display: inline-block; padding: 3px 10px; border-radius: 99px; font-size: 11px; font-weight: 700; background: #fff4d6; color: #8a6d12; }
        .ad-pill.is-progress { background: #e7f0ff; color: #1d4f9c; }
        .ad-pill.is-done { background: #e7f6ee; color: #146c43; }
        .ad-pill.is-discarded { background: #f1f1f1; color: #666; }
        .ad-btn { display: inline-flex; align-items: center; gap: 6px; border-radius: 8px; padding: 8px 14px; font-size: 13px; font-weight: 700; text-decoration: none; border: 0; cursor: pointer; font-family: inherit; }
        .ad-btn-primary { background: var(--primary); color: #fff; }
        .ad-btn-primary:hover { color: #fff; opacity: .92; }
        .ad-btn-ghost { background: #eef3f2; color: #2e4a47; }
        .ad-btn-ghost:hover { color: #2e4a47; }
        .ad-btn-wa { background: #25d366; color: #fff; }
        .ad-btn-wa:hover { color: #fff; }
        .ad-btn-call { background: #1455a0; color: #fff; }
        .ad-btn-call:hover { color: #fff; }
        .ad-filters { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 16px; }
        .ad-filters input, .ad-filters select, .ad-field input, .ad-field select, .ad-field textarea {
            border: 1px solid #d5e2df; border-radius: 8px; padding: 10px 12px; font-size: 14px; font-family: inherit;
        }
        .ad-field { margin-bottom: 14px; }
        .ad-field label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 6px; color: var(--text-light); text-transform: uppercase; letter-spacing: .04em; }
        .ad-field select, .ad-field input { width: 100%; max-width: 420px; }
        .ad-field textarea { width: 100%; min-height: 110px; }
        .ad-empty { padding: 32px; text-align: center; color: var(--text-light); }
        .ad-logout {
            width: calc(100% - 36px); margin: 16px 18px 0; background: rgba(255,255,255,.1); color: #fff;
            border: 0; padding: 10px; border-radius: 8px; cursor: pointer; font-family: inherit; font-weight: 600;
        }
        .ad-logout:hover { background: rgba(255,255,255,.16); }
        .pagination { justify-content: center; margin: 0; }
        .page-link { color: var(--primary); }
        .page-item.active .page-link { background: var(--primary); border-color: var(--primary); }
        .ad-main > div[style] {
            min-height: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }
        .ad-split { display: grid; grid-template-columns: minmax(340px, 1fr) minmax(420px, 1.35fr); gap: 20px; align-items: start; }
        .ad-split > form { min-width: 0; }
        .lp { position: sticky; top: 16px; background: #fff; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,.06); overflow: hidden; }
        .lp-bar { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-bottom: 1px solid #e2ebe9; flex-wrap: wrap; }
        .lp-title { font-size: 13px; font-weight: 700; color: var(--primary-dark); display: flex; align-items: center; gap: 8px; }
        .lp-dot { width: 9px; height: 9px; border-radius: 50%; background: #9fb8b5; display: inline-block; }
        .lp[data-state="loading"] .lp-dot { background: #e8b84a; animation: lpPulse 1s infinite; }
        .lp[data-state="ok"] .lp-dot { background: #22a06b; }
        .lp[data-state="error"] .lp-dot { background: #d64545; }
        .lp-status { font-size: 12px; color: var(--text-light); }
        .lp-actions { margin-left: auto; display: flex; gap: 6px; }
        .lp-btn { border: 1px solid #d5e2df; background: #fff; color: #2e4a47; border-radius: 7px; padding: 5px 9px; font-size: 12px; cursor: pointer; font-family: inherit; }
        .lp-btn.is-on { background: var(--primary); border-color: var(--primary); color: #fff; }
        .lp-viewport { position: relative; height: calc(100vh - 120px); min-height: 460px; overflow: hidden; background: #e9efee; }
        .lp-frame { position: absolute; top: 0; left: 0; border: 0; background: #fff; transform-origin: 0 0; transition: opacity .18s ease; }
        .lp-frame.is-loading { opacity: 0; pointer-events: none; }
        .lp-note { font-size: 11.5px; color: var(--text-light); padding: 8px 12px; border-top: 1px solid #e2ebe9; background: #fbfdfc; }
        .lp-empty { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; color: var(--text-light); font-size: 13px; text-align: center; padding: 20px; }
        @keyframes lpPulse { 50% { opacity: .35; } }
        @media (max-width: 1200px) {
            .ad-split { grid-template-columns: 1fr; }
            .lp { position: relative; top: 0; }
            .lp-viewport { height: 70vh; }
        }
        @media (max-width: 900px) {
            .ad-shell { display: block; }
            .ad-sidebar { width: 100%; height: auto; }
            .ad-nav { display: grid; grid-template-columns: 1fr 1fr; }
            .ad-nav-label, .ad-brand { grid-column: 1 / -1; }
            .ad-main { padding: 20px 16px 32px; }
        }
    </style>
</head>
<body>
@php
    $counts = isset($adminCounts) && is_array($adminCounts) ? $adminCounts : ['citas'=>0,'mensajes'=>0,'jobs'=>0,'internships'=>0,'convenios'=>0];
    $path = (string) request()->path();
    $is = function ($prefix) use ($path) {
        return $path === $prefix || strpos($path, $prefix . '/') === 0 || strpos($path, $prefix) === 0;
    };
@endphp
<div class="ad-shell">
    <aside class="ad-sidebar">
        <div class="ad-brand">
            <img src="{{ asset('assets/img/LOGO2.png') }}" alt="INNAR">
            <span>Panel INNAR</span>
        </div>
        <nav class="ad-nav">
            <div class="ad-nav-label">Inicio</div>
            <a class="{{ $path === 'admin/dashboard' || $path === 'admin' ? 'is-active' : '' }}" href="{{ url('/admin/dashboard') }}"><i class="fa fa-th-large"></i> Resumen</a>
            <div class="ad-nav-label">Bandeja</div>
            <a class="{{ $is('admin/citas') ? 'is-active' : '' }}" href="{{ url('/admin/citas') }}"><i class="fa fa-calendar"></i> Citas @if(!empty($counts['citas']))<span class="ad-badge">{{ $counts['citas'] }}</span>@endif</a>
            <a class="{{ $is('admin/mensajes') ? 'is-active' : '' }}" href="{{ url('/admin/mensajes') }}"><i class="fa fa-envelope"></i> Mensajes @if(!empty($counts['mensajes']))<span class="ad-badge">{{ $counts['mensajes'] }}</span>@endif</a>
            <a class="{{ $is('admin/job-applications') ? 'is-active' : '' }}" href="{{ url('/admin/job-applications') }}"><i class="fa fa-id-card"></i> Hojas de vida @if(!empty($counts['jobs']))<span class="ad-badge">{{ $counts['jobs'] }}</span>@endif</a>
            <a class="{{ $is('admin/internships') ? 'is-active' : '' }}" href="{{ url('/admin/internships') }}"><i class="fa fa-user-graduate"></i> Prácticas @if(!empty($counts['internships']))<span class="ad-badge">{{ $counts['internships'] }}</span>@endif</a>
            <a class="{{ $is('admin/convenios') ? 'is-active' : '' }}" href="{{ url('/admin/convenios') }}"><i class="fa fa-handshake"></i> Convenios @if(!empty($counts['convenios']))<span class="ad-badge">{{ $counts['convenios'] }}</span>@endif</a>
            <div class="ad-nav-label">Contenido</div>
            <a class="{{ $is('admin/ajustes') ? 'is-active' : '' }}" href="{{ url('/admin/ajustes') }}"><i class="fa fa-sliders"></i> Ajustes del sitio</a>
            <a class="{{ $is('admin/servicios-inicio') ? 'is-active' : '' }}" href="{{ url('/admin/servicios-inicio') }}"><i class="fa fa-grip"></i> Servicios del inicio</a>
            <a class="{{ $is('admin/equipo') ? 'is-active' : '' }}" href="{{ url('/admin/equipo') }}"><i class="fa fa-user-md"></i> Equipo médico</a>
            <a class="{{ $is('admin/testimonials') ? 'is-active' : '' }}" href="{{ url('/admin/testimonials') }}"><i class="fa fa-star"></i> Testimonios</a>
            <a class="{{ $is('admin/banners') ? 'is-active' : '' }}" href="{{ url('/admin/banners') }}"><i class="fa fa-image"></i> Banners</a>
            <a class="{{ $is('admin/media') ? 'is-active' : '' }}" href="{{ url('/admin/media') }}"><i class="fa fa-images"></i> Multimedia</a>
            <a class="{{ $is('admin/uploads') ? 'is-active' : '' }}" href="{{ url('/admin/uploads') }}"><i class="fa fa-folder"></i> Archivos</a>
            <a href="{{ url('/') }}" target="_blank" rel="noopener"><i class="fa fa-external-link"></i> Ver sitio</a>
        </nav>
        <form action="{{ url('/admin/logout') }}" method="POST">
            @csrf
            <button class="ad-logout" type="submit"><i class="fa fa-right-from-bracket"></i> Cerrar sesión</button>
        </form>
    </aside>
    <main class="ad-main">
        @if(session('success'))
            <div class="ad-alert ok">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="ad-alert err">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</div>
<script>
document.addEventListener('change', function (e) {
    var input = e.target;
    if (!input || input.type !== 'file') return;
    var box = input.nextElementSibling && input.nextElementSibling.classList && input.nextElementSibling.classList.contains('ad-file-preview')
        ? input.nextElementSibling
        : null;
    if (!box) {
        box = document.createElement('div');
        box.className = 'ad-file-preview';
        box.style.marginTop = '10px';
        input.insertAdjacentElement('afterend', box);
    }
    if (box.dataset.url) URL.revokeObjectURL(box.dataset.url);
    box.innerHTML = '';
    var file = input.files && input.files[0];
    if (!file) return;
    var url = URL.createObjectURL(file);
    box.dataset.url = url;
    if (file.type.indexOf('image/') === 0) {
        box.innerHTML = '<img alt="" style="max-height:160px;max-width:100%;border-radius:8px;border:1px solid #e2ebe9;">';
        box.firstChild.src = url;
    } else if (file.type === 'application/pdf') {
        box.innerHTML = '<iframe title="Vista previa del PDF" style="width:100%;height:260px;border:1px solid #e2ebe9;border-radius:8px;"></iframe>';
        box.firstChild.src = url;
    } else {
        box.textContent = 'Archivo elegido: ' + file.name;
        box.style.fontSize = '12px';
        box.style.color = '#6b8080';
    }
});
</script>
</body>
</html>
