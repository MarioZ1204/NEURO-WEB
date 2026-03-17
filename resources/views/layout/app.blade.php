<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Instituto Neurociencias de Nariño IPS S.A.S - Atención especializada en neurología, epileptología y neurorehabilitación en Pasto, Nariño.">
    <meta name="author" content="Instituto Neurociencias de Nariño">
    <!-- Open Graph / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Instituto Neurociencias de Nariño IPS S.A.S">
    <meta property="og:title" content="Instituto Neurociencias de Nariño IPS S.A.S">
    <meta property="og:description" content="Atención especializada en neurología, epileptología y neurorehabilitación en Pasto, Nariño. Más de 8 años cuidándote.">
    <meta property="og:image" content="{{ asset('assets/img/LOGO.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/LOGO2.png') }}">

    <title>Instituto Neurociencias de Nariño | @yield('title')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Font Awesome & Swiper -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        .neuro-navbar .nav-item-drop:hover .dropdown-menu-custom { display: block; }
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
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            padding: 9px 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
            border-radius: 30px;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.3s ease;
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
            border: 2px solid var(--primary);
            color: #fff;
            background: var(--primary);
            padding: 9px 22px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
            border-radius: 30px;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.3s ease;
            cursor: pointer;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
        }
        .btn-cta-solid:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(74,107,104,0.35);
        }

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
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .fade-up:nth-child(2) { transition-delay: 0.1s; }
        .fade-up:nth-child(3) { transition-delay: 0.2s; }
        .fade-up:nth-child(4) { transition-delay: 0.3s; }

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

        /* ===== 2-COLUMN DROPDOWN ===== */
        .dropdown-menu-custom.drop-2col { min-width: 470px; padding: 0; }
        .neuro-navbar .nav-item-drop:hover .dropdown-menu-custom.drop-2col { display: flex; }
        .drop-2col .drop-col { flex: 1; padding: 10px 0; min-width: 0; }
        .drop-2col .drop-col-title {
            padding: 12px 20px 8px;
            font-size: 9.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--primary);
            border-bottom: 1px solid var(--primary-ultra);
            margin-bottom: 4px;
        }
        .drop-2col .drop-col + .drop-col { border-left: 1px solid var(--primary-ultra); }

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
</head>


