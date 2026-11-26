<!DOCTYPE html>
<html lang="es" class="{{ empty($adminPreview) ? 'splash-pending ' : 'admin-preview ' }}js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        html, body { margin: 0; background: #4a6b68; }
        html.splash-pending, html.splash-pending body {
            overflow: hidden !important;
            background: #4a6b68 !important;
        }
        html.splash-pending #site-root {
            display: none !important;
        }
        #splash-screen {
            position: fixed !important;
            top: 0 !important; left: 0 !important; right: 0 !important; bottom: 0 !important;
            z-index: 2147483647 !important;
            visibility: visible !important;
        }
    </style>
    <noscript>
        <style>
            #splash-screen { display: none !important; }
            html.splash-pending, html.splash-pending body { overflow: auto !important; background: #fff !important; }
            html.splash-pending #site-root { display: block !important; }
        </style>
    </noscript>
    @if(!empty($adminPreview))
        <meta name="robots" content="noindex, nofollow">
        <script>window.__INNAR_PREVIEW = true;</script>
        <style>
            html.admin-preview, html.admin-preview body { overflow-x: hidden; background: #fff; }
            html.admin-preview { scroll-behavior: auto !important; }
            html.admin-preview .fade-up,
            html.admin-preview .service-card { opacity: 1 !important; transform: none !important; transition: none !important; }
            html.admin-preview [data-preview-focus] { outline: 3px dashed #e8b84a; outline-offset: 6px; border-radius: 12px; }
        </style>
    @endif
    <link rel="preload" as="image" href="{{ asset('assets/img/LOGO.png') }}" fetchpriority="high">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Instituto Neurociencias de Nariño IPS S.A.S - Atención especializada en neurología, epileptología y neurorehabilitación en Pasto, Nariño.')">
    <meta name="author" content="Instituto Neurociencias de Nariño">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <!-- Open Graph / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Instituto Neurociencias de Nariño IPS S.A.S">
    <meta property="og:title" content="@yield('og_title', 'Instituto Neurociencias de Nariño IPS S.A.S')">
    <meta property="og:description" content="@yield('meta_description', 'Atención especializada en neurología, epileptología y neurorehabilitación en Pasto, Nariño. Más de 8 años cuidándote.')">
    <meta property="og:image" content="{{ asset('assets/img/LOGO.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" href="{{ url('/favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/LOGO2.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/LOGO2.png') }}">
    <meta name="theme-color" content="#4a6b68">

    <title>Instituto Neurociencias de Nariño | @yield('title')</title>
</head>
@if(empty($adminPreview))
<body class="splash-active" style="margin:0;background:#4a6b68;overflow:hidden">

    @include('components.splash-screen')
@else
<body style="margin:0">
@endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

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
            --white: #ffffff;
            --navbar-h: 80px;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; color: var(--text); background: var(--white); }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--primary-ultra); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 3px; }

        /* ===== NAVBAR ===== */
        .neuro-navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            height: var(--navbar-h);
            display: flex;
            align-items: center;
            padding: 0 40px;
            transition: all 0.4s ease;
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 1px 0 rgba(0,0,0,0.06), 0 4px 20px rgba(74,107,104,0.08);
        }
        .neuro-navbar.scrolled {
            height: 68px;
            box-shadow: 0 2px 30px rgba(74,107,104,0.15);
        }
        .neuro-navbar .navbar-brand img {
            height: 54px;
            transition: height 0.3s;
        }
        .neuro-navbar.scrolled .navbar-brand img { height: 44px; }
        .neuro-navbar .nav-items {
            display: flex; align-items: center; gap: 2px;
            flex: 1; justify-content: center;
        }
        .neuro-navbar .nav-item-drop { position: relative; }
        .neuro-navbar .nav-link-custom {
            font-size: 11px;
            font-weight: 700;
            color: var(--text);
            text-decoration: none;
            padding: 10px 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: flex; align-items: center; gap: 5px;
            border-radius: 6px;
            transition: color 0.25s, background 0.25s;
            white-space: nowrap;
            position: relative;
        }
        .neuro-navbar .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: 4px; left: 14px; right: 14px;
            height: 2px;
            background: var(--primary);
            border-radius: 2px;
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: left;
        }
        .neuro-navbar .nav-link-custom:hover { color: var(--primary); }
        .neuro-navbar .nav-link-custom:hover::after { transform: scaleX(1); }
        .neuro-navbar .nav-link-custom .arrow {
            font-size: 8px;
            transition: transform 0.25s;
            opacity: 0.6;
        }
        .neuro-navbar .nav-item-drop:hover .arrow { transform: rotate(180deg); opacity: 1; }
        .neuro-navbar .dropdown-menu-custom {
            display: none;
            position: absolute;
            top: calc(100% + 12px); left: 50%;
            transform: translateX(-50%);
            background: var(--white);
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
            border-radius: 12px;
            min-width: 230px;
            padding: 10px 0;
            z-index: 200;
            border-top: 3px solid var(--primary);
        }
        .neuro-navbar .nav-item-drop.open .dropdown-menu-custom { display: block; }
        .neuro-navbar .nav-item-drop.open .arrow { transform: rotate(180deg); opacity: 1; }
        .neuro-navbar .nav-item-drop.open .nav-link-custom { color: var(--primary); }
        @media (hover: hover) and (pointer: fine) {
            .neuro-navbar .nav-item-drop:hover .dropdown-menu-custom { display: block; }
            .neuro-navbar .nav-item-drop:hover .arrow { transform: rotate(180deg); opacity: 1; }
        }
        /* Bridge the hover gap: invisible extension fills space between trigger and panel */
        .neuro-navbar .dropdown-menu-custom::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 0; right: 0;
            height: 14px;
        }
        .neuro-navbar .dropdown-menu-custom a {
            display: flex; align-items: center; gap: 10px;
            padding: 11px 22px;
            font-size: 12px;
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s, color 0.2s, padding 0.2s;
        }
        .neuro-navbar .dropdown-menu-custom a::before {
            content: '';
            width: 5px; height: 5px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.2s;
            flex-shrink: 0;
        }
        .neuro-navbar .dropdown-menu-custom a:hover {
            background: var(--primary-ultra);
            color: var(--primary-dark);
            padding-left: 28px;
        }
        .neuro-navbar .dropdown-menu-custom a:hover::before { opacity: 1; }
        .neuro-navbar .nav-cta { display: flex; gap: 10px; align-items: center; }

        /* ===== GLOBAL BUTTONS ===== */
        .btn-cta-outline {
            border: 1.5px solid var(--primary);
            color: var(--primary);
            background: rgba(74,107,104,0.06);
            padding: 10px 24px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.8px;
            border-radius: 999px;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.26s ease;
            cursor: pointer;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
        }
        .btn-cta-outline::before {
            content: '';
            position: absolute; inset: 0;
            background: var(--primary);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
            z-index: -1;
        }
        .btn-cta-outline:hover { color: #fff; border-color: var(--primary); }
        .btn-cta-outline:hover::before { transform: scaleX(1); transform-origin: left; }

        .btn-cta-solid {
            border: none;
            color: #ffffff;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 10px 26px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.8px;
            border-radius: 999px;
            text-decoration: none;
            text-transform: uppercase;
            transition: transform 0.25s ease, box-shadow 0.25s ease, filter 0.25s ease;
            cursor: pointer;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 28px rgba(74,107,104,0.16);
        }
        .btn-cta-solid:hover {
            filter: brightness(1.05);
            transform: translateY(-1px);
            box-shadow: 0 18px 34px rgba(74,107,104,0.22);
        }

        /* ===== WHITE LARGE BUTTON (used in hero / CTAs) ===== */
        .btn-white-lg {
            background: #fff;
            color: var(--primary-dark);
            border: 1px solid rgba(46,74,71,0.06);
            padding: 10px 18px;
            font-weight: 800;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(46,74,71,0.06);
            display: inline-flex; align-items: center; gap:10px;
            text-decoration: none; cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }
        .btn-white-lg:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(46,74,71,0.10); }
        .btn-white-lg:active { transform: translateY(0); }
        .btn-white-lg i { font-size: 15px; color: var(--primary); }

        /* ===== PAGE SHELL (especialidades / servicios) ===== */
        .page-hero {
            padding: 80px 0 60px;
            text-align: center;
            color: #fff;
        }
        .page-cta-bar {
            margin-top: 48px;
            padding: 36px 0;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 18px;
        }
        /* Foto lateral en consultas: no estirar con el texto */
        .consulta-proc-row {
            display: flex;
            gap: 28px;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .consulta-proc-copy { flex: 1 1 280px; min-width: 0; }
        .consulta-side-photo {
            flex: 0 0 min(300px, 34%);
            max-width: 300px;
            width: 100%;
            align-self: flex-start;
            position: sticky;
            top: calc(var(--navbar-h, 80px) + 20px);
        }
        .consulta-side-photo__frame {
            border-radius: 14px;
            overflow: hidden;
            background: #e8efee;
            aspect-ratio: 4 / 5;
            max-height: 360px;
            box-shadow: 0 10px 28px rgba(15, 31, 30, 0.1);
        }
        .consulta-side-photo__frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        .consulta-side-photo__caption {
            margin: 10px 0 0;
            font-size: 12px;
            color: #888;
            line-height: 1.45;
        }
        .consulta-side-photo__panel {
            border-radius: 14px;
            padding: 28px 22px;
            background: linear-gradient(160deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            box-shadow: 0 10px 28px rgba(15, 31, 30, 0.12);
            min-height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 12px;
        }
        .consulta-side-photo__icon {
            width: 48px; height: 48px; border-radius: 12px;
            background: rgba(255,255,255,0.16);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }
        .consulta-side-photo__panel h4 {
            margin: 0; font-size: 16px; font-weight: 800; color: #fff;
        }
        .consulta-side-photo__panel p {
            margin: 0; font-size: 13px; line-height: 1.65;
            color: rgba(255,255,255,0.88);
        }
        .consulta-side-photo--inline {
            position: static;
            max-width: 100%;
            flex: none;
            width: 100%;
        }
        .consulta-side-photo--inline .consulta-side-photo__frame {
            max-height: 340px;
        }
        @media (max-width: 991px) {
            .consulta-side-photo {
                flex: 1 1 100%;
                max-width: 420px;
                margin: 0 auto;
                position: static;
                order: -1;
            }
            .consulta-side-photo__frame {
                aspect-ratio: 16 / 10;
                max-height: 220px;
            }
            .consulta-side-photo--inline .consulta-side-photo__frame {
                aspect-ratio: 4 / 5;
                max-height: 300px;
            }
        }
        .page-cta-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }
        .page-cta-copy h3 {
            margin: 0 0 6px;
            color: #fff;
            font-size: clamp(18px, 2.4vw, 26px);
            font-weight: 800;
        }
        .page-cta-copy p {
            margin: 0;
            color: rgba(255,255,255,0.82);
            font-size: 14px;
            max-width: 520px;
            line-height: 1.55;
        }
        .page-cta-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }
        .page-cta-actions .btn-cta-solid {
            background: #fff;
            color: var(--primary-dark);
            box-shadow: 0 10px 24px rgba(0,0,0,0.12);
        }
        .page-cta-actions .btn-cta-solid:hover { filter: none; color: var(--primary); }
        .page-cta-actions .page-cta-secondary {
            border-color: rgba(255,255,255,0.55);
            color: #fff;
            background: rgba(255,255,255,0.08);
        }
        .page-cta-actions .page-cta-secondary:hover { color: #fff; border-color: #fff; }
        .page-cta-actions .page-cta-secondary::before { background: rgba(255,255,255,0.16); }
        @media (max-width: 768px) {
            .page-hero { padding: 56px 0 40px !important; }
            .page-cta-bar { margin-top: 36px; padding: 28px 18px; border-radius: 14px; }
            .page-cta-actions { width: 100%; }
            .page-cta-actions .btn-cta-solid,
            .page-cta-actions .page-cta-secondary { flex: 1 1 100%; text-align: center; justify-content: center; }
        }

        /* Dropdown appearance tweaks for compact contact menus */
        .dropdown-menu.p-2 {
            border-radius: 12px;
            box-shadow: 0 14px 40px rgba(15,31,30,0.12);
            padding: 8px;
            min-width: 220px; /* fallback */
        }
        .dropdown-item {
            padding: 10px 12px;
            border-radius: 8px;
            display:flex; align-items:center; gap:10px;
            color: var(--text);
            font-weight:600;
        }
        .dropdown-item:hover { background: var(--primary-ultra); color: var(--primary-dark); }
        .dropdown-item i { width:20px; text-align:center; color:var(--primary); }
        .btn-white-lg.dropdown-toggle::after { display:none; }

        /* ===== MOBILE HAMBURGER ===== */
        .neuro-hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
            padding: 5px;
            margin-left: auto;
        }
        .neuro-hamburger span {
            display: block; width: 24px; height: 2.5px;
            background: var(--primary); border-radius: 2px;
            transition: all 0.35s;
        }
        .neuro-hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .neuro-hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .neuro-hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

        .mobile-menu {
            display: none;
            position: fixed;
            top: var(--navbar-h); left: 0; right: 0;
            background: var(--white);
            z-index: 999;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 0;
            max-height: calc(100vh - var(--navbar-h));
            overflow-y: auto;
            transition: top 0.3s ease, max-height 0.3s ease;
        }
        .mobile-menu.open { display: block; animation: slideDown 0.3s ease; }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        .mobile-menu a {
            display: block;
            padding: 14px 28px;
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border-bottom: 1px solid var(--primary-ultra);
            transition: background 0.2s, color 0.2s;
        }
        .mobile-menu a:hover { background: var(--primary-ultra); color: var(--primary); }
        .mobile-menu a.sub { padding-left: 44px; font-weight: 400; font-size: 12px; color: var(--primary); text-transform: none; letter-spacing: 0; }
        .mobile-menu .cta-group { margin: 18px 22px; display: flex; flex-direction: column; gap: 10px; }

        /* ===== SOCIAL SIDEBAR ===== */
        .social-sidebar {
            position: fixed;
            right: 0; top: 50%;
            transform: translateY(-50%);
            z-index: 500;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
        }
        .social-sidebar-label {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            font-size: 9px;
            letter-spacing: 2.5px;
            color: var(--primary);
            font-weight: 700;
            text-transform: uppercase;
            padding: 12px 8px;
            background: var(--primary-ultra);
            border-left: 2px solid var(--primary-pale);
        }
        .social-sidebar a {
            display: flex; align-items: center; justify-content: center;
            width: 38px; height: 38px;
            background: var(--white);
            border-left: 2px solid var(--primary-pale);
            color: var(--primary);
            font-size: 13px;
            transition: all 0.25s;
            text-decoration: none;
        }
        .social-sidebar a:hover {
            background: var(--primary);
            color: #fff;
            width: 44px;
        }

        /* ===== SCROLL ANIMATIONS ===== */
        html.js .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        html.js .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .fade-up:nth-child(2) { transition-delay: 0.1s; }
        .fade-up:nth-child(3) { transition-delay: 0.2s; }
        .fade-up:nth-child(4) { transition-delay: 0.3s; }
        @media (prefers-reduced-motion: reduce) {
            html.js .fade-up {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        @media (max-width: 992px) {
            .neuro-navbar .nav-items { display: none; }
            .neuro-navbar .nav-cta { display: none; }
            .neuro-hamburger { display: flex; }
            .social-sidebar { display: none; }
        }
        @media (max-width: 576px) {
            .neuro-navbar { padding: 0 15px; }
        }

        /* ===== NAV SPACING (5 items) ===== */
        .neuro-navbar { padding: 0 20px; }
        .neuro-navbar .nav-items { gap: 0; }
        .neuro-navbar .nav-link-custom { font-size: 10.5px; padding: 10px 9px; letter-spacing: 0.5px; }
        .neuro-navbar .nav-cta .btn-cta-outline,
        .neuro-navbar .nav-cta .btn-cta-solid { padding: 8px 14px; font-size: 10.5px; }

        /* ===== 2/3-COLUMN DROPDOWN ===== */
        .dropdown-menu-custom.drop-2col { min-width: 470px; padding: 0; }
        .dropdown-menu-custom.drop-3col { min-width: 720px; padding: 0; }
        .neuro-navbar .nav-item-drop:hover .dropdown-menu-custom.drop-2col,
        .neuro-navbar .nav-item-drop:hover .dropdown-menu-custom.drop-3col { display: flex; }
        .drop-2col .drop-col,
        .drop-3col .drop-col { flex: 1; padding: 10px 0; min-width: 0; }
        .drop-2col .drop-col-title,
        .drop-3col .drop-col-title {
            padding: 12px 20px 8px;
            font-size: 9.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--primary);
            border-bottom: 1px solid var(--primary-ultra);
            margin-bottom: 4px;
        }
        .drop-2col .drop-col + .drop-col,
        .drop-3col .drop-col + .drop-col { border-left: 1px solid var(--primary-ultra); }
        @media (max-width: 900px) {
            .dropdown-menu-custom.drop-3col { min-width: 540px; }
        }

        /* ===== CONTACT DROPDOWN ===== */
        .dropdown-menu-custom.drop-contact { min-width: 295px; }
        .neuro-navbar .dropdown-menu-custom.drop-contact a {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 11px 18px;
        }
        .neuro-navbar .dropdown-menu-custom.drop-contact a::before { display: none; }
        .neuro-navbar .dropdown-menu-custom.drop-contact a:hover { padding-left: 18px; }
        .drop-contact .ci-icon {
            flex-shrink: 0;
            width: 32px; height: 32px;
            background: var(--primary-ultra);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: var(--primary);
            font-size: 13px;
            transition: background 0.2s, color 0.2s;
        }
        .neuro-navbar .dropdown-menu-custom.drop-contact a:hover .ci-icon { background: var(--primary); color: #fff; }
        .drop-contact .ci-label {
            display: block;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--primary-light);
            font-weight: 700;
            margin-bottom: 2px;
        }
        .drop-contact .ci-val { font-size: 12px; color: var(--text); font-weight: 500; display: block; }

        /* ===== RIGHT-ALIGNED DROPDOWN ===== */
        .dropdown-menu-custom.drop-right {
            left: auto !important;
            right: 0 !important;
            transform: none !important;
        }

        /* ===== MOBILE SECTION HEADERS ===== */
        .mobile-menu .mob-section {
            display: block;
            padding: 10px 28px 6px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--primary);
            background: var(--primary-ultra);
            border-bottom: 1px solid var(--primary-pale);
        }
        .mobile-menu .mob-contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 28px;
            color: var(--text);
            text-decoration: none;
            font-size: 12px;
            font-weight: 400;
            border-bottom: 1px solid var(--primary-ultra);
            transition: background 0.2s;
        }
        .mobile-menu .mob-contact-item:hover { background: var(--primary-ultra); color: var(--primary); }
        .mobile-menu .mob-contact-item i { color: var(--primary); width: 16px; text-align: center; flex-shrink: 0; }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div id="site-root">
    <!-- ===== NAVBAR ===== -->
    <nav class="neuro-navbar">
        <a href="{{ route('landing.inicio') }}" class="navbar-brand me-4">
            <img src="{{ asset('assets/img/LOGO.png') }}" alt="Instituto Neurociencias de Nariño">
        </a>

        <div class="nav-items">
        
            {{-- Nuestra Institución --}}
            <div class="nav-item-drop">
                <a href="{{ route('landing.aboutUs') }}" class="nav-link-custom">
                    Nuestra Institución <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom">
                    <a href="{{ route('landing.aboutUs') }}">Acerca de Nosotros</a>
                    <a href="{{ route('articulos') }}">Artículos y Revistas</a>
                    <a href="{{ route('marcoLegal') }}">Marco Legal</a>
                    <a href="{{ route('landing.portafolio') }}">Portafolio de Servicios</a>
                </div>
            </div>
        
            {{-- Servicios Especializados (3 columnas) --}}
            <div class="nav-item-drop">
                <a href="{{ route('especialidades') }}" class="nav-link-custom">
                    Servicios Especializados <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom drop-3col">
                    <div class="drop-col">
                        <div class="drop-col-title">Consulta Especializada</div>
                        <a href="{{ route('consulta.neurologia') }}">Neurología</a>
                        <a href="{{ route('consulta.epileptologia') }}">Epileptología</a>
                        <a href="{{ route('servicios.clinicaSueno') }}">Somnología</a>
                        <a href="{{ route('consulta.oftalmologia') }}">Oftalmología</a>
                        <a href="{{ route('consulta.oftalmologiaPediatrica') }}">Oftalmología Pediátrica</a>
                        <a href="{{ route('consulta.terapiaFisica') }}">Terapia Física</a>
                        <a href="{{ route('consulta.terapiaOcupacional') }}">Terapia Ocupacional</a>
                        <a href="{{ route('consulta.fonoaudiologia') }}">Fonoaudiología</a>
                        <a href="{{ route('consulta.psiquiatria') }}">Psiquiatría</a>
                        <a href="{{ route('consulta.psicologia') }}">Psicología</a>
                        <a href="{{ route('consulta.neuropsicologia') }}">Neuropsicología</a>
                    </div>
                    <div class="drop-col">
                        <div class="drop-col-title">Ayudas Diagnósticas</div>
                        <a href="{{ route('landing.electrodiagnosticos') }}">Electroencefalograma</a>
                        <a href="{{ route('landing.electrodiagnosticos') }}">Videotelemetría (VTM)</a>
                        <a href="{{ route('servicios.clinicaSueno') }}">Polisomnografía</a>
                        <a href="{{ route('landing.electrodiagnosticos') }}">Unidad de Electrodiagnóstico</a>
                    </div>
                    <div class="drop-col">
                        <div class="drop-col-title">Servicios Complementarios</div>
                        <a href="{{ route('servicios.clinicaSueno') }}">Clínica del Sueño</a>
                        <a href="{{ route('consulta.medicinaGeneral') }}">Medicina General</a>
                        <a href="{{ route('landing.tiposTerapia') }}">Unidad de Terapia Física</a>
                        <a href="{{ route('consulta.fonoaudiologia') }}">Unidad de Fonoaudiología</a>
                        <a href="{{ route('consulta.terapiaOcupacional') }}">Unidad de Terapia Ocupacional</a>
                    </div>
                </div>
            </div>
        
            {{-- Educación al Paciente --}}
            <div class="nav-item-drop">
                <a href="{{ route('educacion.polisBasal') }}" class="nav-link-custom">
                    Educación al Paciente <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom">
                    <a href="{{ route('educacion.polisBasal') }}">Preparación para Polisomnografía Basal</a>
                    <a href="{{ route('educacion.polisomnografia') }}">Preparación para Polisomnografía</a>
                    <a href="{{ route('educacion.saludSueno') }}">Evalúe su Salud del Sueño</a>
                </div>
            </div>
        
            {{-- Trabaje con Nosotros --}}
            <div class="nav-item-drop">
                <a href="{{ route('trabaje.hojaDeVida') }}" class="nav-link-custom">
                    Trabaje con Nosotros <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom">
                    <a href="{{ route('trabaje.hojaDeVida') }}">Postule su Hoja de Vida</a>
                    <a href="{{ route('trabaje.convenio') }}">Postule su Convenio Interinstitucional</a>
                    <a href="{{ route('trabaje.practicas') }}">Realice sus Prácticas</a>
                </div>
            </div>
        
            {{-- Contacto --}}
            <div class="nav-item-drop">
                <a href="#" class="nav-link-custom" onclick="return false;">
                    Contacto <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom drop-contact drop-right">
                    <a href="tel:{{ setting('wa1_tel') }}">
                        <span class="ci-icon"><i class="fa fa-mobile-alt"></i></span>
                        <span>
                            <span class="ci-label">{{ setting('wa1_label') }}</span>
                            <span class="ci-val">{{ setting('wa1_display') }}</span>
                        </span>
                    </a>
                    <a href="tel:{{ setting('wa2_tel') }}">
                        <span class="ci-icon"><i class="fa fa-mobile-alt"></i></span>
                        <span>
                            <span class="ci-label">{{ setting('wa2_label') }}</span>
                            <span class="ci-val">{{ setting('wa2_display') }}</span>
                        </span>
                    </a>
                    <a href="{{ setting('maps_url') }}" target="_blank" rel="noopener">
                        <span class="ci-icon"><i class="fa fa-map-marker-alt"></i></span>
                        <span>
                            <span class="ci-label">Dirección</span>
                            <span class="ci-val">Sede Principal · {{ setting('address') }}</span>
                        </span>
                    </a>
                    <a href="tel:{{ setting('phone_fixed') }}">
                        <span class="ci-icon"><i class="fa fa-phone"></i></span>
                        <span>
                            <span class="ci-label">PBX</span>
                            <span class="ci-val">{{ setting('phone_fixed_display') }}</span>
                        </span>
                    </a>
                </div>
            </div>
        
        </div>

        <div class="nav-cta">
            <a href="{{ route('busqueda') }}" class="btn-cta-outline" style="padding:8px 14px;" title="Buscar"><i class="fa fa-search"></i></a>
            <button onclick="openQRModal()" class="btn-cta-outline" style="padding:8px 14px;" title="Pagos y Donaciones">REALICE SU PAGO<i class="fa fa-qrcode"></i></button>
            <a href="#" class="btn-cta-solid" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal">SOLICITAR CITA</a>
        </div>

        <!-- Hamburger -->
        <button class="neuro-hamburger" id="hamburgerBtn" aria-label="Menú">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('landing.inicio') }}">Inicio</a>

        <div class="mob-section">Nuestra Institución</div>
        <a href="{{ route('landing.aboutUs') }}" class="sub">Acerca de Nosotros</a>
        <a href="{{ route('landing.portafolio') }}" class="sub">Portafolio de Servicios</a>
        <a href="{{ route('marcoLegal') }}" class="sub">Marco Legal</a>
        <a href="{{ route('articulos') }}" class="sub">Artículos y Revistas</a>
        <a href="{{ route('busqueda') }}" class="sub"><i class="fa fa-search" style="margin-right:6px;"></i>Buscador</a>

        <div class="mob-section">Servicios Especializados</div>
        <a href="{{ route('consulta.neurologia') }}" class="sub">Neurología</a>
        <a href="{{ route('consulta.epileptologia') }}" class="sub">Epileptología</a>
        <a href="{{ route('servicios.clinicaSueno') }}" class="sub">Somnología</a>
        <a href="{{ route('consulta.oftalmologia') }}" class="sub">Oftalmología</a>
        <a href="{{ route('consulta.oftalmologiaPediatrica') }}" class="sub">Oftalmología Pediátrica</a>
        <a href="{{ route('consulta.terapiaFisica') }}" class="sub">Terapia Física</a>
        <a href="{{ route('consulta.terapiaOcupacional') }}" class="sub">Terapia Ocupacional</a>
        <a href="{{ route('consulta.fonoaudiologia') }}" class="sub">Fonoaudiología</a>
        <a href="{{ route('consulta.psiquiatria') }}" class="sub">Psiquiatría</a>
        <a href="{{ route('consulta.neuropsicologia') }}" class="sub">Neuropsicología</a>
        <a href="{{ route('consulta.psicologia') }}" class="sub">Psicología</a>
        <div class="mob-section" style="font-size:9.5px;">Ayudas Diagnósticas</div>
        <a href="{{ route('landing.electrodiagnosticos') }}" class="sub">Unidad de Electrodiagnóstico</a>
        <a href="{{ route('servicios.clinicaSueno') }}" class="sub">Polisomnografía</a>
        <div class="mob-section" style="font-size:9.5px;">Servicios Complementarios</div>
        <a href="{{ route('servicios.clinicaSueno') }}" class="sub">Clínica del Sueño</a>
        <a href="{{ route('landing.tiposTerapia') }}" class="sub">Unidad de Terapia Física</a>
        <a href="{{ route('consulta.fonoaudiologia') }}" class="sub">Unidad de Fonoaudiología</a>
        <a href="{{ route('consulta.terapiaOcupacional') }}" class="sub">Unidad de Terapia Ocupacional</a>
        <a href="{{ route('consulta.medicinaGeneral') }}" class="sub">Medicina General</a>

        <div class="mob-section">Educación al Paciente</div>
        <a href="{{ route('educacion.polisBasal') }}" class="sub">Preparación para Polisomnografía Basal</a>
        <a href="{{ route('educacion.polisomnografia') }}" class="sub">Preparación para Polisomnografía</a>
        <a href="{{ route('educacion.saludSueno') }}" class="sub">Evalúe su Salud del Sueño</a>

        <div class="mob-section">Trabaje con Nosotros</div>
        <a href="{{ route('trabaje.hojaDeVida') }}" class="sub">Postule su Hoja de Vida</a>
        <a href="{{ route('trabaje.practicas') }}" class="sub">Realice sus Prácticas</a>
        <a href="{{ route('trabaje.convenio') }}" class="sub">Postule su Convenio Interinstitucional</a>
        

        <div class="mob-section">Contacto</div>
        <a href="{{ setting('maps_url') }}" target="_blank" rel="noopener" class="mob-contact-item"><i class="fa fa-map-marker-alt"></i> {{ setting('address') }}</a>
        <a href="tel:{{ setting('phone_fixed') }}" class="mob-contact-item"><i class="fa fa-phone"></i> {{ setting('phone_fixed_display') }}</a>
        <a href="tel:{{ setting('wa1_tel') }}" class="mob-contact-item"><i class="fa fa-mobile-alt"></i> {{ setting('wa1_display') }}</a>
        <a href="tel:{{ setting('wa2_tel') }}" class="mob-contact-item"><i class="fa fa-mobile-alt"></i> {{ setting('wa2_display') }}</a>

        <div class="cta-group">
            <button onclick="openQRModal(); document.getElementById('mobileMenu').classList.remove('open');" class="btn-cta-outline" style="text-align:center; width:100%;"><i class="fa fa-qrcode" style="margin-right:6px;"></i>Pagos y Donaciones</button>
            <a href="#" class="btn-cta-solid" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal" style="text-align:center;">SOLICITAR CITA</a>
        </div>
    </div>

    <!-- ===== Modal: Pagos y Donaciones QR ===== -->
    <style>
        .qr-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.55);
            z-index: 2100; align-items: center;
            justify-content: center; padding: 16px;
        }
        .qr-overlay.open { display: flex; }
        .qr-modal {
            background: #fff; border-radius: 18px;
            width: 100%; max-width: 660px;
            max-height: 92vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
            position: relative;
            animation: llSlidein 0.3s ease;
        }
        .qr-header {
            background: linear-gradient(135deg, #2e7d5b, #43a97d);
            padding: 22px 28px 18px;
            color: #fff;
        }
        .qr-header h3 { font-size: 17px; font-weight: 800; margin: 0 36px 4px 0; font-family: 'Poppins', sans-serif; }
        .qr-header p { font-size: 12px; color: rgba(255,255,255,0.78); margin: 0; }
        .qr-close {
            position: absolute; top: 14px; right: 16px;
            background: rgba(255,255,255,0.15); border: none; color: #fff;
            width: 30px; height: 30px; border-radius: 50%; font-size: 15px;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.2s;
        }
        .qr-close:hover { background: rgba(255,255,255,0.30); }
        .qr-tabs {
            display: flex; border-bottom: 2px solid #f0f0f0;
        }
        .qr-tab {
            flex: 1; padding: 13px; text-align: center;
            font-size: 12px; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.8px; cursor: pointer;
            color: #999; border: none; background: #fff;
            transition: color 0.2s, border-bottom 0.2s;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            font-family: 'Poppins', sans-serif;
        }
        .qr-tab.active { color: #2e7d5b; border-bottom-color: #2e7d5b; }
        .qr-body { padding: 28px 24px 24px; text-align: center; }
        .qr-panel { display: none; }
        .qr-panel.active { display: block; }
        .qr-img-box {
            width: min(420px, 100%);
            height: auto;
            aspect-ratio: 1;
            max-width: 100%;
            margin: 0 auto 16px;
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            overflow: hidden;
            display: flex; align-items: center; justify-content: center;
            background: #fafafa;
        }
        .qr-img-box img { width: 100%; height: 100%; object-fit: contain; }
        .qr-placeholder {
            display: flex; flex-direction: column; align-items: center;
            color: #bbb; gap: 8px;
        }
        .qr-placeholder i { font-size: 56px; color: #ddd; }
        .qr-placeholder span { font-size: 11px; }
        .qr-bank-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: #eef7f2; border: 1.5px solid #b8dcc8;
            border-radius: 20px; padding: 5px 14px;
            font-size: 11.5px; font-weight: 700; color: #2e7d5b;
            margin-bottom: 14px;
        }
        
        .qr-bank-logo {
            margin-bottom: 24px;
            display: flex; align-items: center; justify-content: center;
        }
        .qr-bank-logo img {
            max-height: 80px; width: auto; object-fit: contain;
        }
        
        .qr-instructions {
            font-size: 12px; color: #666; line-height: 1.7;
            background: #fafafa; border-radius: 10px;
            padding: 12px 14px; text-align: left;
            border: 1px solid #f0f0f0;
        }
        .qr-instructions ol { margin: 6px 0 0 16px; padding: 0; }
        .qr-instructions li { margin-bottom: 4px; }
        @media (max-width: 480px) {
            .qr-modal { border-radius: 14px; }
            .qr-body { padding: 20px 16px 18px; }
        }
    </style>

    <div class="qr-overlay" id="qrOverlay" onclick="if(event.target===this)closeQRModal()">
        <div class="qr-modal">
            <div class="qr-header">
                <h3><i class="fa fa-qrcode" style="margin-right:8px;"></i>Pagos y Donaciones</h3>
                <p>Escanee el QR desde su app Bancolombia</p>
            </div>
            <button class="qr-close" onclick="closeQRModal()" aria-label="Cerrar">&#x2715;</button>

            <div class="qr-tabs">
                <button class="qr-tab active" onclick="switchQRTab('pagos', this)">Pagos de Servicios</button>
                <button class="qr-tab" onclick="switchQRTab('donaciones', this)">Donaciones</button>
            </div>

            <div class="qr-body">
                <!-- Panel Pagos -->
                <div class="qr-panel active" id="qrPanelPagos">
                    <div class="qr-bank-logo">
                        <img src="{{ asset('assets/img/bre-b.jpg') }}" alt="BRE-B" style="max-height:64px; width:auto;">
                    </div>
                    <div class="qr-img-box">
                        <img src="{{ setting_image('qr_pagos_path', 'assets/img/qr-pagos.jpg') }}" alt="QR Pagos Bancolombia">
                    </div>
                    <div class="qr-instructions">
                        <strong style="color:#333;">¿Cómo pagar?</strong>
                        <ol>
                            <li>Abra su aplicación <strong>bancaria de pagos</strong></li>
                            <li>Seleccione <strong>Pagar con QR</strong></li>
                            <li>Escanee el código o gestione el pago con el número de llave y confirme el valor</li>
                            <li>Guarde el comprobante como respaldo y confirme el pago desde su aplicación bancaria.</li>
                        </ol>
                    </div>
                </div>

                <!-- Panel Donaciones -->
                <div class="qr-panel" id="qrPanelDonaciones">
                    <div class="qr-bank-logo">
                        <img src="{{ asset('assets/img/bre-b.jpg') }}" alt="BRE-B" style="max-height:64px; width:auto;">
                    </div>
                    <div class="qr-img-box">
                        <img src="{{ setting_image('qr_donaciones_path', 'assets/img/qr-donaciones.jpg') }}" alt="QR Donaciones Bancolombia">
                    </div>
                    <div class="qr-instructions">
                        <strong style="color:#333;">¿Cómo donar?</strong>
                        <ol>
                            <li>Abra su aplicación <strong>bancaria de pagos</strong></li>
                            <li>Seleccione <strong>Pagar con QR</strong></li>
                            <li>Escanee el código QR o transfiera a la llave</li>
                            <li>Ingrese el valor que desee donar</li>
                            <li>Remita el comprobante de pago al correo <strong>{{ setting('payments_email') }}</strong></li>
                            <li>Dentro de los 2 días hábiles siguientes recibirá la confirmación de recibido de la donación</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openQRModal() {
            document.getElementById('qrOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeQRModal() {
            document.getElementById('qrOverlay').classList.remove('open');
            document.body.style.overflow = '';
        }
        function switchQRTab(panel, btn) {
            document.querySelectorAll('.qr-tab').forEach(function(t){ t.classList.remove('active'); });
            document.querySelectorAll('.qr-panel').forEach(function(p){ p.classList.remove('active'); });
            btn.classList.add('active');
            document.getElementById('qrPanel' + panel.charAt(0).toUpperCase() + panel.slice(1)).classList.add('active');
        }
    </script>

    <!-- Social Sidebar -->
    <div class="social-sidebar">
        <div class="social-sidebar-label">Síganos</div>
        <a href="{{ setting('facebook') }}" target="_blank" rel="noopener" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="{{ setting('instagram') }}" target="_blank" rel="noopener" title="Instagram"><i class="fab fa-instagram"></i></a>
        @if(setting('youtube'))<a href="{{ setting('youtube') }}" target="_blank" rel="noopener" title="YouTube"><i class="fab fa-youtube"></i></a>@endif
        @if(setting('tiktok'))<a href="{{ setting('tiktok') }}" target="_blank" rel="noopener" title="TikTok"><i class="fab fa-tiktok"></i></a>@endif
        <a href="https://api.whatsapp.com/send?phone={{ setting('wa1') }}" target="_blank" rel="noopener" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="mailto:{{ setting('contact_email') }}" title="Correo"><i class="fa fa-envelope"></i></a>
    </div>

    <script>
        $(document).ready(function () {
            $('#hamburgerBtn').on('click', function () {
                $('#mobileMenu').toggleClass('open');
                $(this).toggleClass('open');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.neuro-navbar, .mobile-menu').length) {
                    $('#mobileMenu').removeClass('open');
                    $('#hamburgerBtn').removeClass('open');
                    $('.nav-item-drop').removeClass('open');
                }
            });

            // Dropdowns: en táctil abren con tap; el enlace padre no navega (usar ítems del menú)
            $('.neuro-navbar .nav-item-drop > .nav-link-custom').on('click', function (e) {
                if (!window.matchMedia('(hover: none), (pointer: coarse)').matches) return;
                e.preventDefault();
                var $drop = $(this).closest('.nav-item-drop');
                var wasOpen = $drop.hasClass('open');
                $('.nav-item-drop').removeClass('open');
                if (!wasOpen) $drop.addClass('open');
            });
        });
        // Navbar shrink on scroll + sync menú móvil
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.neuro-navbar');
            if (!navbar) return;
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                document.documentElement.style.setProperty('--navbar-h', '68px');
            } else {
                navbar.classList.remove('scrolled');
                document.documentElement.style.setProperty('--navbar-h', '80px');
            }
            var btt = document.getElementById('backToTop');
            if (btt) btt.classList.toggle('show', window.scrollY > 500);
        });
        // Scroll fade-up animations — must run after full DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            var els = document.querySelectorAll('.fade-up');
            if (!('IntersectionObserver' in window)) {
                els.forEach(function(el) { el.classList.add('visible'); });
                return;
            }
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });
            els.forEach(function(el) { observer.observe(el); });
            // Fallback: nunca dejar contenido invisible
            setTimeout(function() {
                els.forEach(function(el) { el.classList.add('visible'); });
            }, 2500);
        });
    </script>

    @yield('content')

    <!-- Vigilado Supersalud strip -->
    <div style="background: var(--primary-ultra, #eef5f4); border-top: 1px solid var(--primary-pale, #c8dedd); padding: 14px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('assets/img/SuperS.png') }}" style="max-height:48px; width:auto;" alt="Vigilado Supersalud">
                </div>
                <div class="col">
                    <p style="margin:0; font-size:11.5px; color:#5a7372; font-weight:500;">
                        Vigilado Supersalud · Habilitado por la Secretaría de Salud de Nariño
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== MAP & CONTACT SECTION ===== -->
    <section id="map" style="padding:0; background:#f5f5f5;">

        <style>
            .sedes-section { background:#f5f5f5; padding:60px 0 80px; position:relative; z-index:1; }
            .sedes-title {
                text-align:center; margin-bottom:36px;
            }
            .sedes-title h2 {
                font-size:clamp(22px,3vw,34px); font-weight:900; color:var(--dark);
                margin-bottom:0;
            }
            .sedes-cols {
                display:grid; grid-template-columns:1fr 1fr; gap:28px;
                max-width:1140px; margin:0 auto; padding:0 24px 0;
            }
            @media(max-width:768px){ .sedes-cols { grid-template-columns:1fr; gap:20px; } }
            .sede-col h3 {
                font-size:17px; font-weight:800; color:var(--primary-dark);
                margin-bottom:12px; display:flex; align-items:center; gap:9px;
            }
            .sede-col h3 .sede-num {
                display:inline-flex; align-items:center; justify-content:center;
                width:26px; height:26px; border-radius:50%; font-size:11px;
                font-weight:900; color:#fff; flex-shrink:0;
            }
            .sede-map-box {
                border-radius:12px; overflow:hidden;
                box-shadow:0 4px 20px rgba(0,0,0,0.14);
                position:relative;
                z-index:1;
            }
            .sede-map-box iframe { display:block; width:100%; height:340px; border:0; }
            .btn-sv {
                display:inline-flex; align-items:center; gap:6px;
                margin-top:10px;
                background:transparent; border:1.5px solid var(--primary);
                color:var(--primary-dark); font-size:11.5px; font-weight:700;
                padding:7px 16px; border-radius:20px; text-decoration:none;
                letter-spacing:0.3px; transition:all 0.2s;
            }
            .btn-sv:hover { background:var(--primary); color:#fff; }
            .sede-addr {
                font-size:12.5px; color:#666; margin:7px 0 0;
                display:flex; align-items:flex-start; gap:6px; line-height:1.6;
            }
            .sede-addr i { color:var(--primary); margin-top:2px; flex-shrink:0; }
        </style>

        <div class="sedes-section">
            <div class="sedes-title">
                <h2>¿Dónde estamos ubicados?</h2>
            </div>
            <div class="sedes-cols" style="display:flex; justify-content:center;">
                <div class="sede-col" style="max-width:500px; width:100%;">
                    <div class="sede-map-box" style="position:relative;">
                        <a href="{{ setting('maps_url') }}" target="_blank" rel="noopener"
                           style="display:block; width:100%; height:100%;">
                            <img src="{{ asset('assets/img/SEDE.jpg') }}" alt="Instituto Neurociencias"
                                 style="width:100%; height:100%; object-fit:cover; display:block;">
                            <div style="position:absolute; inset:0; background:rgba(0,0,0,0.4);
                                        display:flex; align-items:center; justify-content:center;
                                        opacity:0; transition:opacity .3s;"
                                 onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0">
                                <i class="fa fa-map-marker-alt" style="color:#fff; font-size:2.5rem;"></i>
                            </div>
                        </a>
                    </div>
                    <div class="sede-addr"><i class="fa fa-map-marker-alt"></i> {{ setting('address') }}</div>
                </div>
            </div><!-- /.sedes-cols -->
        </div><!-- /.sedes-section -->  

        <!-- Contact info bar -->
        <div style="background: linear-gradient(135deg, #2e4a47 0%, #4a6b68 100%); padding: 50px 0;">
          <div class="container">
            <div class="row text-white g-4 justify-content-center">
        
              <div class="col-lg-4 col-md-4 text-center">
                <div style="width:56px; height:56px; background:rgba(255,255,255,0.12); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 16px;">
                  <i class="fab fa-whatsapp" style="font-size:22px; color:#c8dedd;"></i>
                </div>
                <h6 style="font-weight:700; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:10px; color:#c8dedd;">WhatsApp</h6>
                <p style="color:#c8dedd; font-size:12px; margin:6px 0 0; font-weight:400;">{{ setting('wa1_label') }}</p>
                <a href="https://api.whatsapp.com/send?phone={{ setting('wa1') }}" target="_blank" style="color:#fff; text-decoration:none; font-size:12.5px; font-weight:300; display:block; margin-bottom:4px; opacity:0.9;">{{ setting('wa1_display') }}</a>

                <p style="color:#c8dedd; font-size:12px; margin:6px 0 0; font-weight:400;">{{ setting('wa2_label') }}</p>
                <a href="https://api.whatsapp.com/send?phone={{ setting('wa2') }}" target="_blank" style="color:#fff; text-decoration:none; font-size:12.5px; font-weight:300; display:block; opacity:0.9;">{{ setting('wa2_display') }}</a>

                <p style="color:#c8dedd; font-size:12px; margin:14px 0 0; font-weight:400;">PBX</p>
                <a href="tel:{{ setting('phone_fixed') }}" style="color:#fff; text-decoration:none; font-size:12.5px; font-weight:300; display:block; opacity:0.9;">{{ setting('phone_fixed_display') }}</a>
              </div>
        
              <div class="col-lg-4 col-md-4 text-center">
                <div style="width:56px; height:56px; background:rgba(255,255,255,0.12); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 16px;">
                  <i class="fa fa-map-marker-alt" style="font-size:20px; color:#c8dedd;"></i>
                </div>
                <h6 style="font-weight:700; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:10px; color:#c8dedd;">Dirección</h6>
                <p style="color:#fff; font-size:13px; margin:0 0 6px; opacity:0.9; font-weight:300;">{{ setting('address') }}</p>
                <p style="color:#c8dedd; font-size:12px; margin:6px 0 0; font-weight:400;">{{ setting('hours_weekdays') }}</p>
                <p style="color:#c8dedd; font-size:12px; margin:6px 0 0; font-weight:400;">{{ setting('hours_saturday') }}</p>
              </div>
        
            </div>
          </div>
        </div>


    {{-- FLOATING ACTION BUTTON --}}
    <style>
        /* ===== FAB ===== */
        .fab-wrapper {
            position: fixed;
            bottom: 24px; right: 24px;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0;
            padding-bottom: 0;
        }
        .fab-options {
            display: flex;
            flex-direction: column;
            gap: 0;
            align-items: flex-end;
            padding-bottom: 10px;
            pointer-events: none;
        }
        
        .fab-option {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: flex-end;
            opacity: 0;
            pointer-events: none;
            transform: translateY(10px);
            transition: opacity 0.25s ease, transform 0.25s ease;
            margin-bottom: 10px;
        }
        .fab-wrapper.fab-open .fab-option {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }
        /* Stagger: bottom (WhatsApp=child 5) appears first */
        .fab-option-btn {
            width: 46px; height: 46px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 3px 14px rgba(0,0,0,0.22);
            transition: transform 0.2s, box-shadow 0.2s;
            border: none; cursor: pointer;
            text-decoration: none; color: #fff;
            font-size: 17px; flex-shrink: 0;
        }
        .fab-option-btn:hover {
            transform: scale(1.13);
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            color: #fff;
        }
        .fab-option-label {
            background: rgba(15,31,30,0.84);
            backdrop-filter: blur(4px);
            color: #fff; font-size: 11.5px; font-weight: 600;
            padding: 5px 13px; border-radius: 20px;
            white-space: nowrap; letter-spacing: 0.2px;
            font-family: 'Poppins', sans-serif;
            pointer-events: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.18);
        }
        .fab-main-btn {
            width: 58px; height: 58px;
            background: linear-gradient(135deg, #2e4a47, #4a6b68);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 22px rgba(46,74,71,0.50);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none; flex-shrink: 0; outline: none;
        }
        .fab-main-btn:hover,
        .fab-wrapper.fab-open .fab-main-btn {
            transform: scale(1.08);
            box-shadow: 0 6px 28px rgba(46,74,71,0.60);
        }
        .fab-main-btn svg { width: 30px; height: 30px; }

        @media (max-width: 400px) {
            .fab-wrapper { bottom: 16px; right: 14px; }
            .fab-main-btn { width: 52px; height: 52px; }
            .fab-option-btn { width: 44px; height: 44px; }
            .fab-option-label { display: none; }
        }

        /* ===== LO LLAMAMOS MODAL ===== */
        .llamamos-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.55);
            z-index: 2000; align-items: center;
            justify-content: center; padding: 16px;
        }
        .llamamos-overlay.open { display: flex; }
        .llamamos-modal {
            background: #fff; border-radius: 18px;
            width: 100%; max-width: 560px; max-height: 92vh;
            overflow: hidden;
            display: flex; flex-direction: column;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
            position: relative;
            animation: llSlidein 0.3s ease;
        }
        @keyframes llSlidein {
            from { opacity:0; transform:translateY(22px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .llamamos-header {
            background: linear-gradient(135deg, #2e4a47, #4a6b68);
            padding: 22px 52px 18px 28px; border-radius: 18px 18px 0 0;
            color: #fff; position: relative; flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        }
        .llamamos-header h3 {
            font-size: 16px; font-weight: 800; margin: 0 0 4px 0;
            font-family: 'Poppins', sans-serif;
        }
        .llamamos-header p { font-size: 12px; color: rgba(255,255,255,0.78); margin: 0; }
        .llamamos-close {
            position: absolute; top: 14px; right: 16px;
            background: rgba(255,255,255,0.15); border: none; color: #fff;
            width: 30px; height: 30px; border-radius: 50%; font-size: 15px;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.2s; z-index: 3;
        }
        .llamamos-close:hover { background: rgba(255,255,255,0.30); }
        .llamamos-body {
            padding: 22px 26px calc(26px + env(safe-area-inset-bottom, 0px));
            overflow-y: auto; flex: 1 1 auto;
            -webkit-overflow-scrolling: touch;
        }
        .ll-row { display: flex; gap: 12px; }
        .ll-field { flex: 1; margin-bottom: 13px; min-width: 0; }
        .ll-field label {
            display: block; font-size: 10.5px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.6px;
            color: #4a6b68; margin-bottom: 5px;
        }
        .ll-field .req { color: #cc0033; margin-left: 1px; }
        .ll-field input,
        .ll-field select,
        .ll-field textarea {
            width: 100%; padding: 9px 11px;
            border: 1.5px solid #dce8e7; border-radius: 8px;
            font-size: 16px; font-family: 'Poppins', sans-serif;
            color: #2c3e3d; background: #fff; outline: none;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .ll-field input:focus,
        .ll-field select:focus,
        .ll-field textarea:focus {
            border-color: #4a6b68;
            box-shadow: 0 0 0 3px rgba(74,107,104,0.10);
        }
        .ll-field textarea { resize: vertical; min-height: 68px; font-size: 14px; }
        .ll-field input[type="datetime-local"] {
            max-width: 100%; min-width: 0;
        }
        .ll-phone-row {
            display: flex; gap: 8px; align-items: stretch;
        }
        .ll-phone-row .ll-prefix-sel {
            width: auto !important;
            flex: 0 0 108px;
            max-width: 42%;
            min-width: 0;
            padding-left: 8px;
            padding-right: 8px;
        }
        .ll-phone-row input[type="tel"] {
            width: auto !important;
            flex: 1 1 auto;
            min-width: 0;
        }
        .ll-section-title {
            font-size: 10.5px; font-weight: 800;
            text-transform: uppercase; letter-spacing: 1px;
            color: #4a6b68; margin: 6px 0 14px;
            padding-top: 10px; border-top: 1.5px solid #eef5f4;
        }
        .ll-privacy {
            display: flex; align-items: flex-start; gap: 9px;
            margin: 12px 0; font-size: 12.5px; color: #555;
        }
        .ll-privacy input[type="checkbox"] {
            width: 15px; height: 15px; flex-shrink: 0;
            margin-top: 2px; accent-color: #4a6b68; cursor: pointer;
        }
        .ll-privacy label { cursor: pointer; }
        .ll-privacy a, .ll-privacy button.ll-policy-link {
            color: #4a6b68; text-decoration: underline; cursor: pointer;
            background: none; border: none; padding: 0; font: inherit;
        }
        .ll-policy-panel {
            display: none; background: #f3f8f7;
            border: 1px solid #c8dedd; border-radius: 10px;
            padding: 14px 16px; margin: 0 0 12px;
            font-size: 11.5px; color: #555; line-height: 1.75;
            max-height: 160px; overflow-y: auto;
        }
        .ll-policy-panel.open { display: block; }
        .ll-submit-btn {
            width: 100%; padding: 13px;
            background: linear-gradient(135deg, #2e4a47, #4a6b68);
            color: #fff; border: none; border-radius: 10px;
            font-size: 13px; font-weight: 700; letter-spacing: 0.8px;
            text-transform: uppercase; cursor: pointer;
            transition: opacity 0.2s, transform 0.2s;
            font-family: 'Poppins', sans-serif; margin-top: 4px;
        }
        .ll-submit-btn:hover { opacity: 0.88; transform: translateY(-1px); }
        .ll-submit-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }
        @media (max-width: 640px) {
            .llamamos-modal { border-radius: 14px; max-height: 94vh; }
            .llamamos-header { border-radius: 14px 14px 0 0; padding: 18px 48px 16px 18px; }
            .llamamos-body { padding: 18px 16px calc(22px + env(safe-area-inset-bottom, 0px)); }
            .ll-row { flex-direction: column; gap: 0; }
            .ll-phone-row .ll-prefix-sel { flex-basis: 96px; }
        }
    </style>

    <!-- ===== Floating Action Button ===== -->
    <div class="fab-wrapper" id="fabWrapper">
        <div class="fab-options">

            <!-- Opción 1 (arriba): Directorio Médico -->
            <div class="fab-option">
                <span class="fab-option-label">Directorio Médico</span>
                <a href="{{ route('directorioMedico') }}" class="fab-option-btn" style="background:linear-gradient(135deg,#2e4a47,#4a6b68);" title="Directorio Médico">
                    <i class="fa fa-user-md"></i>
                </a>
            </div>

            <!-- Opción 2: Especialidades -->
            <div class="fab-option">
                <span class="fab-option-label">Especialidades</span>
                <a href="{{ route('especialidades') }}" class="fab-option-btn" style="background:linear-gradient(135deg,#5c35a0,#7e57c2);" title="Especialidades">
                    <i class="fa fa-stethoscope"></i>
                </a>
            </div>

            <!-- Opción 3: Escríbanos -->
            <div class="fab-option">
                <span class="fab-option-label">Escríbanos</span>
                <a href="{{ route('escribanos') }}" class="fab-option-btn" style="background:linear-gradient(135deg,#c0620a,#e07d1a);" title="Escríbanos">
                    <i class="fa fa-envelope"></i>
                </a>
            </div>

            <!-- Opción 4: Lo llamamos -->
            <div class="fab-option">
                <span class="fab-option-label">Lo llamamos</span>
                <button type="button" onclick="openLlamamos()" class="fab-option-btn" style="background:linear-gradient(135deg,#1455a0,#1976d2);" title="Lo llamamos">
                    <i class="fa fa-phone-alt"></i>
                </button>
            </div>

            <!-- Opción 5 (abajo, más cerca): WhatsApp -->
            <div class="fab-option">
                <span class="fab-option-label">WhatsApp</span>
                <a href="https://wa.me/{{ setting('wa1') }}?text=%C2%A1Hola!%2C%20necesito%20informaci%C3%B3n." target="_blank" rel="noopener" class="fab-option-btn" style="background:#25d366;" title="WhatsApp">
                    <i class="fab fa-whatsapp" style="font-size:20px;"></i>
                </a>
            </div>

        </div>

        <!-- Botón principal: contacto -->
        <button class="fab-main-btn" id="fabMainBtn" title="Contáctenos" aria-label="Menú de contacto">
            <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="18" cy="10.5" r="4.8" fill="white"/>
                <path d="M7.5 30c0-5.799 4.701-10.5 10.5-10.5S28.5 24.201 28.5 30" fill="white" opacity="0.88"/>
                <path d="M10.2 12C10.2 7.194 13.698 3.5 18 3.5c4.302 0 7.8 3.694 7.8 8.5" stroke="white" stroke-width="1.9" fill="none" stroke-linecap="round"/>
                <rect x="8" y="11" width="3.4" height="5.4" rx="1.7" fill="white"/>
                <rect x="24.6" y="11" width="3.4" height="5.4" rx="1.7" fill="white"/>
                <path d="M9.8 16.2 Q8.8 21.5 13.8 23.2" stroke="white" stroke-width="1.4" fill="none" stroke-linecap="round"/>
                <circle cx="14.8" cy="23.8" r="1.5" fill="white"/>
            </svg>
        </button>
    </div>

    <!-- ===== Modal: Lo llamamos ===== -->
    <div class="llamamos-overlay" id="llamamosOverlay" onclick="if(event.target===this)closeLlamamos()">
        <div class="llamamos-modal">
            <div class="llamamos-header">
                <h3>¿Necesita una cita?</h3>
                <p>Deje sus datos por aquí y lo contactaremos</p>
            </div>
            <button class="llamamos-close" onclick="closeLlamamos()" aria-label="Cerrar">&#x2715;</button>
            <div class="llamamos-body">
                <form id="llamamosForm" onsubmit="submitLlamamos(event)" novalidate>

                    <!-- Tipo de documento + número -->
                    <div class="ll-row">
                        <div class="ll-field" style="flex:1.4;">
                            <label>Tipo de Documento</label>
                            <select name="doc_type">
                                <option value="CC">CC – Cédula de Ciudadanía</option>
                                <option value="CD">CD – Carnet Diplomático</option>
                                <option value="CE">CE – Cédula de Extranjería</option>
                                <option value="IE">IE – ID Extranjero</option>
                                <option value="FI">FI – Fideicomiso</option>
                                <option value="NIT">NIT</option>
                                <option value="PA">PA – Pasaporte</option>
                                <option value="RC">RC – Registro Civil</option>
                                <option value="TI">TI – Tarjeta de Identidad</option>
                            </select>
                        </div>
                        <div class="ll-field">
                            <label>Número de Identificación <span class="req">*</span></label>
                            <input type="text" name="doc_number" placeholder="Ej. 1098765432" required inputmode="numeric">
                        </div>
                    </div>

                    <!-- Nombre + Apellido -->
                    <div class="ll-row">
                        <div class="ll-field">
                            <label>Nombre <span class="req">*</span></label>
                            <input type="text" name="first_name" placeholder="Nombre" required autocomplete="given-name">
                        </div>
                        <div class="ll-field">
                            <label>Apellido <span class="req">*</span></label>
                            <input type="text" name="last_name" placeholder="Apellido" required autocomplete="family-name">
                        </div>
                    </div>

                    <!-- Celular -->
                    <div class="ll-field">
                        <label>Número de Celular <span class="req">*</span></label>
                        <div class="ll-phone-row">
                            <select name="phone_prefix" class="ll-prefix-sel" aria-label="Indicativo">
                                <option value="+57">+57</option>
                                <option value="+1">+1</option>
                                <option value="+52">+52</option>
                                <option value="+34">+34</option>
                                <option value="+51">+51</option>
                                <option value="+58">+58</option>
                                <option value="+55">+55</option>
                                <option value="+54">+54</option>
                            </select>
                            <input type="tel" name="phone" placeholder="305 356 0651" required inputmode="tel" style="flex:1;" autocomplete="tel">
                        </div>
                    </div>

                    <!-- Aseguradora + Correo -->
                    <div class="ll-row">
                        <div class="ll-field">
                            <label>Aseguradora <span class="req">*</span></label>
                            <input type="text" name="insurer" placeholder="Ej. Sura, Nueva EPS…" required>
                        </div>
                        <div class="ll-field">
                            <label>Correo Electrónico <span class="req">*</span></label>
                            <input type="email" name="email" placeholder="correo@ejemplo.com" required autocomplete="email">
                        </div>
                    </div>

                    <!-- Mensaje -->
                    <div class="ll-field">
                        <label>Cuéntenos en qué podemos ayudarle <span class="req">*</span></label>
                        <textarea name="message" placeholder="Describa brevemente su motivo de consulta…" required></textarea>
                    </div>

                    <div class="ll-section-title">Complementos de la Solicitud</div>

                    <!-- ¿Cuándo llamar? -->
                    <div class="ll-field">
                        <label>¿Cuándo deberíamos llamarle?</label>
                        <select name="call_when" id="llCallWhen" onchange="llToggleDate()">
                            <option value="asap">Lo más pronto posible</option>
                            <option value="scheduled">Elegir fecha y hora</option>
                        </select>
                    </div>
                    <div class="ll-field" id="llDateField" style="display:none;">
                        <label>Fecha y Hora <span class="req">*</span></label>
                        <input type="datetime-local" name="call_datetime" id="llDatetime">
                    </div>

                    <!-- Especialidad -->
                    <div class="ll-field">
                        <label>Especialidad</label>
                        <select name="specialty" id="llSpecialty">
                            <option value="">— Seleccione —</option>
                            <option value="neurologia">Neurología</option>
                            <option value="epileptologia">Epileptología</option>
                            <option value="psiquiatria">Psiquiatría</option>
                            <option value="neuropsicologia">Neuropsicología</option>
                            <option value="psicologia">Psicología</option>
                            <option value="terapia_fisica">Terapia Física</option>
                            <option value="electrodiagnostico">Electrodiagnóstico</option>
                            <option value="medicina_general">Medicina General</option>
                            <option value="clinica_sueno" id="llOptClinicaSueno">Clínica del Sueño</option>
                        </select>
                    </div>

                    <!-- Privacidad -->
                    <div class="ll-privacy">
                        <input type="checkbox" id="llPrivacy" required>
                        <label for="llPrivacy">
                            He leído y acepto el <button type="button" class="ll-policy-link" onclick="llTogglePolicy(event)">tratamiento de los datos personales suministrados</button>
                        </label>
                    </div>
                    <div class="ll-policy-panel" id="llPolicyPanel">
                        <strong style="color:#2e4a47;">Tratamiento de Datos Personales</strong><br><br>
                        De conformidad con la Ley Estatutaria 1581 de 2012 y el Decreto 1377 de 2013, el <strong>Instituto Neurociencias de Nariño IPS S.A.S</strong> informa que sus datos personales serán utilizados exclusivamente para gestionar su solicitud de cita y brindar la atención médica requerida. Sus datos no serán cedidos a terceros sin su consentimiento expreso, salvo obligación legal. Usted puede ejercer sus derechos ARCO escribiendo a <em>neurocienciasnarino@gmail.com</em>.<br><br>
                        <a href="{{ route('politicaPrivacidad') }}" target="_blank" style="color:#4a6b68;font-weight:700;text-decoration:underline;">Ver Política de Privacidad completa →</a>
                    </div>

                    <button type="submit" class="ll-submit-btn" id="llSubmitBtn">Confirmar Solicitud</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var fabBtn = document.getElementById('fabMainBtn');
        var fabWrapper = document.getElementById('fabWrapper');
        
        fabBtn.addEventListener('mouseenter', function() {
            fabWrapper.classList.add('fab-open');
        });
        
        fabWrapper.addEventListener('mouseleave', function() {
            fabWrapper.classList.remove('fab-open');
        });
        
        /* Toggle en touch */
        fabBtn.addEventListener('click', function(e) {
            if (window.matchMedia('(hover: none)').matches) {
                fabWrapper.classList.toggle('fab-open');
                e.stopPropagation();
            }
        });
        
        document.addEventListener('click', function(e) {
            if (!fabWrapper.contains(e.target)) {
                fabWrapper.classList.remove('fab-open');
            }
        });

        /* Lo llamamos: open / close */
        function openLlamamos() {
            var opt = document.getElementById('llOptClinicaSueno');
            if (opt) {
                if (window._fromSleepSurvey) {
                    opt.hidden = true;
                    if (opt.selected) {
                        document.getElementById('llSpecialty').value = '';
                    }
                } else {
                    opt.hidden = false;
                }
            }
            document.getElementById('llamamosOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeLlamamos() {
            document.getElementById('llamamosOverlay').classList.remove('open');
            document.body.style.overflow = '';
        }

        /* Toggle date picker */
        function llToggleDate() {
            var val = document.getElementById('llCallWhen').value;
            var f   = document.getElementById('llDateField');
            var dt  = document.getElementById('llDatetime');
            f.style.display = val === 'scheduled' ? 'block' : 'none';
            dt.required     = val === 'scheduled';
        }

        /* Toggle inline policy panel */
        function llTogglePolicy(e) {
            e.preventDefault();
            document.getElementById('llPolicyPanel').classList.toggle('open');
        }

        /* Submit */
        function submitLlamamos(e) {
            e.preventDefault();
            if (!document.getElementById('llPrivacy').checked) {
                alert('Debe aceptar el tratamiento de datos personales para continuar.');
                return;
            }
            var form = document.getElementById('llamamosForm');
            if (!form.checkValidity()) { form.reportValidity(); return; }
            var btn = document.getElementById('llSubmitBtn');
            btn.disabled = true;
            btn.textContent = 'Enviando…';

            var fd = new FormData(form);
            var tokenMeta = document.querySelector('meta[name="csrf-token"]');
            var token = tokenMeta ? tokenMeta.getAttribute('content') : '';

            fetch('{{ route('llamamos.enviar') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: fd
            }).then(function(res) {
                return res.json().then(function(data) {
                    return { ok: res.ok && data.ok, message: data.message || (res.ok ? 'Solicitud enviada.' : 'Error al enviar.') };
                }).catch(function() {
                    return { ok: false, message: 'Error al procesar la respuesta del servidor.' };
                });
            }).then(function(result) {
                if (result.ok) {
                    btn.textContent = '✓ ¡Solicitud enviada!';
                    btn.style.background = 'linear-gradient(135deg,#1b6b3a,#27ae60)';
                    setTimeout(function() {
                        closeLlamamos();
                        form.reset();
                        btn.disabled = false;
                        btn.textContent = 'Confirmar Solicitud';
                        btn.style.background = '';
                        document.getElementById('llDateField').style.display = 'none';
                        document.getElementById('llPolicyPanel').classList.remove('open');
                    }, 1800);
                } else {
                    alert(result.message);
                    btn.disabled = false;
                    btn.textContent = 'Confirmar Solicitud';
                }
            }).catch(function() {
                alert('No pudimos enviar su solicitud. Intente de nuevo o contáctenos por WhatsApp.');
                btn.disabled = false;
                btn.textContent = 'Confirmar Solicitud';
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLlamamos();
                closeQRModal();
            }
        });
    </script>

        <!-- ===== COLABORADORES & ALIADOS ===== -->
        <style>
            .colabs-section { padding: 48px 0; background: #ffffff; border-top: 1px solid #e2eded; overflow: hidden; }
            .colabs-title { text-align: center; font-size: 10.5px; font-weight: 700; letter-spacing: 2.5px; text-transform: uppercase; color: #94a3a2; margin-bottom: 30px; }
            .colabs-track-wrap { overflow: hidden; position: relative; }
            .colabs-track-wrap::before, .colabs-track-wrap::after { content: ''; position: absolute; top: 0; bottom: 0; width: 90px; z-index: 2; pointer-events: none; }
            .colabs-track-wrap::before { left: 0; background: linear-gradient(to right, #ffffff, transparent); }
            .colabs-track-wrap::after  { right: 0; background: linear-gradient(to left,  #ffffff, transparent); }
            .colabs-track { display: flex; align-items: center; width: max-content; animation: colabScroll 26s linear infinite; }
            .colabs-track:hover { animation-play-state: paused; }
            @keyframes colabScroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
            .colab-item { width: 180px; height: 100px; margin: 0 20px; display: flex; align-items: center; justify-content: center; background: transparent; border: none; border-radius: 0; padding: 8px; flex-shrink: 0; }
            .colab-item:hover { box-shadow: none; border-color: transparent; }
            .colab-item img { max-width: 160px; max-height: 90px; object-fit: contain; filter: grayscale(30%); transition: filter 0.25s, transform 0.25s; }
            .colab-item:hover img { filter: grayscale(0%); transform: scale(1.05); }
        
            /* ===== BACK TO TOP ===== */
            #backToTop {
                position: fixed;
                bottom: 96px;
                left: auto;
                right: 24px;
                transform: translateY(18px);
                z-index: 1060;
                background: var(--primary, #4a6b68);
                color: #fff;
                border: none;
                width: 44px;
                height: 44px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 4px 22px rgba(74,107,104,0.38);
                opacity: 0;
                visibility: hidden;
                pointer-events: none;
                transition: opacity 0.3s ease, transform 0.3s ease, box-shadow 0.2s, visibility 0.3s;
            }
            #backToTop.show {
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
                transform: translateY(0);
            }
            #backToTop:hover {
                background: var(--primary-dark, #2e4a47);
                box-shadow: 0 6px 28px rgba(74,107,104,0.5);
            }
            @media (max-width: 400px) {
                #backToTop { right: 14px; bottom: 84px; }
            }
            @media (prefers-reduced-motion: reduce) {
                .colabs-track { animation: none !important; }
            }
        </style>
        
        <div class="colabs-section">
            <p class="colabs-title">Colaboradores &amp; Aliados</p>
            <div class="colabs-track-wrap">
                <div class="colabs-track">
        
                    @php
                        $colaboradores = [
                            ['FOMAG', 'assets/img/fomag.png', 'https://www.fomag.gov.co'],
                            ['PROINSALUD', 'assets/img/proinsalud.jpg', 'https://www.proinsalud.co/'],
                            ['PROTEGEMOS', 'assets/img/protegemos.jpg', 'https://revistaprotegemos.com.co'],
                            ['PREVIRED', 'assets/img/previred.png', 'https://previred.com.co'],
                            ['GLOBAL SALUD', 'assets/img/global-salud.jpg', 'https://www.globalsalud.com.co'],
                            ['MEDICAL PREFERENCIAL', 'assets/img/medical-preferencial.jpg', 'https://www.facebook.com/people/Medical-Preferencial-by-Claudia-Mora/61561901228149/#'],
                            ['UNIDAD CARDIO QUIRURGICA DE NARIÑO', 'assets/img/ucqn.jpg', 'https://www.facebook.com/cardioquirurgica/?locale=es_LA'],
                            ['VIDA SANA', 'assets/img/vidassanas.png', 'https://www.instagram.com/vidassanaspasto'],
                            ['NIDO', 'assets/img/nido.jpg', 'https://www.facebook.com/p/Nido-Pasto-100092497038539'],
                        ];
                    @endphp

                    {{-- Primera pasada --}}
                    @foreach($colaboradores as $colab)
                        <a href="{{ $colab[2] }}" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
                            <div class="colab-item">
                                <img src="{{ asset($colab[1]) }}" alt="{{ $colab[0] }}">
                            </div>
                        </a>
                    @endforeach

                    {{-- Duplicado para el loop infinito --}}
                    @foreach($colaboradores as $colab)
                        <a href="{{ $colab[2] }}" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
                            <div class="colab-item">
                                <img src="{{ asset($colab[1]) }}" alt="{{ $colab[0] }}">
                            </div>
                        </a>
                    @endforeach
        
                </div>
            </div>
        </div>
        
        <!-- Volver arriba -->
        <button type="button" id="backToTop" aria-label="Volver arriba">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M12 19V5M5 12l7-7 7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <script>
            (function () {
                var btt = document.getElementById('backToTop');
                if (!btt) return;
                function syncBackToTop() {
                    var y = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
                    btt.classList.toggle('show', y > 400);
                }
                window.addEventListener('scroll', syncBackToTop, { passive: true });
                syncBackToTop();
                btt.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    try {
                        window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
                    } catch (err) {
                        document.documentElement.scrollTop = 0;
                        document.body.scrollTop = 0;
                    }
                });
            })();
        </script>


    <footer style="background:#0f1f1e; color:#ccc; padding: 60px 0 0;">
        <div class="container">
            <div class="row g-5">
                <!-- Brand col -->
                <div class="col-lg-4">
                    <img src="{{ asset('assets/img/LOGO.png') }}" style="height:48px; filter:brightness(0) invert(1); margin-bottom:18px;" alt="Logo">
                    <p style="font-size:13px; color:#8aada9; line-height:1.8; margin-bottom:20px;">Instituto especializado en neurociencias con más de 8 años brindando atención de calidad en Pasto, Nariño.</p>
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        <a href="{{ setting('facebook') }}" target="_blank" rel="noopener" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ setting('instagram') }}" target="_blank" rel="noopener" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';" title="Instagram"><i class="fab fa-instagram"></i></a>
                        @foreach(['youtube' => 'YouTube', 'tiktok' => 'TikTok'] as $socialKey => $socialLabel)
                            @if(setting($socialKey))
                                <a href="{{ setting($socialKey) }}" target="_blank" rel="noopener" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';" title="{{ $socialLabel }}"><i class="fab fa-{{ $socialKey }}"></i></a>
                            @endif
                        @endforeach
                        <a href="https://api.whatsapp.com/send?phone={{ setting('wa1') }}" target="_blank" rel="noopener" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="mailto:{{ setting('contact_email') }}" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';" title="Correo"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
                <!-- Links col -->
                <div class="col-lg-2 col-6">
                    <h6 style="color:#fff; font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:20px;">Institución</h6>
                    <ul style="list-style:none; padding:0; margin:0;">
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.inicio') }}#about" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">¿Quiénes somos?</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.portafolio') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Portafolio</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('marcoLegal') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Marco Legal</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('articulos') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Artículos y Revistas</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('escribanos') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Escríbanos</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('politicaPrivacidad') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Pol&iacute;tica de Privacidad</a></li>
                    </ul>
                </div>
                <!-- Services col -->
                <div class="col-lg-2 col-6">
                    <h6 style="color:#fff; font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:20px;">Servicios</h6>
                    <ul style="list-style:none; padding:0; margin:0;">
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.tiposConsulta') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Tipos de Consulta</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.tiposTerapia') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Tipos de Terapia</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.electrodiagnosticos') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Electrodiagnósticos</a></li>
                    </ul>
                </div>
                <!-- Contact col -->
                <div class="col-lg-4">
                    <h6 style="color:#fff; font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:16px;">Contáctenos</h6>
                    <div style="display:flex; gap:10px; margin-bottom:10px; align-items:flex-start;">
                        <i class="fa fa-map-marker-alt" style="color:#7fa8a4; margin-top:2px; font-size:13px; flex-shrink:0;"></i>
                        <span style="color:#8aada9; font-size:13px; font-weight:300;">{{ setting('address') }}</span>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:4px; margin-bottom:10px;">
                        <div style="display:flex; gap:10px; align-items:center;">
                            <i class="fa fa-clock" style="color:#7fa8a4; font-size:13px; flex-shrink:0;"></i>
                            <span style="color:#8aada9; font-size:13px; font-weight:300;">{{ setting('hours_weekdays') }}</span>
                        </div>
                        <div style="display:flex; gap:10px; align-items:center; padding-left:23px;">
                            <span style="color:#8aada9; font-size:13px; font-weight:300;">{{ setting('hours_saturday') }}</span>
                        </div>
                    </div>
                    <p style="color:#5a7b78; font-size:10px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; margin:14px 0 8px;">Teléfonos</p>
                    <div style="display:flex; gap:8px; margin-bottom:7px; align-items:flex-start;">
                        <i class="fa fa-phone" style="color:#7fa8a4; font-size:11px; margin-top:3px; flex-shrink:0;"></i>
                        <div>
                            <span style="color:#5a7b78; font-size:10px; font-weight:700; text-transform:uppercase; display:block; line-height:1.2;">PBX</span>
                            <a href="tel:{{ setting('phone_fixed') }}" style="color:#8aada9; text-decoration:none; font-size:11.5px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">{{ setting('phone_fixed_display') }}</a>
                        </div>
                    </div>
                    <div style="display:flex; gap:8px; margin-bottom:7px; align-items:flex-start;">
                        <i class="fa fa-mobile-alt" style="color:#7fa8a4; font-size:11px; margin-top:3px; flex-shrink:0;"></i>
                        <div>
                            <span style="color:#5a7b78; font-size:10px; font-weight:700; text-transform:uppercase; display:block; line-height:1.2;">{{ setting('wa1_label') }}</span>
                            <a href="tel:{{ setting('wa1_tel') }}" style="color:#8aada9; text-decoration:none; font-size:11.5px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">{{ setting('wa1_display') }}</a>
                        </div>
                    </div>
                    <div style="display:flex; gap:8px; margin-bottom:7px; align-items:flex-start;">
                        <i class="fa fa-mobile-alt" style="color:#7fa8a4; font-size:11px; margin-top:3px; flex-shrink:0;"></i>
                        <div>
                            <span style="color:#5a7b78; font-size:10px; font-weight:700; text-transform:uppercase; display:block; line-height:1.2;">{{ setting('wa2_label') }}</span>
                            <a href="tel:{{ setting('wa2_tel') }}" style="color:#8aada9; text-decoration:none; font-size:11.5px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">{{ setting('wa2_display') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer bottom bar -->
        <div style="margin-top:50px; border-top:1px solid rgba(255,255,255,0.07); padding:20px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p style="font-size:11.5px; color:#5a7372; margin:0; font-weight:300;">
                            &copy; {{ date('Y') }} Instituto Neurociencias de Nariño IPS S.A.S. Todos los derechos reservados.
                        </p>
                        @include('partials.footer-orgullo')
                    </div>
                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                        <p style="font-size:11px; color:#3d5250; margin:0; font-weight:300;">
                            NIT: 901164565-1 · Vigilado Supersalud
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @include('components.solicitar-cita-modal')
    </div>
    @if(!empty($adminPreview))
        <script>
            document.addEventListener('click', function (e) {
                var link = e.target.closest('a[href]');
                if (!link) return;
                var href = link.getAttribute('href') || '';
                if (href.charAt(0) !== '#') e.preventDefault();
            }, true);
            document.addEventListener('submit', function (e) { e.preventDefault(); }, true);
        </script>
    @endif
</body>
</html>
