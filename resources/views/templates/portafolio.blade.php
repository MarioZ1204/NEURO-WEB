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

<!-- Portafolio de Servicios -->
<section style="background:#f8faf9; padding: 70px 0;">
    <div class="container">
        <p style="font-size:12px; letter-spacing:3px; text-transform:uppercase; color:var(--primary-light); font-weight:700; margin-bottom:10px;">Lo que ofrecemos</p>
        <h2 style="font-size:clamp(22px,3vw,36px); font-weight:800; color:var(--dark); margin-bottom:40px;">Nuestros Servicios</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('landing.tiposConsulta') }}" style="text-decoration:none;">
                    <div class="info-card" style="cursor:pointer; transition: transform 0.3s, box-shadow 0.3s;"
                         onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 15px 40px rgba(74,107,104,0.2)'"
                         onmouseout="this.style.transform=''; this.style.boxShadow=''">
                        <img src="{{ asset('assets/img/neu.jpg') }}" style="width:100%; height:160px; object-fit:cover; border-radius:10px; margin-bottom:20px;" alt="">
                        <h4>Tipos de Consulta</h4>
                        <p>Neurología general, epileptología y evaluación integral del sistema nervioso.</p>
                        <span style="color:var(--primary); font-size:12px; font-weight:700; letter-spacing:1px;">VER MÁS ›</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('landing.tiposTerapia') }}" style="text-decoration:none;">
                    <div class="info-card" style="cursor:pointer; transition: transform 0.3s, box-shadow 0.3s;"
                         onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 15px 40px rgba(74,107,104,0.2)'"
                         onmouseout="this.style.transform=''; this.style.boxShadow=''">
                        <img src="{{ asset('assets/img/fisio.webp') }}" style="width:100%; height:160px; object-fit:cover; border-radius:10px; margin-bottom:20px;" alt="">
                        <h4>Tipos de Terapia</h4>
                        <p>Fisioterapia, terapia ocupacional, fonoaudiología y neurorehabilitación integral.</p>
                        <span style="color:var(--primary); font-size:12px; font-weight:700; letter-spacing:1px;">VER MÁS ›</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('landing.electrodiagnosticos') }}" style="text-decoration:none;">
                    <div class="info-card" style="cursor:pointer; transition: transform 0.3s, box-shadow 0.3s;"
                         onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 15px 40px rgba(74,107,104,0.2)'"
                         onmouseout="this.style.transform=''; this.style.boxShadow=''">
                        <img src="{{ asset('assets/img/EEG.jpg') }}" style="width:100%; height:160px; object-fit:cover; border-radius:10px; margin-bottom:20px;" alt="">
                        <h4>Electrodiagnósticos</h4>
                        <p>EEG, polisomnografía, electromiografía y velocidad de conducción nerviosa.</p>
                        <span style="color:var(--primary); font-size:12px; font-weight:700; letter-spacing:1px;">VER MÁS ›</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
