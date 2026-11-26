@extends('layout.app')
@section('title', 'INICIO')
@section('content')

<!-- BANNER DE AVISO: usa banners activos desde admin (si existen) -->
@if(isset($banners) && $banners->count())
    @php
        $b = $banners->first();
        $bannerSeconds = max(5, min(300, (int) setting('banner_seconds', 30)));
    @endphp
    <div id="site-banner"
         data-banner-id="{{ $b->id }}"
         data-banner-seconds="{{ $bannerSeconds }}"
         style="display:none; position:fixed;top:80px;left:0;right:0;z-index:1050;align-items:center;justify-content:center;">
        <div style="position:relative;max-width:1100px;margin:0 auto;">
            <img id="site-banner-img" src="{{ $b->imageUrl() }}" alt="banner" style="width:100%;height:auto;border-radius:8px;box-shadow:0 12px 36px rgba(0,0,0,0.24);display:block;">
            <button id="site-banner-close" aria-label="Cerrar aviso" style="position:absolute;top:8px;right:8px;background:rgba(0,0,0,0.6);border:0;color:#fff;width:36px;height:36px;border-radius:50%;cursor:pointer;font-size:18px;display:flex;align-items:center;justify-content:center;">×</button>
        </div>
    </div>
@else
    <!-- No banners activos -->
    <div id="site-banner" style="display:none;"></div>
@endif

