@extends('layout.app')
@section('title', 'Evalúe su Salud del Sueño')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: var(--primary-pale); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: var(--primary-light); margin-bottom: 15px; }
    .breadcrumb-custom a { color: var(--primary-pale); text-decoration: none; }
</style>

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Educación al Paciente</span><span>›</span>
            <span>Evalúe su Sueño</span>
        </div>
        <h1>Evalúe su Salud del Sueño</h1>
        <p>Encuesta de detección de trastornos del sueño — Una herramienta de orientación clínica</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div style="background:#fff;border-radius:14px;padding:24px 28px;box-shadow:0 4px 20px rgba(0,0,0,0.06);margin-bottom:30px;">
                    <p style="font-size:14px;font-weight:800;color:var(--dark);margin-bottom:10px;">¿Para qué sirve este cuestionario?</p>
                    <p style="font-size:13.5px;color:#555;line-height:1.9;margin-bottom:12px;">El sueño es un proceso fundamental para el adecuado funcionamiento del organismo. Alteraciones en su calidad, duración o estructura pueden estar asociadas a diferentes condiciones médicas, neurológicas o emocionales que, en muchos casos, pasan desapercibidas.</p>
                    <p style="font-size:13.5px;color:#555;line-height:1.9;margin-bottom:12px;">Este instrumento, basado en criterios de la Medicina del Sueño, evalúa aspectos como la calidad del sueño, la somnolencia diurna, la respiración durante el descanso, los hábitos, el estado emocional y el impacto en la vida cotidiana. Sus resultados permiten:</p>
                    <ul style="font-size:13.5px;color:#555;line-height:2;margin-bottom:12px;padding-left:20px;">
                        <li>Detectar signos de alerta relacionados con trastornos del sueño</li>
                        <li>Orientar la necesidad de valoración por un profesional de la salud</li>
                        <li>Facilitar la toma de decisiones sobre consulta con especialista en sueño</li>
                        <li>Promover el cuidado y la higiene del sueño</li>
                    </ul>
                    <p style="font-size:13px;color:#888;line-height:1.7;margin:0;"><i class="fa fa-info-circle" style="color:var(--primary);margin-right:6px;"></i><strong>Importante:</strong> Este cuestionario no constituye un diagnóstico médico. La información suministrada será tratada con confidencialidad y utilizada únicamente con fines de orientación en salud.</p>
                </div>

                @include('partials.encuesta-sueno')

            </div>
        </div>

        @include('components.page-cta', [
            'title' => '¿Quiere evaluar su sueño con un especialista?',
            'subtitle' => 'Este cuestionario orienta; el diagnóstico lo confirma nuestro equipo de medicina del sueño.',
        ])
    </div>
</section>
@endsection