<body>

    <!-- Splash Screen Component -->
    @include('components.splash-screen')

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
                    <a href="{{ route('landing.aboutUs') }}">Portafolio de Servicios</a>
                    <a href="{{ route('marcoLegal') }}">Marco Legal</a>
                    <a href="{{ route('estadosFinancieros') }}">Estados Financieros</a>
                    <a href="{{ route('articulos') }}">Artículos y Revistas</a>
                </div>
            </div>

            {{-- Consulta Especializada (2 columnas) --}}
            <div class="nav-item-drop">
                <a href="{{ route('landing.tiposConsulta') }}" class="nav-link-custom">
                    Consulta Especializada <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom drop-2col">
                    <div class="drop-col">
                        <div class="drop-col-title">Consulta Especializada</div>
                        <a href="{{ route('consulta.neurologia') }}">Neurología</a>
                        <a href="{{ route('consulta.epileptologia') }}">Epileptología</a>
                        <a href="{{ route('consulta.psiquiatria') }}">Psiquiatría</a>
                        <a href="{{ route('consulta.neuropsicologia') }}">Neuropsicología</a>
                        <a href="{{ route('consulta.psicologia') }}">Psicología</a>
                    </div>
                    <div class="drop-col">
                        <div class="drop-col-title">+ Servicios Complementarios</div>
                        <a href="{{ route('servicios.clinicaSueno') }}">Clínica del Sueño</a>
                        <a href="{{ route('landing.electrodiagnosticos') }}">Unidad de Electrodiagnóstico</a>
                        <a href="{{ route('landing.tiposTerapia') }}">Unidad de Terapia Física</a>
                        <a href="{{ route('consulta.medicinaGeneral') }}">Medicina General</a>
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
                    <a href="{{ route('trabaje.practicas') }}">Realice sus Prácticas</a>
                    <a href="{{ route('trabaje.convenio') }}">Postule su Convenio Interinstitucional</a>
                </div>
            </div>

            {{-- Contacto --}}
            <div class="nav-item-drop">
                <a href="{{ route('landing.inicio') }}#map" class="nav-link-custom">
                    Contacto <span class="arrow">▼</span>
                </a>
                <div class="dropdown-menu-custom drop-contact drop-right">
                    <a href="https://maps.google.com/maps?q=INSTITUTO+NEUROCIENCIAS+DE+NARI%C3%91O+IPS+SAS,+Calle+14A+%2334-13,+Pasto" target="_blank" rel="noopener">
                        <span class="ci-icon"><i class="fa fa-map-marker-alt"></i></span>
                        <span>
                            <span class="ci-label">Dirección</span>
                            <span class="ci-val">C. 14A #34-13, Pasto, Nariño</span>
                        </span>
                    </a>
                    <a href="tel:6027238141">
                        <span class="ci-icon"><i class="fa fa-phone"></i></span>
                        <span>
                            <span class="ci-label">Teléfono</span>
                            <span class="ci-val">(602) 7238141</span>
                        </span>
                    </a>
                    <a href="tel:3053560651">
                        <span class="ci-icon"><i class="fa fa-mobile-alt"></i></span>
                        <span>
                            <span class="ci-label">Celular</span>
                            <span class="ci-val">305 356 0651</span>
                        </span>
                    </a>
                    <a href="mailto:neurocienciasnarino@gmail.com">
                        <span class="ci-icon"><i class="fa fa-envelope"></i></span>
                        <span>
                            <span class="ci-label">Correo Electrónico</span>
                            <span class="ci-val">neurocienciasnarino@gmail.com</span>
                        </span>
                    </a>
                </div>
            </div>

        </div>

        <div class="nav-cta">
            <a href="{{ route('busqueda') }}" class="btn-cta-outline" style="padding:8px 14px;" title="Buscar"><i class="fa fa-search"></i></a>
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid">SOLICITAR CITA</a>
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
        <a href="{{ route('landing.aboutUs') }}" class="sub">Portafolio de Servicios</a>
        <a href="{{ route('marcoLegal') }}" class="sub">Marco Legal</a>
        <a href="{{ route('estadosFinancieros') }}" class="sub">Estados Financieros</a>
        <a href="{{ route('articulos') }}" class="sub">Artículos y Revistas</a>
        <a href="{{ route('busqueda') }}" class="sub"><i class="fa fa-search" style="margin-right:6px;"></i>Buscador</a>

        <div class="mob-section">Consulta Especializada</div>
        <a href="{{ route('consulta.neurologia') }}" class="sub">Neurología</a>
        <a href="{{ route('consulta.epileptologia') }}" class="sub">Epileptología</a>
        <a href="{{ route('consulta.psiquiatria') }}" class="sub">Psiquiatría</a>
        <a href="{{ route('consulta.neuropsicologia') }}" class="sub">Neuropsicología</a>
        <a href="{{ route('consulta.psicologia') }}" class="sub">Psicología</a>
        <div class="mob-section" style="font-size:9.5px;">+ Servicios Complementarios</div>
        <a href="{{ route('servicios.clinicaSueno') }}" class="sub">Clínica del Sueño</a>
        <a href="{{ route('landing.electrodiagnosticos') }}" class="sub">Unidad de Electrodiagnóstico</a>
        <a href="{{ route('landing.tiposTerapia') }}" class="sub">Unidad de Terapia Física</a>
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
        <a href="https://maps.google.com/maps?q=INSTITUTO+NEUROCIENCIAS+DE+NARI%C3%91O+IPS+SAS,+Calle+14A+%2334-13,+Pasto" target="_blank" rel="noopener" class="mob-contact-item"><i class="fa fa-map-marker-alt"></i> C. 14A #34-13, Pasto, Nariño</a>
        <a href="tel:6027238141" class="mob-contact-item"><i class="fa fa-phone"></i> (602) 7238141</a>
        <a href="tel:3053560651" class="mob-contact-item"><i class="fa fa-mobile-alt"></i> 305 356 0651</a>
        <a href="mailto:neurocienciasnarino@gmail.com" class="mob-contact-item"><i class="fa fa-envelope"></i> neurocienciasnarino@gmail.com</a>

        <div class="cta-group">
            <a href="#" onclick="openContactModal(event); document.getElementById('mobileMenu').classList.remove('open');" class="btn-cta-outline" style="text-align:center;">PQRS</a>
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="text-align:center;">SOLICITAR CITA</a>
        </div>
    </div>

    <!-- Social Sidebar -->
    <div class="social-sidebar">
        <div class="social-sidebar-label">SíGANOS</div>
        <a href="https://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="https://api.whatsapp.com/send?phone=3053560651" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
    </div>

    <script>
        $(document).ready(function () {
            $('#hamburgerBtn').on('click', function () {
                $('#mobileMenu').toggleClass('open');
                $(this).toggleClass('open');
            });
            // Close mobile menu on outside click
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.neuro-navbar, .mobile-menu').length) {
                    $('#mobileMenu').removeClass('open');
                    $('#hamburgerBtn').removeClass('open');
                }
            });
        });
        // Navbar shrink on scroll
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.neuro-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            var btt = document.getElementById('backToTop');
            if (btt) btt.classList.toggle('show', window.scrollY > 500);
        });
        // Scroll fade-up animations — must run after full DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.12 });
            document.querySelectorAll('.fade-up').forEach(function(el) {
                observer.observe(el);
            });
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
            .sedes-section { background:#f5f5f5; padding:60px 0 0; }
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

            <div class="sedes-cols">

                <!-- Sede 1 -->
                <div class="sede-col">
                    <h3>
                        <span class="sede-num" style="background:var(--primary);">1</span>
                        Sede Principal 
                    </h3>
                    <div class="sede-map-box">
                        
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!4v1773754795231!6m8!1m7!1soZ6fv2LQd3Eq6hqLLrZUJw!2m2!1d1.218293332139965!2d-77.28628173728882!3f173.08680620153123!4f-10.743299841954638!5f0.7820865974627469"  
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Sede Principal Instituto Neurociencias">
                        </iframe>
                    </div>
                    <div class="sede-addr"><i class="fa fa-map-marker-alt"></i> Carrera 34 #13-80, Barrio San Ignacio, Pasto, Nariño </div>
                    <a href="https://maps.app.goo.gl/2Y62iqQ5WPHYPZ5g7"
                       target="_blank" rel="noopener" class="btn-sv">
                        <i class="fa fa-street-view"></i> Ver en Street View 360°
                    </a>
                </div>

                <!-- Sede 2 -->
                <div class="sede-col">
                    <h3>
                        <span class="sede-num" style="background:var(--primary);">2</span>
                        Sede 2 · Servicios Complementarios
                    </h3>
                    <div class="sede-map-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!4v1742168000002!6m8!1m7!1sCAoSLEFGMVFpcE1KbGhIeGpuXzVYc3BJVF9pMHdaM3YtdWRJOHJnY1IwV3FXWQ!2m2!1d1.217846!2d-77.285914!3f180!4f0!5f0.7820865974627469"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Sede 2 Servicios Complementarios">
                        </iframe>
                    </div>
                    <div class="sede-addr"><i class="fa fa-map-marker-alt"></i> Carrera 33 #13-84,Barrio San Pasto, Nariño</div>
                    <a href="https://maps.app.goo.gl/7KrevZf1qQyxNTeH8"
                       target="_blank" rel="noopener" class="btn-sv">
                        <i class="fa fa-street-view"></i> Ver en Street View 360°
                    </a>
                </div>

            </div><!-- /.sedes-cols -->
        </div><!-- /.sedes-section -->

        <!-- Contact info bar -->
        <div style="background: linear-gradient(135deg, #2e4a47 0%, #4a6b68 100%); padding: 50px 0; margin-top:50px;">
            <div class="container">
                <div class="row text-white g-4">
                    <div class="col-lg-4 col-md-4 text-center">
                        <div style="width:56px; height:56px; background:rgba(255,255,255,0.12); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 16px;">
                            <i class="fa fa-envelope" style="font-size:20px; color:#c8dedd;"></i>
                        </div>
                        <h6 style="font-weight:700; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:10px; color:#c8dedd;">Correo Electrónico</h6>
                        <a href="mailto:neurocienciasnarino@gmail.com" style="color:#fff; text-decoration:none; font-size:13px; font-weight:300; opacity:0.9;">neurocienciasnarino@gmail.com</a>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">
                        <div style="width:56px; height:56px; background:rgba(255,255,255,0.12); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 16px;">
                            <i class="fab fa-whatsapp" style="font-size:22px; color:#c8dedd;"></i>
                        </div>
                        <h6 style="font-weight:700; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:10px; color:#c8dedd;">WhatsApp</h6>
                        <a href="https://api.whatsapp.com/send?phone=3053560651" target="_blank" style="color:#fff; text-decoration:none; font-size:12.5px; font-weight:300; display:block; margin-bottom:4px; opacity:0.9;">305-356-0651 · Neurología</a>
                        <a href="https://api.whatsapp.com/send?phone=3159729333" target="_blank" style="color:#fff; text-decoration:none; font-size:12.5px; font-weight:300; display:block; margin-bottom:4px; opacity:0.9;">315-972-9333 · Terapias</a>
                        <a href="https://api.whatsapp.com/send?phone=3014701117" target="_blank" style="color:#fff; text-decoration:none; font-size:12.5px; font-weight:300; display:block; opacity:0.9;">301-470-1117</a>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">
                        <div style="width:56px; height:56px; background:rgba(255,255,255,0.12); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 16px;">
                            <i class="fa fa-map-marker-alt" style="font-size:20px; color:#c8dedd;"></i>
                        </div>
                        <h6 style="font-weight:700; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:10px; color:#c8dedd;">Dirección</h6>
                        <p style="color:#fff; font-size:13px; margin:0; opacity:0.9; font-weight:300;">Cll 14 #34-13, Pasto, Nariño</p>
                        <p style="color:#c8dedd; font-size:12px; margin:6px 0 0; font-weight:400;">Lun – Vie · 7:00am – 6:00pm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
            gap: 10px;
        }
        .fab-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-end;
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
        }
        /* Stagger: bottom (WhatsApp=child 5) appears first */
        .fab-wrapper:hover .fab-option:nth-child(1),
        .fab-wrapper.fab-open .fab-option:nth-child(1) { opacity:1; pointer-events:all; transform:translateY(0); transition-delay:0.20s; }
        .fab-wrapper:hover .fab-option:nth-child(2),
        .fab-wrapper.fab-open .fab-option:nth-child(2) { opacity:1; pointer-events:all; transform:translateY(0); transition-delay:0.15s; }
        .fab-wrapper:hover .fab-option:nth-child(3),
        .fab-wrapper.fab-open .fab-option:nth-child(3) { opacity:1; pointer-events:all; transform:translateY(0); transition-delay:0.10s; }
        .fab-wrapper:hover .fab-option:nth-child(4),
        .fab-wrapper.fab-open .fab-option:nth-child(4) { opacity:1; pointer-events:all; transform:translateY(0); transition-delay:0.05s; }
        .fab-wrapper:hover .fab-option:nth-child(5),
        .fab-wrapper.fab-open .fab-option:nth-child(5) { opacity:1; pointer-events:all; transform:translateY(0); transition-delay:0.00s; }
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
            overflow-y: auto;
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
            padding: 22px 28px 18px; border-radius: 18px 18px 0 0;
            color: #fff; position: sticky; top: 0; z-index: 2;
        }
        .llamamos-header h3 {
            font-size: 16px; font-weight: 800; margin: 0 36px 4px 0;
            font-family: 'Poppins', sans-serif;
        }
        .llamamos-header p { font-size: 12px; color: rgba(255,255,255,0.78); margin: 0; }
        .llamamos-close {
            position: absolute; top: 14px; right: 16px;
            background: rgba(255,255,255,0.15); border: none; color: #fff;
            width: 30px; height: 30px; border-radius: 50%; font-size: 15px;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.2s;
        }
        .llamamos-close:hover { background: rgba(255,255,255,0.30); }
        .llamamos-body { padding: 22px 26px 26px; }
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
            font-size: 12.5px; font-family: 'Poppins', sans-serif;
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
        .ll-field textarea { resize: vertical; min-height: 68px; }
        .ll-phone-row { display: flex; gap: 8px; }
        .ll-prefix-sel { width: 95px; flex-shrink: 0; }
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
        .ll-privacy a { color: #4a6b68; text-decoration: underline; cursor: pointer; }
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
        @media (max-width: 576px) {
            .llamamos-modal { border-radius: 14px; }
            .llamamos-body { padding: 18px 16px 22px; }
            .ll-row { flex-direction: column; gap: 0; }
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
                <a href="https://api.whatsapp.com/send?phone=3053560651&text=Hola%2C%20necesito%20informaci%C3%B3n" target="_blank" rel="noopener" class="fab-option-btn" style="background:#25d366;" title="WhatsApp">
                    <i class="fab fa-whatsapp" style="font-size:20px;"></i>
                </a>
            </div>

        </div>

        <!-- Botón principal: persona con auricular -->
        <button class="fab-main-btn" id="fabMainBtn" title="Contáctenos" aria-label="Menú de contacto">
            <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Cabeza -->
                <circle cx="18" cy="10.5" r="4.8" fill="white"/>
                <!-- Hombros -->
                <path d="M7.5 30c0-5.799 4.701-10.5 10.5-10.5S28.5 24.201 28.5 30" fill="white" opacity="0.88"/>
                <!-- Arco del auricular -->
                <path d="M10.2 12C10.2 7.194 13.698 3.5 18 3.5c4.302 0 7.8 3.694 7.8 8.5" stroke="white" stroke-width="1.9" fill="none" stroke-linecap="round"/>
                <!-- Orejera izquierda -->
                <rect x="8" y="11" width="3.4" height="5.4" rx="1.7" fill="white"/>
                <!-- Orejera derecha -->
                <rect x="24.6" y="11" width="3.4" height="5.4" rx="1.7" fill="white"/>
                <!-- Brazo del micrófono -->
                <path d="M9.8 16.2 Q8.8 21.5 13.8 23.2" stroke="white" stroke-width="1.4" fill="none" stroke-linecap="round"/>
                <!-- Micrófono -->
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
                            <select name="phone_prefix" class="ll-prefix-sel">
                                <option value="+57">🇨🇴 +57</option>
                                <option value="+1">🇺🇸 +1</option>
                                <option value="+52">🇲🇽 +52</option>
                                <option value="+34">🇪🇸 +34</option>
                                <option value="+51">🇵🇪 +51</option>
                                <option value="+58">🇻🇪 +58</option>
                                <option value="+55">🇧🇷 +55</option>
                                <option value="+54">🇦🇷 +54</option>
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
                        <select name="specialty">
                            <option value="">— Seleccione —</option>
                            <option value="neurologia">Neurología</option>
                            <option value="epileptologia">Epileptología</option>
                            <option value="psiquiatria">Psiquiatría</option>
                            <option value="neuropsicologia">Neuropsicología</option>
                            <option value="psicologia">Psicología</option>
                            <option value="terapia_fisica">Terapia Física</option>
                            <option value="electrodiagnostico">Electrodiagnóstico</option>
                            <option value="medicina_general">Medicina General</option>
                            <option value="clinica_sueno">Clínica del Sueño</option>
                        </select>
                    </div>

                    <!-- Privacidad -->
                    <div class="ll-privacy">
                        <input type="checkbox" id="llPrivacy" required>
                        <label for="llPrivacy">
                            He leído y acepto el <a onclick="llTogglePolicy(event)">tratamiento de mis datos personales</a>
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
        /* FAB: toggle on tap for touch devices */
        document.getElementById('fabMainBtn').addEventListener('click', function(e) {
            if (window.matchMedia('(hover: none)').matches) {
                document.getElementById('fabWrapper').classList.toggle('fab-open');
                e.stopPropagation();
            }
        });
        document.addEventListener('click', function(e) {
            var w = document.getElementById('fabWrapper');
            if (w && !w.contains(e.target)) w.classList.remove('fab-open');
        });

        /* Lo llamamos: open / close */
        function openLlamamos() {
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
            /* TODO: replace with real AJAX endpoint */
            setTimeout(function() {
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
                }, 2000);
            }, 1000);
        }
    </script>

    <!-- ===== COLABORADORES & ALIADOS ===== -->
    <style>
        .colabs-section { padding: 48px 0; background: #f8faf9; border-top: 1px solid #e2eded; overflow: hidden; }
        .colabs-title { text-align: center; font-size: 10.5px; font-weight: 700; letter-spacing: 2.5px; text-transform: uppercase; color: #94a3a2; margin-bottom: 30px; }
        .colabs-track-wrap { overflow: hidden; position: relative; }
        .colabs-track-wrap::before, .colabs-track-wrap::after { content: ''; position: absolute; top: 0; bottom: 0; width: 90px; z-index: 2; pointer-events: none; }
        .colabs-track-wrap::before { left: 0; background: linear-gradient(to right, #f8faf9, transparent); }
        .colabs-track-wrap::after  { right: 0; background: linear-gradient(to left,  #f8faf9, transparent); }
        .colabs-track { display: flex; align-items: center; width: max-content; animation: colabScroll 26s linear infinite; }
        .colabs-track:hover { animation-play-state: paused; }
        @keyframes colabScroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        .colab-item { width: 158px; height: 82px; margin: 0 16px; display: flex; align-items: center; justify-content: center; background: #fff; border-radius: 12px; border: 1px solid #e8f0ef; padding: 14px 18px; transition: box-shadow 0.25s, border-color 0.25s; flex-shrink: 0; }
        .colab-item:hover { box-shadow: 0 6px 22px rgba(74,107,104,0.12); border-color: #c8dedd; }
        .colab-ph { display: flex; flex-direction: column; align-items: center; gap: 6px; }
        .colab-ph-icon { width: 40px; height: 40px; border-radius: 9px; background: linear-gradient(135deg, #c8dedd, #eef5f4); display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 800; color: #4a6b68; }
        .colab-ph span { font-size: 8.5px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #94a3a2; }
        /* ===== BACK TO TOP ===== */
        #backToTop { position: fixed; bottom: 88px; left: 50%; transform: translateX(-50%) translateY(18px); z-index: 1041; background: var(--primary, #4a6b68); color: #fff; border: none; padding: 10px 24px; border-radius: 30px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; cursor: pointer; box-shadow: 0 4px 22px rgba(74,107,104,0.38); opacity: 0; pointer-events: none; transition: opacity 0.3s ease, transform 0.3s ease, box-shadow 0.2s; display: flex; align-items: center; gap: 7px; font-family: 'Poppins', sans-serif; white-space: nowrap; }
        #backToTop.show { opacity: 1; pointer-events: all; transform: translateX(-50%) translateY(0); }
        #backToTop:hover { background: var(--primary-dark, #2e4a47); box-shadow: 0 6px 28px rgba(74,107,104,0.5); }
    </style>

    <div class="colabs-section">
        <p class="colabs-title">Colaboradores &amp; Aliados </p>
        <div class="colabs-track-wrap">
            <div class="colabs-track">
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C1</div><span>FOMAG</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C2</div><span>PROINSALUD</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C3</div><span>PROTEGEMOS</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C4</div><span>PREVIRED</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C5</div><span>GLOBAL SALUD</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C6</div><span>MEDICA PREFERENCIAL</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C7</div><span>MULTISERVICIOS</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C1</div><span>FOMAG</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C2</div><span>PROINSALUD</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C3</div><span>PROTEGEMOS</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C4</div><span>PREVIRED</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C5</div><span>GLOBAL SALUD</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C6</div><span>MEDICA PREFERENCIAL</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C7</div><span>MULTISERVICIOS</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C1</div><span>FOMAG</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C2</div><span>PROINSALUD</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C3</div><span>PROTEGEMOS</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C4</div><span>PREVIRED</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C5</div><span>GLOBAL SALUD</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C6</div><span>MEDICA PREFERENCIAL</span></div></div>
                <div class="colab-item"><div class="colab-ph"><div class="colab-ph-icon">C7</div><span>MULTISERVICIOS</span></div></div>

            </div>
        </div>
    </div>

    <!-- Volver arriba -->
    <button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Volver arriba">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M12 19V5M5 12l7-7 7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver arriba
    </button>


    <footer style="background:#0f1f1e; color:#ccc; padding: 60px 0 0;">
        <div class="container">
            <div class="row g-5">
                <!-- Brand col -->
                <div class="col-lg-4">
                    <img src="{{ asset('assets/img/LOGO.png') }}" style="height:48px; filter:brightness(0) invert(1); margin-bottom:18px;" alt="Logo">
                    <p style="font-size:13px; color:#8aada9; line-height:1.8; margin-bottom:20px;">Instituto especializado en neurociencias con más de 8 años brindando atención de calidad en Pasto, Nariño.</p>
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        <a href="https://www.instagram.com/" target="_blank" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/" target="_blank" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.youtube.com/" target="_blank" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';"><i class="fab fa-youtube"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=3159729333" target="_blank" style="width:36px; height:36px; background:rgba(255,255,255,0.06); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#7fa8a4; text-decoration:none; font-size:14px; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68'; this.style.color='#fff';" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#7fa8a4';"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <!-- Links col -->
                <div class="col-lg-2 col-6">
                    <h6 style="color:#fff; font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:20px;">Institución</h6>
                    <ul style="list-style:none; padding:0; margin:0;">
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.inicio') }}#about" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">¿Quiénes somos?</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.aboutUs') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Portafolio</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('marcoLegal') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Marco Legal</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('estadosFinancieros') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Estados Financieros</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('articulos') }}" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Artículos y Revistas</a></li>
                        <li style="margin-bottom:10px;"><a href="{{ route('landing.inicio') }}#map" style="color:#8aada9; text-decoration:none; font-size:13px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">Contacto</a></li>
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
                        <span style="color:#8aada9; font-size:13px; font-weight:300;">Cll 14 #34-13, Pasto, Nariño</span>
                    </div>
                    <div style="display:flex; gap:10px; margin-bottom:10px; align-items:center;">
                        <i class="fa fa-clock" style="color:#7fa8a4; font-size:13px; flex-shrink:0;"></i>
                        <span style="color:#8aada9; font-size:13px; font-weight:300;">Lun – Vie · 7:00am – 6:00pm</span>
                    </div>
                    <!-- Correos por área -->
                    <p style="color:#5a7b78; font-size:10px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; margin:14px 0 8px;">Correos Institucionales</p>
                    @foreach([
                        ['Facturación',  'neurocienciasfactura@gmail.com'],
                        ['Jurídica',     'juridicoinnar@gmail.com'],
                        ['Contabilidad', 'contabilidadneurociencias@gmail.com'],
                        ['Sistemas',     'sistemasinnar1@gmail.com'],
                    ] as $area)
                    <div style="display:flex; gap:8px; margin-bottom:7px; align-items:flex-start;">
                        <i class="fa fa-envelope" style="color:#7fa8a4; font-size:11px; margin-top:3px; flex-shrink:0;"></i>
                        <div>
                            <span style="color:#5a7b78; font-size:10px; font-weight:700; text-transform:uppercase; display:block; line-height:1.2;">{{ $area[0] }}</span>
                            <a href="mailto:{{ $area[1] }}" style="color:#8aada9; text-decoration:none; font-size:11.5px; font-weight:300; transition:color 0.2s;" onmouseover="this.style.color='#c8dedd';" onmouseout="this.style.color='#8aada9';">{{ $area[1] }}</a>
                        </div>
                    </div>
                    @endforeach
                    <a href="#" onclick="openContactModal(event)" style="display:inline-block; margin-top:12px; background: rgba(74,107,104,0.5); border: 1px solid rgba(74,107,104,0.8); color:#c8dedd; padding:9px 20px; border-radius:25px; font-size:11px; font-weight:600; letter-spacing:1px; text-transform:uppercase; text-decoration:none; transition:all 0.3s;" onmouseover="this.style.background='#4a6b68';" onmouseout="this.style.background='rgba(74,107,104,0.5)';">
                        Enviar PQRS
                    </a>
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

    <!-- Modal de Contacto PQRS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <div id="contactModal" class="contact-modal">
        <div class="contact-modal-content">
            <button class="contact-modal-close" onclick="closeContactModal()">&times;</button>
            <h2 style="margin-bottom: 20px; text-align: center; color: #333;">CONTACTA CON NOSOTROS</h2>
            <p style="text-align: center; margin-bottom: 20px; color: #666; font-size: 14px;">Envía tus peticiones, quejas o solicitudes</p>

            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 15px; font-size: 13px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <script>
                    setTimeout(function() {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000"
                        };
                        toastr.success('{{ session('success') }}', '¡Éxito!');
                        // Cerrar el modal después del éxito
                        setTimeout(function() {
                            closeContactModal();
                        }, 1000);
                    }, 300);
                </script>
            @endif

            @if (session('error'))
                <script>
                    setTimeout(function() {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000"
                        };
                        toastr.error('{{ session('error') }}', 'Error');
                    }, 300);
                </script>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                @csrf

                <div style="margin-bottom: 15px;">
                    <label for="modal-name" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px;">Nombre *</label>
                    <input type="text" id="modal-name" name="name" value="{{ old('name') }}" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 13px; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="modal-email" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px;">Correo *</label>
                    <input type="email" id="modal-email" name="email" value="{{ old('email') }}" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 13px; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="modal-phone" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px;">Teléfono</label>
                    <input type="text" id="modal-phone" name="phone" value="{{ old('phone') }}" inputmode="numeric" placeholder="Ej: 3001234567"
                        style="width: 100%; padding: 10px; border: 1px solid {{ $errors->has('phone') ? '#dc3545' : '#ddd' }}; border-radius: 5px; font-size: 13px; box-sizing: border-box;">
                    @if ($errors->has('phone'))
                        <span style="color: #dc3545; font-size: 12px; margin-top: 3px; display: block;">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="modal-type" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px;">Tipo *</label>
                    <select id="modal-type" name="type" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 13px; box-sizing: border-box;">
                        <option value="">Selecciona una opción</option>
                        <option value="peticion" {{ old('type') === 'peticion' ? 'selected' : '' }}>Petición</option>
                        <option value="queja" {{ old('type') === 'queja' ? 'selected' : '' }}>Queja</option>
                        <option value="solicitud" {{ old('type') === 'solicitud' ? 'selected' : '' }}>Solicitud</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="modal-subject" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px;">Asunto *</label>
                    <input type="text" id="modal-subject" name="subject" value="{{ old('subject') }}" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 13px; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="modal-message" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px;">Mensaje *</label>
                    <textarea id="modal-message" name="message" rows="4" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 13px; font-family: Arial, sans-serif; box-sizing: border-box; resize: none;">{{ old('message') }}</textarea>
                </div>

                <div style="text-align: center;">
                    <button type="submit" style="background-color: #627371; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 14px; font-weight: bold; cursor: pointer; transition: background-color 0.3s; width: 100%;">
                        ENVIAR
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Estilos para el Modal */
        .contact-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease-in-out;
        }

        .contact-modal.show {
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        .contact-modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease-in-out;
            position: relative;
        }

        .contact-modal-close {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #999;
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .contact-modal-close:hover {
            color: #333;
            background-color: #f0f0f0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 600px) {
            .contact-modal-content {
                padding: 20px;
                max-width: 95%;
            }

            .contact-modal-content h2 {
                font-size: 18px !important;
            }
        }
    </style>

    <script>
        function openContactModal(e) {
            if (e) e.preventDefault();
            document.getElementById('contactModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal al hacer click fuera de él
        window.onclick = function(event) {
            var modal = document.getElementById('contactModal');
            if (event.target === modal) {
                closeContactModal();
            }
        }

        // Cerrar modal con tecla ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeContactModal();
            }
        });

        // Validar teléfono en el modal - solo números
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('modal-phone');
            
            // Bloquear caracteres no numéricos al escribir
            phoneInput.addEventListener('keypress', function(e) {
                const char = String.fromCharCode(e.which);
                if (!/[0-9]/.test(char)) {
                    e.preventDefault();
                    return false;
                }
            });

            // Eliminar caracteres no numéricos al soltar la tecla
            phoneInput.addEventListener('keyup', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Eliminar caracteres no numéricos al cambiar el valor
            phoneInput.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Bloquear pegado de caracteres no numéricos
            phoneInput.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedText = (e.clipboardData || window.clipboardData).getData('text');
                const numbersOnly = pastedText.replace(/[^0-9]/g, '');
                this.value = numbersOnly;
                return false;
            });

            // Bloquear drag and drop
            phoneInput.addEventListener('drop', function(e) {
                e.preventDefault();
                return false;
            });
        });
    </script>
</body>

</html>