<style>
    body { padding-top: var(--navbar-h, 80px); }
    
 /* Las slides siempre están en el DOM, apiladas con la misma altura */
    .hero-section {
        position: relative;
        overflow: hidden;
        height: calc(100vh - var(--navbar-h, 80px));
        min-height: 560px;
    }

    .hero-slide {
        display: flex !important;
        position: absolute;
        inset: 0;
        width: 100%;
        align-items: stretch;
        opacity: 0;
        visibility: hidden;
        transform: scale(1.03);
        transition: opacity 1.05s cubic-bezier(0.4, 0, 0.2, 1), visibility 1.05s, transform 1.2s ease;
        pointer-events: none;
        z-index: 1;
    }

    .hero-slide.active {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: scale(1);
        z-index: 2;
    }

    .hero-left {
        width: 42%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        padding: 70px 55px 70px 65px;
        position: relative;
        z-index: 2;
        overflow: hidden;
        opacity: 0;
        transform: translateX(-30px);
        transition: opacity 0.9s ease, transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
        transition-delay: 0.12s;
        border-radius: 0 40px 40px 0;
        background: linear-gradient(150deg, #2e4a47 0%, #4a6b68 100%);
    }
    .hero-left.hero-variant-2 { background: linear-gradient(150deg, #1a2e2c 0%, #2e4a47 100%); }
    .hero-left.hero-variant-3 { background: linear-gradient(150deg, #3d6360 0%, #5e8582 100%); }
    .hero-slide.active .hero-left {
        opacity: 1;
        transform: translateX(0);
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
    .hero-slide.active .hero-eyebrow { animation: heroCopyIn 0.7s ease both; }
    .hero-slide.active .hero-title { animation: heroCopyIn 0.75s ease 0.08s both; }
    .hero-slide.active .hero-desc { animation: heroCopyIn 0.75s ease 0.16s both; }
    .hero-slide.active .hero-btn-group { animation: heroCopyIn 0.75s ease 0.24s both; }
    @keyframes heroCopyIn {
        from { opacity: 0; transform: translateY(16px); }
        to { opacity: 1; transform: translateY(0); }
    }
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
    .hero-btn-primary,
    .hero-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 30px;
        border-radius: 999px;
        font-size: 13px;
        font-family: inherit;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        cursor: pointer;
        transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease, border-color 0.25s ease;
        border: 1.5px solid transparent;
    }
    .hero-btn-primary {
        background: #ffffff;
        color: #2e4a47;
        font-weight: 700;
        border-color: transparent;
        box-shadow: 0 18px 38px rgba(74,107,104,0.16);
    }
    .hero-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 46px rgba(74,107,104,0.2);
        background: #f6fbf9;
        color: #1f3f3a;
    }
    .hero-btn-secondary {
        background: rgba(255,255,255,0.14);
        color: #ffffff;
        font-weight: 700;
        border-color: rgba(255,255,255,0.35);
    }
    .hero-btn-secondary:hover {
        transform: translateY(-2px);
        background: rgba(255,255,255,0.22);
        border-color: rgba(255,255,255,0.55);
    }

    .hero-right {
        flex: 1;
        min-width: 0;
        position: relative;
        overflow: hidden;
        height: 100%;
        transition: transform 0.45s ease;
        background: radial-gradient(circle at top right, rgba(255,255,255,0.08), transparent 30%);
        border-radius: 0 40px 40px 0;
        box-shadow: inset 0 0 0 1px rgba(255,255,255,0.08);
    }

    .hero-right img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        transform: scale(1);
        transition: transform 7s ease-out;
        opacity: 0.98;
    }
    .hero-slide.active .hero-right img {
        transform: scale(1.1);
    }

    .hero-right::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 20% 30%, rgba(255,255,255,0.08), transparent 32%),
                    linear-gradient(to right, rgba(0,0,0,0.24) 0%, transparent 42%),
                    linear-gradient(to top, rgba(0,0,0,0.28) 0%, transparent 40%);
        pointer-events: none;
        z-index: 5;
    }
    .hero-right::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.12) 0%, transparent 42%),
                    linear-gradient(to top, rgba(0,0,0,0.16) 0%, transparent 45%);
        pointer-events: none;
        z-index: 6;
    }

    .hero-vigilado {
        position: absolute;
        bottom: 28px; right: 28px;
        z-index: 15;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 150px;
        max-width: 180px;
        background: rgba(255,255,255,0.94);
        backdrop-filter: blur(14px);
        padding: 8px 14px;
        border-radius: 14px;
        border: 1px solid rgba(255,255,255,0.82);
        box-shadow: 0 14px 35px rgba(0,0,0,0.14);
        overflow: hidden;
        white-space: nowrap;
        line-height: 0;
    }
    .hero-vigilado img {
        height: 28px;
        width: auto;
        max-width: 100%;
        display: block;
    }

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

    .services-section {
        padding: 100px 0;
        background: #f7fafa;
        overflow: hidden;
    }
    .service-card {
        background: #ffffff;
        border-radius: 26px;
        overflow: hidden;
        border: 1px solid rgba(74,107,104,0.08);
        transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.7s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }
    .services-section.js-anim .service-card {
        opacity: 0;
        transform: translateY(40px);
    }
    .services-section.js-anim .service-card.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .services-section.js-anim .service-card.is-visible:hover,
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 60px rgba(29,49,47,0.1);
        border-color: rgba(74,107,104,0.16);
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
        background: linear-gradient(to top, rgba(15,31,30,0.36) 0%, transparent 58%);
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
        color: rgba(255,255,255,0.95);
        background: rgba(74,107,104,0.88);
        backdrop-filter: blur(6px);
        padding: 5px 12px;
        border-radius: 999px;
        z-index: 2;
    }
    .service-card .card-body-custom {
        padding: 32px 28px 30px;
        position: relative;
    }
    .service-card .card-body-custom::before {
        content: '';
        position: absolute;
        top: 0; left: 28px;
        width: 48px; height: 4px;
        background: #4a6b68;
        border-radius: 999px;
        transition: width 0.3s ease;
    }
    .service-card:hover .card-body-custom::before { width: 92px; }
    .service-card h5 {
        font-size: 16px;
        font-weight: 800;
        color: #0f1f1e;
        margin-bottom: 12px;
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

    .specialties-strip {
        background: #0f1f1e;
        padding: 55px 0;
    }
    .specialties-strip .strip-label {
        text-align: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #9FE1CB;
        margin-bottom: 28px;
    }
    .specialty-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 0 18px;
        border-right: 1px solid rgba(255,255,255,0.07);
        height: 100%;
    }
    .specialty-item:last-child { border-right: none; }
    .specialty-icon {
        width: 46px; height: 46px;
        background: rgba(74,107,104,0.35);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #c8dedd;
        font-size: 17px;
        flex-shrink: 0;
    }
    .specialty-text h6 {
        font-size: 12.5px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 3px;
    }
    .specialty-text p { font-size: 11px; color: #6b8080; margin: 0; font-weight: 300; }

    .services-row-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--primary);
        margin: 8px 0 16px;
    }

    .home-staff-list {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(29,49,47,0.08);
        overflow: hidden;
    }
    .home-staff-row {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr 1.4fr;
        gap: 18px;
        padding: 22px 28px;
        border-bottom: 1px solid #eef3f2;
        align-items: start;
    }
    .home-staff-row:last-child { border-bottom: none; }
    .home-staff-row:hover { background: #f7fbfa; }
    .home-staff-name { font-size: 16px; font-weight: 800; color: var(--dark); }
    .home-staff-spec {
        font-size: 12px; font-weight: 700; color: var(--primary);
        text-transform: uppercase; letter-spacing: 0.4px;
    }
    .home-staff-meta span {
        display: inline-block; font-size: 12px; color: #888; margin-bottom: 6px;
    }
    .home-staff-meta p { font-size: 13px; color: #666; line-height: 1.7; margin: 0; }
    @media (max-width: 768px) {
        .home-staff-row { grid-template-columns: 1fr; gap: 6px; padding: 18px 20px; }
        .specialty-item { border-right: none; padding: 10px 12px; }
    }

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
        cursor: pointer; font-family: inherit; border: 0;
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
        cursor: pointer; font-family: inherit;
    }
    .btn-ghost-lg:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.65); color: #fff; transform: translateY(-2px); }


    @media (max-width: 991px) {
        .hero-section {
            height: auto;
            min-height: 0;
        }
        .hero-slide {
            flex-direction: column;
            position: absolute;
            inset: 0;
            height: 100%;
            min-height: 100%;
        }
        .hero-slide.active {
            position: relative;
            height: auto;
            min-height: 0;
        }
        .hero-left {
            width: 100%;
            flex: 0 0 auto;
            padding: 48px 28px 36px;
            border-radius: 0;
        }
        .hero-right {
            width: 100%;
            flex: 0 0 auto;
            min-height: 0;
            height: auto;
            aspect-ratio: 16 / 10;
            border-radius: 0;
        }
        .hero-desc { max-width: none; }
        .hero-diagonal { display: none; }
        .hero-scroll { display: none; }
        .hero-prev { left: 20px; bottom: 20px; }
        .hero-next { left: 74px; bottom: 20px; }
        .hero-dots { left: 130px; bottom: 32px; }
        .hero-counter { right: 20px; top: 20px; }
        .hero-vigilado { bottom: 72px; right: 16px; }
        .hero-deco-circle { top: 16px; right: 16px; width: 70px; height: 70px; }
        .stats-inner { grid-template-columns: repeat(2, 1fr); }
        .stat-item:nth-child(2n) { border-right: none; }
        .stat-item { border-bottom: 1px solid #eaf2f1; }
        .about-content { padding-left: 0; margin-top: 40px; }
        .about-checks { grid-template-columns: 1fr; }
        .specialty-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); padding: 20px 0; }
    }

    @media (max-width: 575px) {
        .hero-left { padding: 40px 20px 28px; }
        .hero-title { font-size: 28px; }
        .hero-desc { font-size: 13.5px; margin-bottom: 28px; }
        .hero-btn-group { gap: 10px; }
        .hero-btn-primary,
        .hero-btn-secondary { padding: 12px 22px; font-size: 11px; }
        .hero-right { aspect-ratio: 4 / 3; }
        .hero-prev { left: 15px; bottom: 16px; width: 40px; height: 40px; }
        .hero-next { left: 63px; bottom: 16px; width: 40px; height: 40px; }
        .hero-dots { display: none; }
        .hero-counter { right: 15px; top: 15px; }
        .hero-vigilado { bottom: 64px; right: 12px; padding: 6px 10px; }
        .hero-vigilado img { height: 24px; }
    }

    /* ===== TEAM ===== */
    .team-section { padding: 100px 0; background: var(--white); }
    .team-card { background:#ffffff; border-radius:26px; overflow:hidden; box-shadow:0 24px 60px rgba(29,49,47,0.08); transition: transform 0.35s, box-shadow 0.35s; height:100%; }
    .team-card:hover { transform: translateY(-8px); box-shadow:0 34px 72px rgba(29,49,47,0.12); }
    .team-photo { height:220px; display:flex; align-items:center; justify-content:center; background: linear-gradient(150deg, #2e4a47 0%, #4a6b68 100%); position:relative; overflow:hidden; }
    .team-photo::after { content:''; position:absolute; bottom:-20px; left:50%; transform:translateX(-50%); width:100px; height:40px; background:#ffffff; border-radius:50%; box-shadow:0 -6px 0 #ffffff; }
    .team-avatar { width:100px; height:100px; border-radius:50%; border:4px solid rgba(255,255,255,0.28); display:flex; align-items:center; justify-content:center; background:rgba(255,255,255,0.16); font-size:36px; font-weight:900; color:#ffffff; position:relative; z-index:1; }
    .team-info { padding:32px 28px 28px; text-align:center; }
    .team-info .tag { display:inline-block; background:rgba(74,107,104,0.1); color:var(--primary-dark); font-size:10px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; padding:6px 16px; border-radius:999px; margin-bottom:14px; }
    .team-info h4 { font-size:18px; font-weight:800; color:var(--dark); margin-bottom:8px; }
    .team-info .exp { font-size:13px; color:var(--text-light); margin-bottom:12px; }
    .team-info p { font-size:13px; color:#666; line-height:1.7; margin:0; }
    .team-img {width: 100%;height: 100%;object-fit: cover;border-radius: inherit;display: block;position:relative;z-index:1;}
    .team-photo:has(img)::after { display: none; }

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
    
    

    <div class="hero-slide active" data-slide="0">
        <div class="hero-left hero-variant-1">
            <div class="hero-left-content">
                <span class="hero-eyebrow">{{ setting('hero_eyebrow') }}</span>
                <h1 class="hero-title">
                    {{ setting('hero_line1') }}<br>{{ setting('hero_line2') }}<br>
                    <em>{{ setting('hero_em') }}</em>
                </h1>
                <p class="hero-desc">
                    {{ setting('hero_desc') }}
                </p>
                <div class="hero-btn-group">
                    <a href="#about" class="hero-btn-primary">
                        Conózcanos
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <button type="button" class="hero-btn-secondary" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal">Solicitar Cita</button>
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



    <div class="hero-slide" data-slide="1">
        <div class="hero-left hero-variant-2">
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
                    <button type="button" class="hero-btn-secondary" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal">Solicitar Cita</button>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <img src="{{ asset('assets/img/EEG-1.png') }}" alt="Electrodiagnósticos">
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




    <div class="hero-slide" data-slide="2">
        <div class="hero-left hero-variant-3">
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
                    <button type="button" class="hero-btn-secondary" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal">Solicitar Cita</button>
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
    
    <div class="hero-scroll">
        <div class="hero-scroll-line"></div>
        <span>Deslizar hacia abajo</span>
    </div>

    <div class="hero-counter">
        <strong id="heroCurrentNum">01</strong> / 03
    </div>

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
     SERVICES SECTION — 3 filas
============================================= -->
<section class="services-section" id="services">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <h2 class="section-heading" style="text-align:center;">{{ setting('services_title') }}</h2>
            <p class="section-subtext" style="max-width:560px; margin:0 auto;">{{ setting('services_subtitle') }}</p>
        </div>

        @php
            $serviceSections = \App\Models\HomeService::sections();
            $serviceGroups = array_filter($homeServices ?? \App\Models\HomeService::publishedBySection(), fn ($rows) => count($rows) > 0);
            $lastServiceKey = array_key_last($serviceGroups);
        @endphp
        @foreach($serviceGroups as $sectionKey => $rows)
            <p class="services-row-label fade-up">{{ $serviceSections[$sectionKey] ?? $sectionKey }}</p>
            <div class="row g-4 {{ $sectionKey === $lastServiceKey ? '' : 'mb-4' }}">
                @foreach($rows as $service)
                    <div class="{{ $sectionKey === 'consulta' ? 'col-lg-3' : 'col-lg-4' }} col-md-6" @if($service->preview_focus) data-preview-focus @endif><a href="{{ $service->linkUrl() }}" class="service-card">@if($service->imageUrl())<div class="card-img"><img src="{{ $service->imageUrl() }}" alt="{{ $service->title }}" loading="lazy"><div class="card-img-overlay"></div></div>@endif<div class="card-body-custom"><h5>{{ $service->title }}</h5><p>{{ $service->description }}</p><span class="card-arrow">Ver más →</span></div></a></div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>

<!-- =============================================
     SPECIALTIES DARK STRIP
============================================= -->
<section class="specialties-strip">
    <div class="container">
        <p class="strip-label">Servicios especializados</p>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-2 col-md-4 col-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-brain"></i></div>
                    <div class="specialty-text">
                        <h6>Neurología</h6>
                        <p>Consulta especializada</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-bolt"></i></div>
                    <div class="specialty-text">
                        <h6>Epileptología</h6>
                        <p>Diagnóstico y manejo</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-moon"></i></div>
                    <div class="specialty-text">
                        <h6>Somnología</h6>
                        <p>Clínica del sueño</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-wave-square"></i></div>
                    <div class="specialty-text">
                        <h6>Electrodiagnóstico</h6>
                        <p>EEG, VTM, PSG</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3 mb-lg-0">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-hands-helping"></i></div>
                    <div class="specialty-text">
                        <h6>Terapia física</h6>
                        <p>Rehabilitación integral</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="specialty-item">
                    <div class="specialty-icon"><i class="fas fa-puzzle-piece"></i></div>
                    <div class="specialty-text">
                        <h6>Neuropsicología</h6>
                        <p>Evaluación cognitiva</p>
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

        <div class="home-staff-list fade-up">
            @forelse(($teamMembers ?? collect()) as $doc)
                <div class="home-staff-row" @if($doc->preview_focus) data-preview-focus @endif>
                    <div class="home-staff-name">{{ $doc->name }}</div>
                    <div class="home-staff-spec">{{ $doc->specialty }}</div>
                    <div class="home-staff-meta">
                        @if($doc->experience)
                            <span>{{ $doc->experience }}</span>
                        @endif
                        @if($doc->bio)
                            <p>{{ $doc->bio }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <p style="text-align:center;color:#888;">El equipo se actualizará próximamente.</p>
            @endforelse
        </div>

        <div class="text-center mt-4 fade-up">
            <a href="{{ route('directorioMedico') }}" class="btn-cta-outline" style="border-radius:25px;padding:12px 28px;font-size:13px;text-decoration:none;">Ver directorio completo</a>
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
            <h2 class="section-heading" style="text-align:center;">Reseñas</h2>
        </div>
        <div class="row g-4" id="testimoniosContainer">
            @if($testimonials && $testimonials->count() > 0)
                @foreach($testimonials as $testimonial)
                    <div class="col-lg-4 col-md-6 fade-up">
                        <div class="testi-card" @if($testimonial->preview_focus) data-preview-focus @endif>
                            <div class="testi-stars">{{ str_repeat('★', $testimonial->rating) }}</div>
                            <p class="testi-text">&ldquo;{{ $testimonial->text }}&rdquo;</p>
                            
                            {{-- Mostrar vista previa del archivo adjunto si existe --}}
                            @if($testimonial->file_path)
                                @php
                                    $extension = strtolower(pathinfo($testimonial->file_path, PATHINFO_EXTENSION));
                                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])
                                        || ($testimonial->file_type && str_contains($testimonial->file_type, 'image'));
                                    $isPdf = $extension === 'pdf'
                                        || ($testimonial->file_type && str_contains($testimonial->file_type, 'pdf'));
                                    $fileUrl = $testimonial->file_url;
                                @endphp
                                
                                @if($isImage)
                                    {{-- Para imágenes: mostrar miniatura --}}
                                    <a href="{{ $fileUrl }}" target="_blank" style="display: block; margin: 16px 0; border-radius: 8px; overflow: hidden; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                                        <img src="{{ $fileUrl }}" alt="{{ pathinfo($testimonial->file_path, PATHINFO_FILENAME) }}" style="width: 100%; height: 180px; object-fit: cover; display: block; cursor: pointer;" onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\"background:#f0f0f0; height:180px; display:flex; align-items:center; justify-content:center; border-radius:8px;\">Error cargando imagen</div>';">
                                    </a>
                                @elseif($isPdf)
                                    {{-- Para PDFs: vista previa con PDF.js --}}
                                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" style="display: block; margin: 16px 0; border-radius: 8px; overflow: hidden; background: white; border: 2px solid #d0e8e5; transition: all 0.3s ease; cursor: pointer; height: 180px; position: relative; box-shadow: 0 2px 8px rgba(0,0,0,0.08);" onmouseover="this.style.borderColor='#4a6b68'; this.style.boxShadow='0 4px 12px rgba(74,107,104,0.2)';" onmouseout="this.style.borderColor='#d0e8e5'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
                                        <div style="overflow: hidden; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(180deg, #f9fafb 0%, #f3f4f6 100%);">
                                            <canvas class="pdf-preview-canvas" data-pdf-url="{{ $fileUrl }}" id="pdf-preview-{{ $testimonial->id }}" style="max-width: 100%; max-height: 100%; display: block; object-fit: contain;"></canvas>
                                        </div>
                                        <div style="position: absolute; bottom: 6px; right: 6px; background: #4a6b68; color: white; padding: 3px 7px; border-radius: 3px; font-size: 9px; font-weight: 600;">PDF</div>
                                    </a>
                                @else
                                    {{-- Para otros documentos: mostrar preview con ícono --}}
                                    <a href="{{ $fileUrl }}" target="_blank" style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin: 16px 0; padding: 24px; background: linear-gradient(135deg, #f0f7f6 0%, #e8f4f2 100%); border-radius: 8px; text-decoration: none; color: inherit; transition: all 0.3s ease; cursor: pointer; border: 2px solid #d0e8e5;" onmouseover="this.style.background='linear-gradient(135deg, #e8f4f2 0%, #e0f0ed 100%)'; this.style.borderColor='#4a6b68';" onmouseout="this.style.background='linear-gradient(135deg, #f0f7f6 0%, #e8f4f2 100%)'; this.style.borderColor='#d0e8e5';">
                                        <div style="display: flex; align-items: center; justify-content: center; width: 60px; height: 60px; background: #4a6b68; border-radius: 10px; color: white; font-size: 32px; margin-bottom: 12px;">
                                            <i class="fas {{ $testimonial->file_icon }}"></i>
                                        </div>
                                        <div style="font-size: 13px; font-weight: 600; color: #0f1f1e; text-align: center; word-break: break-word; margin-bottom: 4px;">
                                            {{ pathinfo($testimonial->file_path, PATHINFO_FILENAME) }}
                                        </div>
                                        <div style="font-size: 11px; color: #666; text-align: center;">
                                            {{ $testimonial->file_size_formatted }} • Click para ver
                                        </div>
                                    </a>
                                @endif
                            @endif
                            
                            <div class="testi-author">
                                <div class="testi-avatar" style="background: linear-gradient(135deg, #4a6b68, #7a9b98); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">{{ strtoupper(substr($testimonial->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $testimonial->name)[1] ?? '', 0, 1)) }}</div>
                                <div><div class="testi-name">{{ $testimonial->name }}</div><div class="testi-detail">{{ $testimonial->detail }}</div></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Testimonios por defecto si no hay en BD -->
                <div class="col-lg-4 col-md-6 fade-up">
                    <div class="testi-card">
                        <div class="testi-stars">★★★★★</div>
                        <p class="testi-text">&ldquo;Excelente atención médica. El Dr. me ayudó a controlar mi epilepsia de manera efectiva. El equipo es muy profesional y amable.&rdquo;</p>
                        <div class="testi-author">
                            <div class="testi-avatar" style="background: linear-gradient(135deg, #4a6b68, #7a9b98); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">JM</div>
                            <div><div class="testi-name">Juan Martínez</div><div class="testi-detail">Paciente de Neurología</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-up">
                    <div class="testi-card">
                        <div class="testi-stars">★★★★★</div>
                        <p class="testi-text">&ldquo;Las terapias me han ayudado enormemente con mis problemas de sueño. Recomiendo este instituto a todos mis amigos y familia.&rdquo;</p>
                        <div class="testi-author">
                            <div class="testi-avatar" style="background: linear-gradient(135deg, #5a7b78, #8aabad); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">RC</div>
                            <div><div class="testi-name">Rosa Cortés</div><div class="testi-detail">Paciente de Terapias</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-up">
                    <div class="testi-card">
                        <div class="testi-stars">★★★★★</div>
                        <p class="testi-text">&ldquo;Personal muy atento y comprometido. Los estudios electrodiagnósticos fueron rápidos y sin complicaciones. Muy satisfecho.&rdquo;</p>
                        <div class="testi-author">
                            <div class="testi-avatar" style="background: linear-gradient(135deg, #3a5b58, #6a8b88); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">CP</div>
                            <div><div class="testi-name">Carlos Peña</div><div class="testi-detail">Paciente de Electrodiagnósticos</div></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@if($testimonials && $testimonials->contains(fn($t) => $t->file_path && (strtolower(pathinfo($t->file_path, PATHINFO_EXTENSION)) === 'pdf' || ($t->file_type && str_contains($t->file_type, 'pdf')))))
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
(function() {
    if (typeof pdfjsLib === 'undefined') return;

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    function showPdfFallback(canvas) {
        var ctx = canvas.getContext('2d');
        canvas.width = 300;
        canvas.height = 180;
        ctx.fillStyle = '#f0f7f6';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = '#4a6b68';
        ctx.font = 'bold 24px Arial';
        ctx.textAlign = 'center';
        ctx.fillText('PDF', canvas.width / 2, canvas.height / 2 - 10);
        ctx.font = '12px Arial';
        ctx.fillText('Clic para abrir', canvas.width / 2, canvas.height / 2 + 16);
    }

    document.querySelectorAll('.pdf-preview-canvas').forEach(function(canvas) {
        var url = canvas.dataset.pdfUrl;
        if (!url) return;

        pdfjsLib.getDocument({ url: url, withCredentials: true }).promise.then(function(pdf) {
            return pdf.getPage(1).then(function(page) {
                var maxHeight = 180;
                var container = canvas.parentElement;
                var maxWidth = container ? container.clientWidth : 300;
                var viewport = page.getViewport({ scale: 1 });
                var scale = Math.min(maxHeight / viewport.height, maxWidth / viewport.width);
                viewport = page.getViewport({ scale: scale });

                canvas.width = viewport.width;
                canvas.height = viewport.height;

                return page.render({
                    canvasContext: canvas.getContext('2d'),
                    viewport: viewport
                }).promise;
            });
        }).catch(function() {
            showPdfFallback(canvas);
        });
    });
})();
</script>
@endif

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
                            <div class="accordion-body">Puede agendar su cita por WhatsApp, escribiendo al número de la especialidad que desea (Neurología/Epileptología: 305-356-0651) (Terapias/Psicología/Neuropsicología: 315-972-9333), o usando el formulario de contacto. Atendemos de lunes a viernes de 7:30 a.m. a 7:00 p.m. y sábados de 7:30 a.m. a 12:00 m.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">¿Qué EPS y aseguradoras atienden?</button></h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Atendemos pacientes de las principales EPS del régimen contributivo y subsidiado con contrato vigente en Nariño, así como pacientes particulares. Comuníquese antes de su cita para verificar el convenio activo.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">¿Necesito orden médica para los estudios electrodiagnósticos?</button></h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Si su cita es cubierta por EPS, sí necesita orden médica o autorización. Para pacientes particulares no es obligatoria, aunque se recomienda tener remisión del médico tratante.</div>
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
            <h2 class="fade-up" style="max-width:760px;margin-left:auto;margin-right:auto;">{{ setting('cta_title') }}</h2>
            @if(setting('cta_desc'))<p class="fade-up">{{ setting('cta_desc') }}</p>@endif
            <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap;">
                <div class="dropdown">
                    <button class="btn-white-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Llámenos
                    </button>
                    <ul class="dropdown-menu p-2" style="min-width:260px; z-index:2100;">
                        <li><a class="dropdown-item" href="tel:{{ setting('phone_fixed') }}">PBX: {{ setting('phone_fixed_display') }}</a></li>
                        <li><a class="dropdown-item" href="tel:{{ setting('wa1_tel') }}">{{ setting('wa1_label') }}: {{ setting('wa1_display') }}</a></li>
                        <li><a class="dropdown-item" href="tel:{{ setting('wa2_tel') }}">{{ setting('wa2_label') }}: {{ setting('wa2_display') }}</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn-white-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Escríbanos</button>
                    <ul class="dropdown-menu p-2" style="min-width:240px; z-index:2100;">
                        <li><a class="dropdown-item" href="https://wa.me/{{ setting('wa1') }}" target="_blank">WhatsApp {{ setting('wa1_label') }}: {{ setting('wa1_display') }}</a></li>
                        <li><a class="dropdown-item" href="https://wa.me/{{ setting('wa2') }}" target="_blank">WhatsApp {{ setting('wa2_label') }}: {{ setting('wa2_display') }}</a></li>
                    </ul>
                </div>

                <button class="btn-white-lg" type="button" onclick="openLlamamos()">Lo llamamos</button>
            </div>
        </div>
    </div>
</section>

    <script>
        (function () {
            var slides  = document.querySelectorAll('.hero-slide');
            var dots    = document.querySelectorAll('.hero-dot');
            var counter = document.getElementById('heroCurrentNum');
            var hero    = document.querySelector('.hero-section');
            var current = 0;
            var timer;
            var nums    = ['01', '02', '03'];

            function goTo(idx) {
                slides[current].classList.remove('active');
                dots[current].classList.remove('active');
                current = (idx + slides.length) % slides.length;
                slides[current].classList.add('active');
                dots[current].classList.add('active');
                if (counter) counter.textContent = nums[current];
            }

            function autoNext() {
                clearInterval(timer);
                if (window.__INNAR_PREVIEW) return;
                timer = setInterval(function () { goTo(current + 1); }, 5500);
            }

            document.getElementById('heroNext').addEventListener('click', function () {
                clearInterval(timer); goTo(current + 1); autoNext();
            });
            document.getElementById('heroPrev').addEventListener('click', function () {
                clearInterval(timer); goTo(current - 1); autoNext();
            });
            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    clearInterval(timer);
                    goTo(parseInt(this.getAttribute('data-idx'), 10));
                    autoNext();
                });
            });

            var startX = 0;
            var THRESHOLD = 50;
            hero.addEventListener('touchstart', function (e) {
                startX = e.touches[0].clientX;
            }, { passive: true });
            hero.addEventListener('touchend', function (e) {
                var diff = startX - e.changedTouches[0].clientX;
                if (Math.abs(diff) < THRESHOLD) return;
                clearInterval(timer);
                goTo(diff > 0 ? current + 1 : current - 1);
                autoNext();
            }, { passive: true });

            function startHero() { autoNext(); }
            if (document.documentElement.classList.contains('splash-pending')) {
                document.addEventListener('innar:splash-done', startHero, { once: true });
            } else {
                startHero();
            }

            var cards = document.querySelectorAll('.service-card');
            var services = document.querySelector('.services-section');
            if (services) services.classList.add('js-anim');
            function showCards() {
                cards.forEach(function (card, i) {
                    setTimeout(function () { card.classList.add('is-visible'); }, i * 90);
                });
            }
            if (services && 'IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (!entry.isIntersecting) return;
                        showCards();
                        io.disconnect();
                    });
                }, { threshold: 0.12 });
                io.observe(services);
            } else {
                showCards();
            }
            setTimeout(function () {
                cards.forEach(function (card) { card.classList.add('is-visible'); });
            }, 2500);
        })();
    </script>
    <script>
        (function(){
            try {
                var banner = document.getElementById('site-banner');
                var closeBtn = document.getElementById('site-banner-close');
                if (!banner || !closeBtn) return;

                var bannerId = banner.getAttribute('data-banner-id') || '0';
                var storageKey = 'siteBannerClosed:' + bannerId;
                var seconds = parseInt(banner.getAttribute('data-banner-seconds') || '30', 10);
                if (isNaN(seconds) || seconds < 5) seconds = 30;
                if (seconds > 300) seconds = 300;

                // No mostrar si el usuario cerró este banner con ×
                var isPreview = !!window.__INNAR_PREVIEW;
                var closed = false;
                if (!isPreview) {
                    try { closed = localStorage.getItem(storageKey) === '1'; } catch(e) { closed = false; }
                }
                if (closed) return;

                var autoTimer;
                function showBanner() {
                    banner.style.display = 'flex';
                    if (isPreview) return;
                    autoTimer = setTimeout(function(){
                        banner.style.display = 'none';
                    }, seconds * 1000);
                }

                closeBtn.addEventListener('click', function(e){
                    e.preventDefault();
                    banner.style.display = 'none';
                    if (!isPreview) {
                        try { localStorage.setItem(storageKey, '1'); } catch(err){}
                    }
                    if (autoTimer) clearTimeout(autoTimer);
                });

                if (document.documentElement.classList.contains('splash-pending')) {
                    document.addEventListener('innar:splash-done', showBanner, { once: true });
                } else {
                    showBanner();
                }
            } catch (e) { console.error('Banner init error', e); }
        })();
    </script>
@endsection



