@extends('layout.app')
@section('title', 'Preparación para Polisomnografía Basal')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(24px,3.5vw,42px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; flex-wrap: wrap; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); }
    .step-card { background:#fff; border-radius:14px; padding:22px 24px; box-shadow:0 3px 14px rgba(0,0,0,0.06); display:flex; gap:16px; align-items:flex-start; height:100%; }
    .step-num { width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:800; flex-shrink:0; }
    .step-num.danger { background:linear-gradient(135deg,#b22222,#d44444); }
    .step-num.ok { background:linear-gradient(135deg,#1b6b3a,#27ae60); }
    .step-content h5 { font-size:13px; font-weight:800; color:var(--dark); margin-bottom:6px; }
    .step-content p { font-size:12.5px; color:#666; line-height:1.75; margin:0; }
    .no-list li, .si-list li { font-size:13.5px; line-height:2.0; }
    .no-list { color:#a00; }
    .si-list { color:#1b6b3a; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('servicios.clinicaSueno') }}">Clínica del Sueño</a><span>›</span>
            <span>Preparación Polisomnografía Basal</span>
        </div>
        <h1>Preparación para<br>Polisomnografía Basal</h1>
        <p>Siga estas indicaciones para garantizar un estudio exitoso</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">

        <!-- ¿Qué es? -->
        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">Descripción del estudio</p>
            <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin:12px 0 14px;">¿Qué es la Polisomnografía Basal?</h2>
            <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>polisomnografía basal</strong> es el estudio de referencia ("gold standard") para el diagnóstico de los trastornos del sueño. Mide simultáneamente múltiples variables fisiológicas durante el sueño: actividad cerebral (EEG), movimientos oculares (EOG), actividad muscular (EMG), saturación de oxígeno, frecuencia cardíaca, flujo de aire y esfuerzo respiratorio.</p>
            <p style="font-size:14px;color:#555;line-height:1.9;">El estudio se realiza en las instalaciones del Instituto durante <strong>una noche completa</strong>. Un técnico especializado supervisa el registro de forma continua. Los datos son analizados e interpretados por el médico especialista en medicina del sueño.</p>
        </div>

        <!-- Lo que debe hacer el día anterior -->
        <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:18px;">Instrucciones por etapa</p>
        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="step-card">
                    <div class="step-num">1</div>
                    <div class="step-content">
                        <h5>48 horas antes</h5>
                        <p>Evite consumir <strong>alcohol, cafeína y sedantes</strong> (a menos que su médico le indique continuar un medicamento). No tome siestas largas; trate de mantenerse activo durante el día para facilitar el sueño nocturno.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="step-card">
                    <div class="step-num">2</div>
                    <div class="step-content">
                        <h5>El día del estudio — baño obligatorio</h5>
                        <p>Lávese el cabello con champú <strong>sin acondicionador, brillantina, lacas ni aceites</strong>. El cabello debe estar completamente seco al llegar. La limpieza del cuero cabelludo es esencial para la correcta colocación de los electrodos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="step-card">
                    <div class="step-num">3</div>
                    <div class="step-content">
                        <h5>Sus medicamentos habituales</h5>
                        <p>Continúe tomando <strong>todos sus medicamentos regulares</strong> a sus horas habituales, salvo que el especialista haya indicado suspender alguno. Informe al técnico sobre todos los medicamentos que usa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="step-card">
                    <div class="step-num">4</div>
                    <div class="step-content">
                        <h5>Cena ligera antes de llegar</h5>
                        <p>Coma su cena habitual pero <strong>evite comidas muy pesadas, picantes o copiosas</strong> en las 3 horas previas al estudio. No se presente en ayunas — el hambre puede dificultar conciliar el sueño.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="step-card">
                    <div class="step-num">5</div>
                    <div class="step-content">
                        <h5>Qué traer</h5>
                        <p>Traiga ropa cómoda para dormir (pijama de dos piezas preferiblemente), artículos de tocador personales, medicamentos que deba tomar en la noche, y cualquier dispositivo de ayuda (CPAP si ya usa, audífonos, etc.).</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="step-card">
                    <div class="step-num">6</div>
                    <div class="step-content">
                        <h5>Hora de llegada</h5>
                        <p>Presente en el Instituto a la hora indicada en su cita (normalmente entre <strong>8:00 y 9:00 PM</strong>). La instalación de electrodos toma aproximadamente 45 minutos. No llegue tarde pues esto reduce el tiempo de registro.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- NO hacer -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="info-card" style="border-top:4px solid #c0392b;">
                    <h4 style="font-size:15px;font-weight:800;color:#c0392b;margin-bottom:16px;"><i class="fa fa-times-circle" style="margin-right:8px;"></i>NO debe hacer</h4>
                    <ul class="no-list" style="padding-left:20px;">
                        <li>Consumir café, té negro, cola o bebidas energéticas ese día</li>
                        <li>Usar acondicionador, mascarillas o productos capilares</li>
                        <li>Tomar alcohol desde 48 horas antes</li>
                        <li>Tomar siestas el día del estudio</li>
                        <li>Maquillarse el rostro (especialmente ojos y mejillas)</li>
                        <li>Usar esmalte en las uñas de los pies</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card" style="border-top:4px solid #27ae60;">
                    <h4 style="font-size:15px;font-weight:800;color:#27ae60;margin-bottom:16px;"><i class="fa fa-check-circle" style="margin-right:8px;"></i>SÍ debe hacer</h4>
                    <ul class="si-list" style="padding-left:20px;">
                        <li>Bañarse y lavar el cabello sin productos</li>
                        <li>Cenar algo ligero antes de llegar</li>
                        <li>Tomar sus medicamentos habituales</li>
                        <li>Llevar ropa cómoda para dormir</li>
                        <li>Traer sus artículos personales de higiene</li>
                        <li>Informarle al técnico de todos sus síntomas</li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border:1px solid var(--primary-pale);border-radius:14px;padding:26px 30px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-phone" style="color:var(--primary);margin-right:8px;"></i><strong>¿Tiene dudas?</strong> Llame al Instituto antes de su estudio: <a href="tel:{{ setting('phone_fixed') }}" style="color:var(--primary);font-weight:700;">{{ setting('phone_fixed_display') }}</a> (PBX) o escríbanos por WhatsApp. Nuestro equipo resolverá todas sus inquietudes.</p>
        </div>

        @include('components.page-cta', [
            'title' => '¿Listo para su estudio del sueño?',
            'subtitle' => 'Si tiene dudas sobre la preparación, llámenos o escriba por WhatsApp.',
            'secondaryHref' => route('servicios.clinicaSueno'),
            'secondaryLabel' => 'Clínica del Sueño',
        ])
    </div>
</section>
@endsection

