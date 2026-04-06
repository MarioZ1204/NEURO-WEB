@extends('layout.app')
@section('title', 'Portafolio de Servicios')
@section('content')

<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 80px 0 60px;
        text-align: center;
        color: #fff;
    }
    .page-hero h1 { font-size: clamp(28px, 4vw, 48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }

    .info-card {
        background: #fff;
        border-radius: 16px;
        padding: 35px 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        height: 100%;
        border-top: 4px solid var(--primary);
    }
    .info-card h4 { font-size: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: var(--dark); margin-bottom: 12px; }
    .info-card p { font-size: 14px; color: #666; line-height: 1.8; margin: 0; text-align: justify; }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Nuestra Institución</a>
            <span>›</span>
            <span>Portafolio de Servicios</span>
        </div>
        <h1>Portafolio de Servicios</h1>
        <p>Instituto Neurociencias de Nariño IPS S.A.S · Pasto, Nariño</p>
    </div>
</div>


<div style="text-align:center; padding: 20px 0;">
    <div style="margin-bottom:12px;">
        <a href="https://www.calameo.com/books/008186078f24f27814297" target="_blank"
           style="font-size:13px;font-weight:700;color:var(--primary-light);letter-spacing:2px;text-transform:uppercase;text-decoration:none;">
            Ver en pantalla completa ›
        </a>
    </div>
    <iframe src="//v.calameo.com/?bkcode=008186078f24f27814297&mode=mini"
            width="100%"
            height="620"
            frameborder="0"
            scrolling="no"
            allowtransparency
            allowfullscreen
            style="margin:0 auto; border-radius:12px; box-shadow:0 8px 30px rgba(0,0,0,0.12); display:block;">
    </iframe>
</div>

@endsection
