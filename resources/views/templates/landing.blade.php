@extends('layout.app')
@section('title', 'INICIO')
@section('content')

<style>
    body { padding-top: var(--navbar-h, 80px); }

    /* =============================================
       HERO SECTION — Full screen immersive
    ============================================= */
    .hero-section {
        position: relative;
        overflow: hidden;
        min-height: calc(100vh - 80px);
    }
    .hero-slide {
        display: none;
        min-height: calc(100vh - 80px);
        position: relative;
        align-items: stretch;
    }
    .hero-slide.active { display: flex; }

    /* LEFT PANEL */
    .hero-left {
        width: 42%;
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        padding: 70px 55px 70px 65px;
        position: relative;
        z-index: 2;
        overflow: hidden;
    }
    .hero-left::before {
        content: '';
        position: absolute;
        bottom: -80px; right: -60px;
        width: 280px; height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,0.06);
        pointer-events: none;
    }
    .hero-left::after {
        content: '';
        position: absolute;
        top: -60px; left: -40px;
        width: 180px; height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.04);
        pointer-events: none;
    }
    .hero-left-content { position: relative; z-index: 1; }
    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.7);
        margin-bottom: 22px;
    }
    .hero-eyebrow::before {
        content: '';
        display: block;
        width: 30px; height: 2px;
        background: rgba(255,255,255,0.5);
        border-radius: 2px;
    }
    .hero-title {
        font-size: clamp(30px, 3.2vw, 54px);
        font-weight: 900;
        line-height: 1.1;
        color: #ffffff;
        margin-bottom: 22px;
        letter-spacing: -0.5px;
    }
    .hero-title em {
        font-style: normal;
        color: rgba(200,222,221,0.9);
    }
    .hero-desc {
        font-size: 14.5px;
        line-height: 1.75;
        color: rgba(255,255,255,0.72);
        margin-bottom: 40px;
        font-weight: 300;
        max-width: 380px;
    }
    .hero-btn-group { display: flex; gap: 14px; flex-wrap: wrap; }
    .hero-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        color: #2e4a47;
        padding: 14px 30px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    .hero-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.22);
        color: #2e4a47;
    }
    .hero-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: rgba(255,255,255,0.85);
        padding: 14px 28px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        border: 1.5px solid rgba(255,255,255,0.35);
        transition: all 0.3s ease;
    }
    .hero-btn-secondary:hover {
        background: rgba(255,255,255,0.12);
        color: #fff;
        border-color: rgba(255,255,255,0.6);
    }

    /* RIGHT PHOTO PANEL */
    .hero-right {
        width: 58%;
        min-height: calc(85vh - 80px);
        position: relative;
        overflow: hidden;
    }
    .hero-right img {
        width: 100%; height: 100%;
        object-fit: cover;
        object-position: center top;
        transition: transform 8s ease;
    }
    .hero-slide.active .hero-right img { transform: scale(1.04); }
    .hero-right::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.25) 0%, transparent 40%),
                    linear-gradient(to top, rgba(0,0,0,0.3) 0%, transparent 40%);
    }

    /* Diagonal blend */
    .hero-diagonal {
        position: absolute;
        left: calc(42% - 40px);
        top: 0; bottom: 0;
        width: 80px;
        z-index: 5;
        pointer-events: none;
        overflow: hidden;
    }
    .hero-diagonal svg { width: 100%; height: 100%; }

    /* Scroll indicator */
    .hero-scroll {
        position: absolute;
        bottom: 30px;
        left: calc(42% / 2);
        transform: translateX(-50%);
        z-index: 20;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        color: rgba(255,255,255,0.6);
        font-size: 9px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .hero-scroll-line {
        width: 1px; height: 50px;
        background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.6));
        animation: scrollPulse 2s ease-in-out infinite;
    }
    @keyframes scrollPulse {
        0%, 100% { transform: scaleY(1); opacity: 0.7; }
        50% { transform: scaleY(0.6); opacity: 0.3; }
    }

    /* Vigilado badge */
    .hero-vigilado {
        position: absolute;
        bottom: 28px; right: 28px;
        z-index: 10;
        background: rgba(255,255,255,0.92);
        backdrop-filter: blur(8px);
        padding: 8px 14px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    .hero-vigilado img { height: 30px; }

    /* Decorative ring */
    .hero-deco-circle {
        position: absolute;
        top: 30px; right: 30px;
        z-index: 10;
        width: 90px; height: 90px;
        border: 2px solid rgba(200,222,221,0.45);
        border-radius: 50%;
    }
    .hero-deco-circle::before {
        content: '';
        position: absolute;
        inset: 8px;
        border: 1px solid rgba(200,222,221,0.3);
        border-radius: 50%;
    }

    /* Controls */
    .hero-prev, .hero-next {
        position: absolute;
        bottom: 32px;
        z-index: 20;
        background: rgba(255,255,255,0.14);
        backdrop-filter: blur(6px);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.28);
        width: 44px; height: 44px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: all 0.25s;
    }
    .hero-prev:hover, .hero-next:hover { background: rgba(255,255,255,0.28); }
    .hero-prev { left: calc(42% - 120px); }
    .hero-next { left: calc(42% - 68px); }
    .hero-dots {
        position: absolute;
        bottom: 44px;
        left: calc(42% - 172px);
        z-index: 20;
        display: flex; gap: 7px; align-items: center;
    }
    .hero-dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        cursor: pointer;
        transition: all 0.3s;
    }
    .hero-dot.active {
        background: #fff;
        width: 22px;
        border-radius: 3px;
    }
    .hero-counter {
        position: absolute;
        top: 30px; right: 60px;
        z-index: 20;
        color: rgba(255,255,255,0.55);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 2px;
    }
    .hero-counter strong { color: #fff; font-size: 18px; font-weight: 800; }

    /* =============================================
       STATS BAR
    ============================================= */
    .stats-bar { background: #fff; padding: 0; }
    .stats-inner {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border-bottom: 3px solid #4a6b68;
    }
    .stat-item {
        padding: 38px 30px;
        text-align: center;
        position: relative;
        border-right: 1px solid #eaf2f1;
        transition: background 0.3s;
    }
    .stat-item:last-child { border-right: none; }
    .stat-item::before {
        content: '';
        position: absolute;
        top: 0; left: 50%; transform: translateX(-50%);
        width: 0; height: 3px;
        background: #4a6b68;
        transition: width 0.5s ease;
    }
    .stat-item:hover { background: #f7fafa; }
    .stat-item:hover::before { width: 60%; }
    .stat-number {
        font-size: clamp(32px, 3.5vw, 52px);
        font-weight: 900;
        color: #4a6b68;
        line-height: 1;
        margin-bottom: 8px;
        display: block;
    }
    .stat-label {
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #94a3a2;
    }

    /* =============================================
       SECTION HEADINGS
    ============================================= */
    .section-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #4a6b68;
        margin-bottom: 14px;
    }
    .section-eyebrow::before {
        content: '';
        display: block;
        width: 28px; height: 2px;
        background: #4a6b68;
        border-radius: 2px;
    }
    .section-heading {
        font-size: clamp(26px, 3vw, 42px);
        font-weight: 800;
        color: #0f1f1e;
        line-height: 1.15;
        letter-spacing: -0.3px;
        margin-bottom: 18px;
    }
    .section-subtext {
        font-size: 15px;
        color: #6b8080;
        line-height: 1.8;
        font-weight: 300;
    }

    /* =============================================
       SERVICES
    ============================================= */
    .services-section {
        padding: 100px 0;
        background: #f7fafa;
        overflow: hidden;
    }
    .service-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 2px 20px rgba(0,0,0,0.04);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(74,107,104,0.16);
        color: inherit;
    }
    .service-card .card-img {
        height: 220px;
        overflow: hidden;
        position: relative;
    }
    .service-card .card-img img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .service-card:hover .card-img img { transform: scale(1.08); }
    .service-card .card-img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(15,31,30,0.55) 0%, transparent 55%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    .service-card:hover .card-img-overlay { opacity: 1; }
    .service-card .card-num {
        position: absolute;
        top: 18px; left: 20px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        color: rgba(255,255,255,0.9);
        background: rgba(74,107,104,0.75);
        backdrop-filter: blur(6px);
        padding: 4px 10px;
        border-radius: 20px;
        z-index: 2;
    }
    .service-card .card-body-custom {
        padding: 28px 26px 26px;
        position: relative;
    }
    .service-card .card-body-custom::before {
        content: '';
        position: absolute;
        top: 0; left: 26px;
        width: 40px; height: 3px;
        background: #4a6b68;
        border-radius: 0 0 2px 2px;
        transition: width 0.3s ease;
    }
    .service-card:hover .card-body-custom::before { width: 80px; }
    .service-card h5 {
        font-size: 15px;
        font-weight: 800;
        color: #0f1f1e;
        margin-bottom: 10px;
    }
    .service-card p {
        font-size: 13.5px;
        color: #6b8080;
        line-height: 1.75;
        margin: 0;
        font-weight: 300;
    }
    .service-card .card-arrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 16px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #4a6b68;
        transition: gap 0.2s;
    }
    .service-card:hover .card-arrow { gap: 12px; }

    /* =============================================
       SPECIALTIES STRIP
    ============================================= */
    .specialties-strip {
        background: #0f1f1e;
        padding: 55px 0;
    }
    .specialty-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 0 35px;
        border-right: 1px solid rgba(255,255,255,0.07);
    }
    .specialty-item:last-child { border-right: none; }
    .specialty-icon {
        width: 50px; height: 50px;
        background: rgba(74,107,104,0.35);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #c8dedd;
        font-size: 19px;
        flex-shrink: 0;
    }
    .specialty-text h6 {
        font-size: 13px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 3px;
    }
    .specialty-text p { font-size: 11.5px; color: #6b8080; margin: 0; font-weight: 300; }

    /* =============================================
       ABOUT
    ============================================= */
    .about-section {
        padding: 110px 0;
        background: #fff;
        overflow: hidden;
    }
    .about-img-frame {
        position: relative;
        padding-bottom: 40px;
        padding-right: 30px;
    }
    .about-img-deco {
        position: absolute;
        bottom: 0; right: 0;
        width: 60%; aspect-ratio: 1;
        background: #eef5f4;
        border-radius: 20px;
        z-index: 0;
    }
    .about-img-main {
        width: 100%;
        border-radius: 20px;
        display: block;
        box-shadow: 0 20px 60px rgba(74,107,104,0.18);
        position: relative;
        z-index: 2;
    }
    .about-badge-box {
        position: absolute;
        bottom: 30px; right: 0;
        z-index: 5;
        background: #4a6b68;
        color: #fff;
        padding: 22px 26px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(74,107,104,0.4);
    }
    .about-badge-box .num { display: block; font-size: 40px; font-weight: 900; line-height: 1; }
    .about-badge-box .lbl { font-size: 10px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; opacity: 0.8; margin-top: 4px; }
    .about-content { padding-left: 50px; }
    .about-content p { font-size: 15px; color: #567070; line-height: 1.9; margin-bottom: 16px; font-weight: 300; }
    .about-checks {
        list-style: none; padding: 0; margin: 28px 0 36px;
        display: grid; grid-template-columns: 1fr 1fr; gap: 12px 20px;
    }
    .about-checks li {
        font-size: 13.5px; color: #2c3e3d;
        display: flex; align-items: center; gap: 10px; font-weight: 500;
    }
    .check-icon {
        width: 22px; height: 22px;
        background: #c8dedd;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-size: 10px;
        color: #2e4a47;
        font-weight: 900;
    }

    /* =============================================
       CTA BANNER
    ============================================= */
    .cta-banner {
        position: relative;
        padding: 100px 0;
        overflow: hidden;
        background: linear-gradient(135deg, #2e4a47 0%, #4a6b68 50%, #5e8582 100%);
    }
    .cta-neural {
        position: absolute;
        inset: 0;
        opacity: 0.12;
        pointer-events: none;
    }
    .cta-banner .inner { position: relative; z-index: 2; text-align: center; }
    .cta-banner .section-eyebrow { color: rgba(255,255,255,0.55); justify-content: center; }
    .cta-banner h2 {
        font-size: clamp(24px, 3vw, 44px);
        font-weight: 900; color: #fff;
        margin-bottom: 16px;
        letter-spacing: -0.5px;
        line-height: 1.15;
    }
    .cta-banner > .inner p { font-size: 16px; color: rgba(255,255,255,0.68); margin-bottom: 44px; font-weight: 300; }
    .btn-white-lg {
        display: inline-flex; align-items: center; gap: 8px;
        background: #fff; color: #2e4a47;
        padding: 16px 38px; border-radius: 40px;
        font-weight: 800; font-size: 13px; letter-spacing: 1px;
        text-transform: uppercase; text-decoration: none;
        margin: 0 8px 12px;
        transition: all 0.3s ease;
        box-shadow: 0 6px 30px rgba(0,0,0,0.18);
    }
    .btn-white-lg:hover { transform: translateY(-3px); box-shadow: 0 12px 40px rgba(0,0,0,0.25); color: #2e4a47; }
    .btn-ghost-lg {
        display: inline-flex; align-items: center; gap: 8px;
        background: transparent; color: rgba(255,255,255,0.88);
        border: 2px solid rgba(255,255,255,0.32);
        padding: 14px 36px; border-radius: 40px;
        font-weight: 700; font-size: 13px; letter-spacing: 1px;
        text-transform: uppercase; text-decoration: none;
        margin: 0 8px 12px;
        transition: all 0.3s ease;
    }
    .btn-ghost-lg:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.65); color: #fff; transform: translateY(-2px); }

    /* =============================================
       RESPONSIVE
    ============================================= */
    @media (max-width: 991px) {
        .hero-slide { flex-direction: column; min-height: auto; }
        .hero-left { width: 100%; min-height: auto; padding: 55px 30px 50px; }
        .hero-right { width: 100%; min-height: 60vw; }
        .hero-diagonal { display: none; }
        .hero-scroll { display: none; }
        .hero-prev { left: 20px; bottom: 20px; }
        .hero-next { left: 74px; bottom: 20px; }
        .hero-dots { left: 130px; bottom: 32px; }
        .hero-counter { right: 20px; }
        .stats-inner { grid-template-columns: repeat(2, 1fr); }
        .stat-item:nth-child(2n) { border-right: none; }
        .stat-item { border-bottom: 1px solid #eaf2f1; }
        .about-content { padding-left: 0; margin-top: 40px; }
        .about-checks { grid-template-columns: 1fr; }
        .specialty-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); padding: 20px 0; }
    }
    @media (max-width: 575px) {
        .hero-left { padding: 45px 22px; }
        .hero-title { font-size: 30px; }
        .hero-prev { left: 15px; }
        .hero-next { left: 65px; }
        .hero-dots { display: none; }
    }

    /* ===== TEAM ===== */
    .team-section { padding: 100px 0; background: var(--white); }
    .team-card { background:#fff; border-radius:20px; overflow:hidden; box-shadow:0 6px 30px rgba(74,107,104,0.09); transition:transform 0.35s,box-shadow 0.35s; height:100%; }
    .team-card:hover { transform:translateY(-8px); box-shadow:0 18px 50px rgba(74,107,104,0.18); }
    .team-photo { height:220px; display:flex; align-items:center; justify-content:center; background:linear-gradient(150deg,var(--primary-dark) 0%,var(--primary) 100%); position:relative; overflow:hidden; }
    .team-photo::after { content:''; position:absolute; bottom:-20px; left:50%; transform:translateX(-50%); width:100px; height:40px; background:#fff; border-radius:50%; box-shadow:0 -6px 0 #fff; }
    .team-avatar { width:100px; height:100px; border-radius:50%; border:4px solid rgba(255,255,255,0.3); display:flex; align-items:center; justify-content:center; background:rgba(255,255,255,0.15); font-size:36px; font-weight:900; color:#fff; position:relative; z-index:1; }
    .team-info { padding:32px 28px 28px; text-align:center; }
    .team-info .tag { display:inline-block; background:var(--primary-ultra); color:var(--primary); font-size:10px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; padding:4px 14px; border-radius:20px; margin-bottom:12px; }
    .team-info h4 { font-size:17px; font-weight:800; color:var(--dark); margin-bottom:6px; }
    .team-info .exp { font-size:13px; color:var(--text-light); margin-bottom:12px; }
    .team-info p { font-size:13px; color:#666; line-height:1.7; margin:0; }

    /* ===== TESTIMONIALS ===== */
    .testimonials-section { padding:100px 0; background:var(--primary-ultra); }
    .testi-card { background:var(--white); border-radius:18px; padding:36px 32px; box-shadow:0 4px 20px rgba(74,107,104,0.08); height:100%; position:relative; }
    .testi-card::before { content:'\201C'; position:absolute; top:20px; right:28px; font-size:72px; font-weight:900; color:var(--primary-pale); line-height:1; font-family:Georgia,serif; }
    .testi-stars { color:#f5a623; font-size:14px; letter-spacing:2px; margin-bottom:18px; }
    .testi-text { font-size:14px; color:#555; line-height:1.8; margin-bottom:24px; font-style:italic; }
    .testi-author { display:flex; align-items:center; gap:14px; }
    .testi-avatar { width:46px; height:46px; border-radius:50%; background:linear-gradient(135deg,var(--primary) 0%,var(--primary-light) 100%); display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:800; color:#fff; flex-shrink:0; }
    .testi-name { font-size:14px; font-weight:700; color:var(--dark); }
    .testi-detail { font-size:12px; color:var(--text-light); }

    /* ===== FAQ ===== */
    .faq-section { padding:100px 0; background:var(--white); }
    .faq-accordion .accordion-item { border:none; border-bottom:1px solid var(--primary-pale); background:transparent; }
    .faq-accordion .accordion-button { background:transparent; font-size:14px; font-weight:700; color:var(--dark); padding:22px 0; box-shadow:none; }
    .faq-accordion .accordion-button:not(.collapsed) { color:var(--primary); background:transparent; }
    .faq-accordion .accordion-body { padding:0 0 22px; font-size:14px; color:#666; line-height:1.8; }
</style>

<!-- =============================================
     HERO SECTION
============================================= -->
<section class="hero-section" id="top">

    <!-- SLIDE 1 -->
    <div class="hero-slide active" data-slide="0">
        <div class="hero-left" style="background: linear-gradient(150deg, #2e4a47 0%, #4a6b68 100%);">
            <div class="hero-left-content">
                <span class="hero-eyebrow">Pasto, Nariño · Colombia</span>
                <h1 class="hero-title">
                    Instituto<br>Neurociencias,<br>
                    <em>Su salud, nuestra prioridad</em>
                </h1>
                <p class="hero-desc">
                    Atención especializada en neurología y epileptología, con tecnología de diagnóstico avanzada y un equipo médico comprometido con su bienestar.
                </p>
                <div class="hero-btn-group">
                    <a href="#about" class="hero-btn-primary">
                        Conózcanos
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ route('landing.inicio') }}#map" class="hero-btn-secondary">Solicitar Cita</a>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <img src="{{ asset('assets/img/SEDE.jpg') }}" alt="Instituto Neurociencias de Nariño">
            <div class="hero-deco-circle"></div>
            <div class="hero-vigilado">
                <img src="{{ asset('assets/img/SuperS.png') }}" alt="Vigilado Supersalud">
            </div>
        </div>
        <div class="hero-diagonal">
            <svg viewBox="0 0 80 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                <polygon points="0,0 80,0 0,100" fill="#4a6b68"/>
            </svg>
        </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="hero-slide" data-slide="1">
        <div class="hero-left" style="background: linear-gradient(150deg, #1a2e2c 0%, #2e4a47 100%);">
            <div class="hero-left-content">
                <span class="hero-eyebrow">Equipo Electrodiagnóstico</span>
                <h1 class="hero-title">
                    Diagnóstico<br>preciso para<br>
                    <em>su bienestar</em>
                </h1>
                <p class="hero-desc">
                    EEG, polisomnografía, videotelemetría. Tecnología de punta para diagnósticos certeros que guían el mejor tratamiento.
                </p>
                <div class="hero-btn-group">
                    <a href="{{ route('landing.electrodiagnosticos') }}" class="hero-btn-primary">
                        Ver servicios
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ route('landing.inicio') }}#map" class="hero-btn-secondary">Solicitar Cita</a>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <img src="{{ asset('assets/img/EEG.jpg') }}" alt="Electrodiagnósticos">
            <div class="hero-deco-circle"></div>
            <div class="hero-vigilado">
                <img src="{{ asset('assets/img/SuperS.png') }}" alt="Vigilado Supersalud">
            </div>
        </div>
        <div class="hero-diagonal">
            <svg viewBox="0 0 80 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                <polygon points="0,0 80,0 0,100" fill="#2e4a47"/>
            </svg>
        </div>
    </div>

    <!-- SLIDE 3 -->
    <div class="hero-slide" data-slide="2">
        <div class="hero-left" style="background: linear-gradient(150deg, #3d6360 0%, #5e8582 100%);">
            <div class="hero-left-content">
                <span class="hero-eyebrow">FISIOTERAPIA</span>
                <h1 class="hero-title">
                    Terapias<br>para <em>cada</em><br>paciente
                </h1>
                <p class="hero-desc">
                    Terapia integral, ondas de choque, terapias de tracción y más. Recupere su calidad de vida con el acompañamiento de nuestras especialistas.
                </p>
                <div class="hero-btn-group">
                    <a href="{{ route('landing.tiposTerapia') }}" class="hero-btn-primary">
                        Ver terapias
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ route('landing.inicio') }}#map" class="hero-btn-secondary">Solicitar Cita</a>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <img src="{{ asset('assets/img/fisio.webp') }}" alt="Terapias y Neurorehabilitación">
            <div class="hero-deco-circle"></div>
            <div class="hero-vigilado">
                <img src="{{ asset('assets/img/SuperS.png') }}" alt="Vigilado Supersalud">
            </div>
        </div>
        <div class="hero-diagonal">
            <svg viewBox="0 0 80 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                <polygon points="0,0 80,0 0,100" fill="#5e8582"/>
            </svg>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="hero-scroll">
        <div class="hero-scroll-line"></div>
        <span>Deslizar hacia abajo</span>
    </div>

    <!-- Slide counter -->
    <div class="hero-counter">
        <strong id="heroCurrentNum">01</strong> / 03
    </div>

    <!-- Controls -->
    <button class="hero-prev" id="heroPrev" aria-label="Anterior">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M19 12H5M12 19l-7-7 7-7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <button class="hero-next" id="heroNext" aria-label="Siguiente">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <div class="hero-dots" id="heroDots">
        <div class="hero-dot active" data-idx="0"></div>
        <div class="hero-dot" data-idx="1"></div>
        <div class="hero-dot" data-idx="2"></div>
    </div>
</section>

<!-- =============================================
     STATS BAR
============================================= -->
<section class="stats-bar">
    <div class="container-fluid px-0">
        <div class="stats-inner">
            <div class="stat-item fade-up">
                <span class="stat-number">+8</span>
                <span class="stat-label">Años de Experiencia</span>
            </div>
            <div class="stat-item fade-up">
                <span class="stat-number">9</span>
                <span class="stat-label">Especialistas</span>
            </div>
            <div class="stat-item fade-up">
                <span class="stat-number">+20</span>
                <span class="stat-label">Servicios</span>
            </div>
            <div class="stat-item fade-up">
                <span class="stat-number">#1</span>
                <span class="stat-label">En Nariño</span>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     SERVICES SECTION
============================================= -->
<section class="services-section" id="services">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7">
                <span class="section-eyebrow fade-up">Ofrecemos un</span>
                <h2 class="section-heading fade-up">Portafolio de<br>Servicios</h2>
                <p class="section-subtext fade-up">Con atención especializada en neurología, epileptología y fisioterapia con enfoque humano, personalizado y basado en evidencia científica.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-up">
                <a href="{{ route('landing.tiposConsulta') }}" class="service-card">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/neu.jpg') }}" alt="Tipos de Consulta">
                        <div class="card-img-overlay"></div>
                        <span class="card-num">01</span>
                    </div>
                    <div class="card-body-custom">
                        <h5>Tipos de Consulta</h5>
                        <p>Consulta especializada en neurología y epileptología. Diagnóstico y manejo integral de trastornos del sistema nervioso.</p>
                        <span class="card-arrow">Ver más →</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <a href="{{ route('landing.tiposTerapia') }}" class="service-card">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/fisio.webp') }}" alt="Tipos de Terapia">
                        <div class="card-img-overlay"></div>
                        <span class="card-num">02</span>
                    </div>
                    <div class="card-body-custom">
                        <h5>Tipos de Terapia</h5>
                        <p>Terapia ingeral, ondas de choque, terapias de tracción...</p>
                        <span class="card-arrow">Ver más →</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <a href="{{ route('landing.electrodiagnosticos') }}" class="service-card">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/EEG.jpg') }}" alt="Electrodiagnósticos">
                        <div class="card-img-overlay"></div>
                        <span class="card-num">03</span>
                    </div>
                    <div class="card-body-custom">
                        <h5>Electrodiagnósticos</h5>
                        <p>Electroencefalograma, polisomnografía y estudios de sueño con tecnología de diagnóstico avanzada.</p>
                        <span class="card-arrow">Ver más →</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     SPECIALTIES DARK STRIP
============================================= -->
<section class="specialties-strip">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-brain"></i></div>
                    <div class="specialty-text">
                        <h6>Neurología</h6>
                        <p>Consulta especializada</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-heartbeat"></i></div>
                    <div class="specialty-text">
                        <h6>Epileptología</h6>
                        <p>Diagnóstico y manejo</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-wave-square"></i></div>
                    <div class="specialty-text">
                        <h6>Electrodiagnósticos</h6>
                        <p>EEG, EMG, Polisomnografía</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-hands-helping"></i></div>
                    <div class="specialty-text">
                        <h6>Fisioterapia</h6>
                        <p>Terapias integrales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- =============================================
     EQUIPO MÉDICO
============================================= -->
<section class="team-section" id="equipo">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-eyebrow" style="justify-content:center;">Nuestros Especialistas</span>
            <h2 class="section-heading" style="text-align:center;">Equipo Médico</h2>
            <p class="section-subtext" style="max-width:520px; margin:0 auto;">Profesionales altamente capacitados, comprometidos con su salud y bienestar.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo"><div class="team-avatar">JZ</div></div>
                    <div class="team-info">
                        <span class="tag">Neurología</span>
                        <h4>Dr. José A. Zambrano A.</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Neurólogo · 12 años de experiencia</p>
                        <p>Especialista en neurología clínica y epileptología. Certificado por el Tribunal Médico de Colombia, con formación internacional en enfermedades neurodegenerativas.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo"><div class="team-avatar">JZL</div></div>
                    <div class="team-info">
                        <span class="tag">Epileptología</span>
                        <h4>Dr. José A. Zambrano León</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Epileptólogo · 9 años de experiencia</p>
                        <p>Especialista en epilepsia, con posgrado en neurofisiología clínica. Responsable de los estudios electrodiagnósticos, EEG y potenciales evocados.</p>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo"><div class="team-avatar">ML</div></div>
                    <div class="team-info">
                        <span class="tag">Medicina General</span>
                        <h4>Dra. María A. León R.</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Médica · Medicina General</p>
                        <p>Médica especializada en -----</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo" style="background:linear-gradient(150deg,#1a5276,#2980b9);"><div class="team-avatar">AG</div></div>
                    <div class="team-info">
                        <span class="tag" style="background:#e8f4fd;color:#1a5276;">Fisioterapia</span>
                        <h4>Dra. Adriana Gelpud</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Fisioterapeuta · Terapia Física</p>
                        <p>Especialista en fisioterapia y neurorehabilitación, dedicada a la recuperación funcional de pacientes neurológicos de todas las edades.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo" style="background:linear-gradient(150deg,#1a5276,#2980b9);"><div class="team-avatar">TR</div></div>
                    <div class="team-info">
                        <span class="tag" style="background:#e8f4fd;color:#1a5276;">Fisioterapia</span>
                        <h4>Dra. Teresa Rodríguez</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Fisioterapeuta · Terapia Física</p>
                        <p>Profesional en fisioterapia con enfoque en terapia física integral, rehabilitación pulmonar y manejo del dolor del sistema osteomuscular.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo" style="background:linear-gradient(150deg,#1a5276,#2980b9);"><div class="team-avatar">KQ</div></div>
                    <div class="team-info">
                        <span class="tag" style="background:#e8f4fd;color:#1a5276;">Fisioterapia</span>
                        <h4>Dra. Karen Quiroz</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Fisioterapeuta · Terapia Física</p>
                        <p>Fisioterapeuta especializada en modalidades mecánicas y eléctricas de terapia, con énfasis en rehabilitación de piso pélvico y tracción terapéutica.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo" style="background:linear-gradient(150deg,#1a5276,#2980b9);"><div class="team-avatar">SL</div></div>
                    <div class="team-info">
                        <span class="tag" style="background:#e8f4fd;color:#1a5276;">PSICÓLOGO</span>
                        <h4>Dr. Sebastian G. Lagos</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Psicólogo · Psicología</p>
                        <p>Psicólogo especializado en -----.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo" style="background:linear-gradient(150deg,#1a5276,#2980b9);"><div class="team-avatar">NP</div></div>
                    <div class="team-info">
                        <span class="tag" style="background:#e8f4fd;color:#1a5276;">Neuropsicología</span>
                        <h4>Dra. Nathalia Portilla</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Neuropsicóloga · Neuropsicología</p>
                        <p>Neuropsicóloga especializada en -----.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-up">
                <div class="team-card">
                    <div class="team-photo" style="background:linear-gradient(150deg,#1a5276,#2980b9);"><div class="team-avatar">PSQ</div></div>
                    <div class="team-info">
                        <span class="tag" style="background:#e8f4fd;color:#1a5276;">Psiquiatra</span>
                        <h4>Dra. ----</h4>
                        <p class="exp"><i class="fas fa-star" style="color:var(--primary);font-size:11px;"></i>&nbsp; Psiquiatra · Psiquiatría</p>
                        <p>Psiquiatra especializada en -----.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     TESTIMONIOS
============================================= -->
<section class="testimonials-section" id="testimonios">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="section-eyebrow" style="justify-content:center;">Lo que dicen nuestros pacientes</span>
            <h2 class="section-heading" style="text-align:center;">Testimonios</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">&ldquo;Llevaba años sin un diagnóstico claro. Aquí me atendieron con paciencia, encontraron la causa de mis crisis y hoy llevo 8 meses sin episodios. Un cambio de vida total.&rdquo;</p>
                    <div class="testi-author">
                        <div class="testi-avatar">CM</div>
                        <div><div class="testi-name">Carmen Muñoz</div><div class="testi-detail">Paciente de Neurología · Pasto</div></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">&ldquo;Mi hijo de 6 años comenzó terapia de lenguaje y en tres meses su comunicación mejoró notablemente. El equipo de fonoaudiología es increíble. Muy recomendado.&rdquo;</p>
                    <div class="testi-author">
                        <div class="testi-avatar">JT</div>
                        <div><div class="testi-name">Jorge Torres</div><div class="testi-detail">Padre de paciente · Terapia del Lenguaje</div></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-up">
                <div class="testi-card">
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">&ldquo;El electroencefalograma fue rápido y sin molestias. El médico me explicó los resultados detalladamente. La atención humana que recibí aquí superó todas mis expectativas.&rdquo;</p>
                    <div class="testi-author">
                        <div class="testi-avatar">RG</div>
                        <div><div class="testi-name">Rosa Guerrero</div><div class="testi-detail">Paciente de Electrodiagnóstico · Tumaco</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     FAQ
============================================= -->
<section class="faq-section" id="faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5 fade-up">
                    <span class="section-eyebrow" style="justify-content:center;">Resolvemos sus dudas</span>
                    <h2 class="section-heading" style="text-align:center;">Preguntas Frecuentes</h2>
                </div>
                <div class="accordion faq-accordion fade-up" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">¿Cómo puedo pedir una cita médica?</button></h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Puede agendar su cita por WhatsApp con número de la especialidad que desea (Neurología: 305-356-0651 / Terapias: 315-972-9333), o usando el formulario de contacto. Atendemos de lunes a viernes de 8:00 a.m. a 6:00 p.m. y sábados de 8:00 a.m. a 12:00 m</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">¿Qué EPS y aseguradoras atienden?</button></h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Atendemos pacientes de las principales EPS del régimen contributivo y subsidiado con contrato vigente en Nariño, así como pacientes particulares. Comuníquese antes de su cita para verificar el convenio activo.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">¿Cuánto tiempo tarda un resultado de EEG?</button></h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">El EEG toma aproximadamente 40 minutos. El informe interpretado estará disponible en 48 a 72 horas hábiles. En casos urgentes podemos entregar resultados con anticipación.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">¿Necesito orden médica para los estudios electrodiagnósticos?</button></h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Si su cita es cubierta por EPS, sí necesitas orden médica o autorización. Para pacientes particulares no es obligatoria, aunque se recomienda tener remisión del médico tratante.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">¿Atienden niños y adultos mayores?</button></h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Sí. Contamos con neurología pediátrica y atención a adultos mayores. Tratamos condiciones neurológicas en todas las etapas de la vida, desde epilepsia infantil hasta demencias y enfermedades neurodegenerativas.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     CTA BANNER
============================================= -->
<section class="cta-banner">
    <svg class="cta-neural" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
        <g stroke="rgba(255,255,255,0.7)" stroke-width="1" fill="none">
            <circle cx="100" cy="80" r="4" fill="rgba(255,255,255,0.4)"/>
            <circle cx="300" cy="150" r="3" fill="rgba(255,255,255,0.4)"/>
            <circle cx="500" cy="60" r="5" fill="rgba(255,255,255,0.4)"/>
            <circle cx="700" cy="200" r="3" fill="rgba(255,255,255,0.4)"/>
            <circle cx="200" cy="300" r="4" fill="rgba(255,255,255,0.4)"/>
            <circle cx="600" cy="320" r="3" fill="rgba(255,255,255,0.4)"/>
            <circle cx="400" cy="250" r="5" fill="rgba(255,255,255,0.4)"/>
            <line x1="100" y1="80" x2="300" y2="150"/>
            <line x1="300" y1="150" x2="500" y2="60"/>
            <line x1="500" y1="60" x2="700" y2="200"/>
            <line x1="300" y1="150" x2="400" y2="250"/>
            <line x1="400" y1="250" x2="200" y2="300"/>
            <line x1="400" y1="250" x2="600" y2="320"/>
            <line x1="700" y1="200" x2="600" y2="320"/>
        </g>
    </svg>
    <div class="inner">
        <div class="container">
            <span class="section-eyebrow fade-up">Instituto Neurociencias de Nariño</span>
            <h2 class="fade-up">Unimos ciencia, experiencia<br>y precisión para cuidarte</h2>
            <p class="fade-up">Agende su cita o comuníquese con nosotros. Su salud es nuestra prioridad.</p>
            <a href="#map" class="btn-white-lg">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Solicitar Cita
            </a>
            <a href="#" onclick="openContactModal(event)" class="btn-ghost-lg">
                Enviar PQRS
            </a>
        </div>
    </div>
</section>

<script>
    // ========== Hero Slider ==========
    (function() {
        var slides = document.querySelectorAll('.hero-slide');
        var dots = document.querySelectorAll('.hero-dot');
        var counter = document.getElementById('heroCurrentNum');
        var current = 0;
        var timer;
        var nums = ['01','02','03'];

        function goTo(idx) {
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = (idx + slides.length) % slides.length;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
            if (counter) counter.textContent = nums[current];
        }
        function autoNext() {
            timer = setInterval(function() { goTo(current + 1); }, 5500);
        }
        document.getElementById('heroNext').addEventListener('click', function() {
            clearInterval(timer); goTo(current + 1); autoNext();
        });
        document.getElementById('heroPrev').addEventListener('click', function() {
            clearInterval(timer); goTo(current - 1); autoNext();
        });
        dots.forEach(function(dot) {
            dot.addEventListener('click', function() {
                clearInterval(timer);
                goTo(parseInt(this.getAttribute('data-idx')));
                autoNext();
            });
        });
        autoNext();
    })();
</script>

@endsection
