@extends('layout.app')
@section('title', 'Marco Legal')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .breadcrumb-custom a:hover { color: #fff; }
    .legal-card { background: #fff; border-radius: 14px; padding: 28px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border-left: 4px solid var(--primary); height: 100%; }
    .legal-card h4 { font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: var(--dark); margin-bottom: 10px; }
    .legal-card p, .legal-card li { font-size: 13.5px; color: #555; line-height: 1.8; }
    .legal-card ul { padding-left: 18px; margin: 8px 0; }
    .badge-ley { display: inline-block; background: var(--primary-ultra); color: var(--primary-dark); font-size: 10px; font-weight: 700; padding: 3px 10px; border-radius: 20px; letter-spacing: 0.5px; margin-bottom: 8px; text-transform: uppercase; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <a href="{{ route('landing.aboutUs') }}">Nuestra Institución</a><span>›</span>
            <span>Marco Legal</span>
        </div>
        <h1>Marco Legal</h1>
        <p>Normatividad que regula la prestación de servicios de salud en el Instituto Neurociencias de Nariño</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:10px;">Fundamento normativo</p>
        <h2 style="font-size:clamp(20px,2.5vw,32px);font-weight:800;color:var(--dark);margin-bottom:40px;">Legislación vigente aplicable</h2>
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Habilitación</span>
                    <h4>Resolución 3100 de 2019</h4>
                    <p>Define los procedimientos y condiciones de inscripción de los prestadores de servicios de salud y de habilitación de los servicios de salud. El Instituto Neurociencias de Nariño IPS S.A.S se encuentra debidamente habilitado ante la <strong>Secretaría de Salud Departamental de Nariño</strong>.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Sistema de Salud</span>
                    <h4>Ley 100 de 1993</h4>
                    <p>Marco general del Sistema General de Seguridad Social en Salud (SGSSS) de Colombia. Establece los principios de universalidad, solidaridad y eficiencia que rigen la prestación de servicios de salud en el país.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Historia Clínica</span>
                    <h4>Resolución 1995 de 1999</h4>
                    <p>Norma sobre diligenciamiento, administración, conservación y custodia de la historia clínica. Establece la obligación de conservar los registros clínicos por un mínimo de <strong>20 años</strong> contados desde la última atención.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Calidad</span>
                    <h4>Decreto 1011 de 2006</h4>
                    <p>Establece el Sistema Obligatorio de Garantía de Calidad de la Atención de Salud (SOGCS). El Instituto se acoge a los criterios de accesibilidad, oportunidad, seguridad, pertinencia y continuidad en la atención.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Datos personales</span>
                    <h4>Ley 1581 de 2012</h4>
                    <p>Ley Estatutaria de Protección de Datos Personales. Regula el tratamiento de los datos que los pacientes suministran al Instituto, garantizando sus derechos de acceso, rectificación, cancelación y oposición (ARCO). Ver nuestra <a href="{{ route('politicaPrivacidad') }}" style="color:var(--primary);font-weight:600;">Política de Privacidad</a>.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Supervisión</span>
                    <h4>Superintendencia Nacional de Salud</h4>
                    <p>El Instituto Neurociencias de Nariño IPS S.A.S se encuentra vigilado por la <strong>Superintendencia Nacional de Salud</strong>, entidad que ejerce la inspección, vigilancia y control de los prestadores de servicios de salud en Colombia.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Talento humano</span>
                    <h4>Resolución 2003 de 2014 — Ley 23 de 1981</h4>
                    <p>Estándares de habilitación en talento humano y ética médica. Todo el equipo profesional del Instituto acredita el registro ante la entidad correspondiente y actúa bajo los principios de la ética en el ejercicio de las profesiones de la salud.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="legal-card">
                    <span class="badge-ley">Derechos del paciente</span>
                    <h4>Resolución 13437 de 1991</h4>
                    <p>Establece el <strong>Decálogo de los Derechos de los Pacientes</strong>. El Instituto garantiza: atención digna, información veraz, consentimiento informado, confidencialidad, libre escogencia y derecho a segunda opinión médica.</p>
                </div>
            </div>

            <!-- Estados Financieros -->
            <div class="col-lg-12">
                <div class="legal-card" style="border-left-color:#c0820a; background:linear-gradient(135deg,#fffbf0,#fff8e6);">
                    <div style="display:flex; align-items:flex-start; gap:18px; flex-wrap:wrap;">
                        <div style="width:64px;height:64px;border-radius:16px;background:linear-gradient(135deg,#c0820a,#e0a030);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fa fa-chart-pie" style="color:#fff;font-size:26px;"></i>
                        </div>
                        <div style="flex:1; min-width:220px;">
                            <span class="badge-ley" style="background:#fff0cc; color:#7a5200;">Transparencia financiera</span>
                            <h4 style="color:#5a3800;">Estados Financieros</h4>
                            <p>Como parte de nuestro compromiso con la transparencia institucional, el Instituto Neurociencias de Nariño IPS S.A.S. publica sus estados financieros. Estos documentos reflejan el desempeño económico y la sostenibilidad de la institución.</p>
                        </div>
                        <div style="display:flex; align-items:center; padding-top:10px;">
                            <a href="{{ route('estadosFinancieros') }}" style="display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; padding:12px 24px; border-radius:25px; font-size:13px; font-weight:600; text-decoration:none; letter-spacing:0.3px;">
                                <i class="fa fa-chart-bar"></i> Ver Estados Financieros
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Certificaciones -->
        <div style="margin-top:60px; background:#fff; border-radius:16px; padding:36px 40px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
            <h3 style="font-size:17px;font-weight:800;color:var(--dark);margin-bottom:20px;text-transform:uppercase;letter-spacing:0.8px;">Certificaciones y Registros</h3>
            <div class="row g-3">
                <div class="col-md-4">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:18px;margin-top:2px;flex-shrink:0;"></i>
                        <div>
                            <strong style="font-size:13px;color:var(--dark);">Registro Especial de Prestadores</strong>
                            <p style="font-size:12.5px;color:#666;margin:4px 0 0;">REPS — Ministerio de Salud y Protección Social</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:18px;margin-top:2px;flex-shrink:0;"></i>
                        <div>
                            <strong style="font-size:13px;color:var(--dark);">Habilitación Departamental</strong>
                            <p style="font-size:12.5px;color:#666;margin:4px 0 0;">Secretaría de Salud Departamental de Nariño</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <i class="fa fa-check-circle" style="color:var(--primary);font-size:18px;margin-top:2px;flex-shrink:0;"></i>
                        <div>
                            <strong style="font-size:13px;color:var(--dark);">Vigilado Supersalud</strong>
                            <p style="font-size:12.5px;color:#666;margin:4px 0 0;">Superintendencia Nacional de Salud</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('landing.aboutUs') }}" class="btn-cta-outline" style="border-radius:25px;padding:12px 30px;font-size:13px;text-decoration:none;">Volver a Nuestra Institución</a>
        </div>
    </div>
</section>
@endsection

