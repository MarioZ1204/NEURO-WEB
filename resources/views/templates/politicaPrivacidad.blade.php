@extends('layout.app')
@section('title', 'Política de Privacidad')
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

    .policy-section {
        background: #fff;
        border-radius: 16px;
        padding: 35px 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        margin-bottom: 24px;
        border-left: 4px solid var(--primary);
    }
    .policy-section h2 {
        font-size: 17px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--dark);
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .policy-section h2 .num {
        width: 30px; height: 30px;
        background: var(--primary);
        color: #fff;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 900;
        flex-shrink: 0;
    }
    .policy-section p, .policy-section li {
        font-size: 14px;
        color: #555;
        line-height: 1.9;
    }
    .policy-section ul, .policy-section ol {
        padding-left: 20px;
        margin: 10px 0;
    }
    .policy-section ul li, .policy-section ol li {
        margin-bottom: 6px;
    }
    .policy-date {
        font-size: 13px;
        color: var(--primary-light);
        font-weight: 600;
        margin-bottom: 30px;
    }
    .intro-banner {
        background: var(--primary-ultra);
        border: 1px solid var(--primary-pale);
        border-radius: 14px;
        padding: 28px 32px;
        margin-bottom: 30px;
        border-left: 4px solid var(--primary);
    }
    .intro-banner p {
        font-size: 14px;
        color: #444;
        line-height: 1.9;
        margin: 0;
    }
    .sic-banner {
        background: var(--primary-ultra);
        border: 1px solid var(--primary-pale);
        border-radius: 14px;
        padding: 25px 30px;
        margin-top: 30px;
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .sic-banner i { font-size: 28px; color: var(--primary); flex-shrink: 0; }
    .sic-banner p { font-size: 13.5px; color: #555; margin: 0; line-height: 1.7; }
    .sic-banner a { color: var(--primary); font-weight: 700; }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a>
            <span>›</span>
            <span>Política de Privacidad</span>
        </div>
        <h1>Política de Privacidad</h1>
        <p>Tratamiento de datos personales — Instituto Neurociencias de Nariño IPS S.A.S</p>
    </div>
</div>

<section style="background:#f8faf9; padding: 70px 0;">
    <div class="container" style="max-width: 860px;">
        <p class="policy-date"><i class="fa fa-calendar-alt"></i> &nbsp;Última actualización: {{ date('d \d\e F \d\e Y') }}</p>

        <!-- Declaración introductoria -->
        <div class="intro-banner">
            <p>En cumplimiento de lo dispuesto en la Ley 1581 de 2012, el Decreto 1377 de 2013 y demás normas concordantes, el <strong>Instituto Neurociencias de Nariño IPS S.A.S</strong>, con <strong>NIT No. 901164565</strong>, con domicilio en Pasto, Nariño, Colombia, en calidad de responsable del tratamiento de sus datos personales, informa que los datos personales recolectados serán tratados conforme a la Política de Tratamiento de Datos Personales adoptada por la entidad.</p>
        </div>

        <!-- 1 -->
        <div class="policy-section">
            <h2><span class="num">1</span> Responsable del Tratamiento</h2>
            <p><strong>Razón social:</strong> Instituto Neurociencias de Nariño IPS S.A.S<br>
               <strong>NIT:</strong> 901164565<br>
               <strong>Dirección:</strong> Pasto, Nariño, Colombia<br>
               <strong>Correo electrónico:</strong> juridicoinnar@gmail.com<br>
               <strong>Teléfono:</strong> {{ setting('phone_fixed_display') }} </p>
        </div>

        <!-- 2 -->
        <div class="policy-section">
            <h2><span class="num">2</span> Marco Legal</h2>
            <p>Esta política se rige por la Ley Estatutaria 1581 de 2012 (Ley de Protección de Datos Personales), el Decreto Reglamentario 1377 de 2013 y demás normas concordantes vigentes en la República de Colombia.</p>
        </div>

        <!-- 3 -->
        <div class="policy-section">
            <h2><span class="num">3</span> Datos Personales Recopilados</h2>
            <p>Recopilamos únicamente los datos necesarios para la prestación de nuestros servicios de salud:</p>
            <ul>
                <li>Datos de identificación: nombre, documento de identidad, fecha de nacimiento.</li>
                <li>Datos de contacto: dirección, teléfono, correo electrónico.</li>
                <li>Datos de salud: historia clínica, diagnósticos, tratamientos (datos sensibles).</li>
                <li>Datos del responsable o acudiente (en caso de menores de edad).</li>
                <li>Datos financieros para facturación: entidad prestadora de salud, número de afiliación.</li>
                <li>Antecedentes judiciales, fiscales, disciplinarios, contravencionales de violencia sexual, de alimentos, de redes sociales, de índice de propietarios, municipales, departamentales y los que puedan ser recaudados mediante los aplicativos dispuestos por la rama judicial.</li>
            </ul>
        </div>

        <!-- 4 -->
        <div class="policy-section">
            <h2><span class="num">4</span> Finalidades del Tratamiento</h2>
            <p>Sus datos serán utilizados exclusivamente para:</p>
            <ul>
                <li>Desarrollar el objeto social y las actividades propias de la entidad.</li>
                <li>Gestionar relaciones comerciales, contractuales, laborales o civiles.</li>
                <li>Realizar procesos administrativos, contables, financieros y de facturación.</li>
                <li>Prestar los servicios de salud solicitados (consultas, terapias, electrodiagnósticos).</li>
                <li>Gestionar la historia clínica del paciente conforme a la normativa sanitaria.</li>
                <li>Contactar al titular mediante correo electrónico, teléfono, mensajes de texto u otros medios autorizados.</li>
                <li>Enviar información institucional, comercial, publicitaria o de interés (con consentimiento explícito del titular).</li>
                <li>Publicar sus comentarios en la página web institucional.</li>
                <li>Dar cumplimiento a obligaciones legales, contractuales y regulatorias ante entidades de salud.</li>
                <li>Las demás finalidades autorizadas expresamente por el titular.</li>
            </ul>
        </div>

        <!-- 5 -->
        <div class="policy-section">
            <h2><span class="num">5</span> Derechos del Titular (ARCO)</h2>
            <p>Como titular de datos personales usted tiene derecho a:</p>
            <ol>
                <li>Conocer, actualizar y rectificar sus datos personales.</li>
                <li>Solicitar prueba de la autorización otorgada.</li>
                <li>Ser informado respecto del uso que se ha dado a sus datos personales.</li>
                <li>Revocar la autorización y/o solicitar la supresión de sus datos cuando sea procedente.</li>
                <li>Acceder gratuitamente a sus datos personales objeto de tratamiento.</li>
                <li>Oponerse al tratamiento de sus datos para finalidades distintas a la prestación de salud.</li>
            </ol>
            <p style="margin-top:12px;">Para ejercer sus derechos, envíe su solicitud a: <strong>juridicoinnar@gmail.com</strong> con asunto «Solicitud ARCO». Responderemos en un plazo máximo de <strong>15 días hábiles</strong>.</p>
            <p style="margin-top:8px;">La Política de Tratamiento de Datos Personales completa puede ser solicitada a través del mismo correo electrónico.</p>
        </div>

        <!-- 6 -->
        <div class="policy-section">
            <h2><span class="num">6</span> Datos Sensibles</h2>
            <p>Los datos relacionados con la salud son considerados <strong>datos sensibles</strong> conforme al artículo 5 de la Ley 1581 de 2012. Su recopilación y tratamiento sólo se realiza con el consentimiento explícito del titular, son estrictamente necesarios para la atención médica y son protegidos con las medidas de seguridad adecuadas.</p>
        </div>

        <!-- 7 -->
        <div class="policy-section">
            <h2><span class="num">7</span> Seguridad de la Información</h2>
            <p>Implementamos medidas técnicas, administrativas y físicas para proteger sus datos personales contra acceso no autorizado, pérdida, alteración o divulgación indebida, incluyendo:</p>
            <ul>
                <li>Control de acceso restringido a expedientes clínicos.</li>
                <li>Cifrado de comunicaciones electrónicas.</li>
                <li>Capacitación periódica del personal en protección de datos.</li>
                <li>Políticas internas de confidencialidad y no divulgación.</li>
            </ul>
        </div>

        <!-- 8 -->
        <div class="policy-section">
            <h2><span class="num">8</span> Vigencia y Conservación</h2>
            <p>Los datos de historia clínica se conservan por un mínimo de <strong>20 años</strong> a partir de la fecha de la última atención, conforme a la Resolución 1995 de 1999 del Ministerio de Salud. Los demás datos se conservarán durante el tiempo necesario para cumplir la finalidad por la que fueron recabados o mientras subsista la obligación legal.</p>
        </div>

        <!-- 9 -->
        <div class="policy-section">
            <h2><span class="num">9</span> Cambios en la Política</h2>
            <p>Nos reservamos el derecho de actualizar esta política para reflejar cambios en nuestra práctica o en la legislación vigente. Cualquier modificación sustancial será comunicada a través de nuestro sitio web o por los medios de contacto registrados.</p>
        </div>

        <!-- 10 -->
        <div class="policy-section">
            <h2><span class="num">10</span> Contacto y Reclamaciones</h2>
            <p>Para consultas, solicitudes o reclamaciones relacionadas con el tratamiento de sus datos personales, contáctenos en:<br>
               <strong>Correo:</strong> juridicoinnar@gmail.com<br>
               <strong>Dirección:</strong> Pasto, Nariño, Colombia</p>
        </div>

        <!-- SIC Banner -->
        <div class="sic-banner">
            <i class="fa fa-balance-scale"></i>
            <p>Si considera que sus derechos no han sido atendidos, puede presentar una queja ante la <strong>Superintendencia de Industria y Comercio (SIC)</strong>, entidad que ejerce la inspección, vigilancia y control del tratamiento de datos personales en Colombia. Más información en <a href="https://www.sic.gov.co" target="_blank" rel="noopener">www.sic.gov.co</a></p>
        </div>

        <!-- Back button -->
        <div style="text-align:center; margin-top:40px;">
            <a href="{{ route('landing.inicio') }}" class="btn-cta-solid" style="border-radius:25px; padding:13px 35px; font-size:13px; text-decoration:none;">Volver al inicio</a>
        </div>
    </div>
</section>

@endsection
