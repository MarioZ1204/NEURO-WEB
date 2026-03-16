@extends('layout.app')
@section('title', 'Directorio Médico')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
    .doc-card { background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.07); transition:transform 0.3s,box-shadow 0.3s; height:100%; }
    .doc-card:hover { transform:translateY(-5px); box-shadow:0 15px 40px rgba(74,107,104,0.18); }
    .doc-avatar { width:100%; height:180px; background:linear-gradient(135deg, var(--primary-ultra), var(--primary-pale)); display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden; }
    .doc-avatar .initials { width:80px; height:80px; border-radius:50%; background:linear-gradient(135deg, var(--primary), var(--primary-dark)); display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; font-weight:800; }
    .doc-specialty-badge { position:absolute; bottom:0; left:0; right:0; background:linear-gradient(135deg, var(--primary), var(--primary-dark)); color:#fff; font-size:10.5px; font-weight:700; text-align:center; padding:8px; text-transform:uppercase; letter-spacing:0.5px; }
    .doc-info { padding:20px 22px 24px; }
    .doc-info h5 { font-size:15px; font-weight:800; color:var(--dark); margin-bottom:4px; }
    .doc-info .reg { font-size:11px; color:var(--primary-light); font-weight:600; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:12px; }
    .doc-info p { font-size:13px; color:#666; line-height:1.7; margin:0; }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Directorio Médico</span>
        </div>
        <h1>Directorio Médico</h1>
        <p>Conozca a nuestro equipo de especialistas comprometidos con su bienestar neurológico</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <p style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:10px;">Nuestros especialistas</p>
        <h2 style="font-size:clamp(20px,2.5vw,32px);font-weight:800;color:var(--dark);margin-bottom:40px;">Equipo Médico Activo</h2>

        <div class="row g-4">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">MR</div>
                        <div class="doc-specialty-badge">Neurología · Epileptología</div>
                    </div>
                    <div class="doc-info">
                        <h5>Dr. Miguel Rosero</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Especialista en Neurología y Epileptología. Subespecialista en Epilepsia refractaria y Neurofisiología clínica.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">AC</div>
                        <div class="doc-specialty-badge">Epileptología</div>
                    </div>
                    <div class="doc-info">
                        <h5>Dra. Andrea Castillo</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Neuróloga epileptóloga con énfasis en manejo de epilepsia en niños y adultos y evaluación prequirúrgica de epilepsia.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">LP</div>
                        <div class="doc-specialty-badge">Neurorrehabilitación</div>
                    </div>
                    <div class="doc-info">
                        <h5>Lic. Laura Pantoja</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Fisioterapeuta especialista en Neurorrehabilitación con énfasis en pacientes post-ACV y trauma craneoencefálico.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">CM</div>
                        <div class="doc-specialty-badge">Psiquiatría</div>
                    </div>
                    <div class="doc-info">
                        <h5>Dr. Carlos Murillo</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Psiquiatra con experiencia en trastornos del estado de ánimo, ansiedad y condiciones psiquiátricas asociadas a enfermedades neurológicas.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">VB</div>
                        <div class="doc-specialty-badge">Neuropsicología</div>
                    </div>
                    <div class="doc-info">
                        <h5>Psc. Valentina Bravo</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Neuropsicóloga especializada en evaluación de funciones cognitivas, diagnóstico de demencias y rehabilitación neuropsicológica.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">JO</div>
                        <div class="doc-specialty-badge">Psicología</div>
                    </div>
                    <div class="doc-info">
                        <h5>Psc. Juliana Ortega</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Psicóloga clínica con enfoque en intervención terapéutica para pacientes con enfermedades neurológicas crónicas y sus familias.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="doc-card">
                    <div class="doc-avatar">
                        <div class="initials">SP</div>
                        <div class="doc-specialty-badge">Medicina General</div>
                    </div>
                    <div class="doc-info">
                        <h5>Dra. Sandra Patiño</h5>
                        <p class="reg">RM: 000000 · Col</p>
                        <p>Médica general con experiencia en atención de primer nivel, manejo de enfermedades crónicas y coordinación de cuidado multidisciplinario.</p>
                    </div>
                </div>
            </div>

        </div>

        <div style="background:var(--primary-ultra);border:1px solid var(--primary-pale);border-radius:14px;padding:26px 30px;margin-top:50px;text-align:center;">
            <p style="font-size:14px;color:#555;margin:0;">
                <i class="fa fa-info-circle" style="color:var(--primary);margin-right:8px;"></i>
                Los números de registro médico (RM) deben ser verificados con la institución. Para solicitar una cita con algún especialista, contáctenos por nuestros canales de atención.
            </p>
        </div>

        <div style="text-align:center;margin-top:30px;">
            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:13px 35px;font-size:13px;text-decoration:none;">Solicitar Cita</a>
        </div>
    </div>
</section>
@endsection
