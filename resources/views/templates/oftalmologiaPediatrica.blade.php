@extends('layout.app')
@section('title', 'Oftalmología Pediátrica')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .info-card { background:#fff; border-radius:14px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.06); height:100%; }
    .func-box { background:var(--primary-ultra); border-radius:10px; padding:16px 18px; text-align:center; height:100%; }
    .func-box i { font-size:22px; color:var(--primary); margin-bottom:10px; display:block; }
    .func-box p { font-size:12.5px; color:var(--dark); font-weight:700; margin:0; }
    .age-row { display:flex; gap:14px; align-items:flex-start; padding:12px 0; border-bottom:1px solid #eef2f0; }
    .age-row:last-child { border-bottom:none; }
    .age-row strong { min-width:130px; font-size:13px; color:var(--primary); }
    .age-row span { font-size:13.5px; color:#555; line-height:1.7; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('especialidades') }}">Consulta Especializada</a><span>›</span>
            <span>Oftalmología Pediátrica</span>
        </div>
        <h1><i class="fa fa-child" style="margin-right:14px;opacity:0.75;"></i>Oftalmología Pediátrica</h1>
        <p>Atención visual especializada para bebés, niños y adolescentes</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="info-card">
                    <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;">¿Qué es la oftalmología pediátrica?</p>
                    <h2 style="font-size:clamp(18px,2vw,28px);font-weight:800;color:var(--dark);margin-bottom:16px;">Una buena visión es clave para aprender y crecer</h2>
                    <p style="font-size:14px;color:#555;line-height:1.9;">La <strong>Oftalmología Pediátrica</strong> se dedica al cuidado de los ojos y la visión de los niños, desde el nacimiento hasta la adolescencia. Durante la infancia el sistema visual aún se está desarrollando, por lo que <strong>detectar y tratar a tiempo</strong> cualquier alteración es fundamental para evitar secuelas permanentes.</p>
                    <p style="font-size:14px;color:#555;line-height:1.9;">Muchos niños no se quejan de ver mal porque creen que así ven todos. Por eso, la valoración con un especialista, en un ambiente amable y adaptado a su edad, permite identificar problemas como el <strong>ojo perezoso (ambliopía)</strong>, el <strong>estrabismo</strong> o la necesidad de gafas, que pueden influir en su rendimiento escolar y su desarrollo.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.consulta-side-photo', [
                    'src' => 'assets/img/consulta-oftalmologia-pediatrica.jpg',
                    'alt' => 'Consulta de oftalmología pediátrica — Instituto Neurociencias de Nariño',
                    'caption' => 'Valoración visual adaptada a cada edad',
                    'class' => 'consulta-side-photo--inline',
                ])
                <div class="info-card mt-3" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#fff;height:auto;">
                    <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.7);font-weight:700;margin-bottom:14px;">Señales de alerta en su hijo</p>
                    <ul style="font-size:13px;line-height:2.1;padding-left:16px;margin:0;color:rgba(255,255,255,0.90);">
                        <li>Desvía un ojo o “bizquea”</li>
                        <li>Entrecierra los ojos o se acerca mucho a pantallas y libros</li>
                        <li>Se frota los ojos o lagrimea con frecuencia</li>
                        <li>Inclina la cabeza para mirar</li>
                        <li>Dificultad para leer o bajo rendimiento escolar</li>
                        <li>Reflejo blanco en la pupila en fotografías</li>
                        <li>Dolor de cabeza después de estudiar</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="info-card mb-5">
            <p style="font-size:11px;letter-spacing:2.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:12px;">Valoración oftalmológica infantil</p>
            <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:24px;">¿Qué evaluamos?</h3>
            <div class="row g-3">
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-eye"></i><p>Agudeza visual según la edad</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-glasses"></i><p>Necesidad de gafas (refracción)</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-arrows-alt"></i><p>Alineación y movimiento de los ojos</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-low-vision"></i><p>Detección de ojo perezoso</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-cube"></i><p>Visión en profundidad (estereopsis)</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-palette"></i><p>Visión de colores</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-crosshairs"></i><p>Fondo de ojo</p></div></div>
                <div class="col-6 col-md-3"><div class="func-box"><i class="fa fa-brain"></i><p>Relación con el neurodesarrollo</p></div></div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-calendar-check" style="color:var(--primary);margin-right:8px;"></i>Controles visuales recomendados</h3>
                    <div class="age-row"><strong>Recién nacido</strong><span>Revisión del reflejo rojo y de la apariencia de los ojos.</span></div>
                    <div class="age-row"><strong>6 a 12 meses</strong><span>Seguimiento visual, fijación y alineación de los ojos.</span></div>
                    <div class="age-row"><strong>3 a 5 años</strong><span>Primera medición de agudeza visual; etapa clave para tratar el ojo perezoso.</span></div>
                    <div class="age-row"><strong>Edad escolar</strong><span>Control anual o según indicación del especialista.</span></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card">
                    <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:14px;"><i class="fa fa-clipboard-list" style="color:var(--primary);margin-right:8px;"></i>Recomendaciones para la cita</h3>
                    <ul style="font-size:13.5px;color:#555;line-height:2;padding-left:18px;margin:0;">
                        <li>Procure que el niño llegue descansado y alimentado</li>
                        <li>Traiga sus gafas actuales y fórmulas anteriores, si las tiene</li>
                        <li>Puede traer un juguete o cuento que le dé tranquilidad</li>
                        <li>Si se requiere dilatación, la visión puede quedar borrosa por algunas horas</li>
                        <li>Comparta con el especialista antecedentes de prematuridad o problemas visuales en la familia</li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background:var(--primary-ultra);border-left:4px solid var(--primary);border-radius:10px;padding:20px 24px;margin-bottom:40px;">
            <p style="font-size:14px;color:#555;margin:0;line-height:1.8;"><i class="fa fa-info-circle" style="color:var(--primary);margin-right:8px;"></i><strong>Importante:</strong> el ojo perezoso tiene mejores resultados cuando se trata <strong>antes de los 7 u 8 años</strong>. Si nota alguna señal de alerta, no espere a que su hijo se queje: solicite una valoración.</p>
        </div>

        @include('components.page-cta', ['secondaryHref' => route('consulta.oftalmologia'), 'secondaryLabel' => 'Ver Oftalmología adultos'])
    </div>
</section>
@endsection
