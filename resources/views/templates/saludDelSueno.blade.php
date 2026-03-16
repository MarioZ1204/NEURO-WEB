@extends('layout.app')
@section('title', 'Evalúe su Salud del Sueño')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, #0d1b2a 0%, #1a2e4a 100%); padding: 80px 0 60px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(28px,4vw,48px); font-weight: 900; margin-bottom: 12px; }
    .page-hero p { font-size: 16px; color: rgba(200,222,221,0.85); margin: 0; }
    .breadcrumb-custom { display: flex; justify-content: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.6); margin-bottom: 15px; }
    .breadcrumb-custom a { color: rgba(255,255,255,0.82); text-decoration: none; }
    .quiz-box { background:#fff; border-radius:18px; box-shadow:0 8px 40px rgba(0,0,0,0.09); padding:44px 48px; }
    .quiz-q { font-size:14px; font-weight:700; color:var(--dark); margin-bottom:12px; }
    .quiz-q span { font-size:12px; color:var(--primary-light); font-weight:500; display:block; margin-top:4px; }
    .scale-opts { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:24px; }
    .scale-opts label { display:flex; flex-direction:column; align-items:center; gap:4px; cursor:pointer; }
    .scale-opts input[type=radio] { accent-color: var(--primary); width:16px; height:16px; }
    .scale-opts .opt-label { font-size:11px; color:#777; text-align:center; max-width:60px; line-height:1.3; }
    .cf-submit { padding:14px 40px; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; border:none; border-radius:10px; font-size:13.5px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; cursor:pointer; font-family:'Poppins',sans-serif; transition:opacity 0.2s,transform 0.2s; }
    .cf-submit:hover { opacity:0.88; transform:translateY(-1px); }
    .result-box { display:none; background:var(--primary-ultra); border:1.5px solid var(--primary-pale); border-radius:14px; padding:28px 32px; margin-top:32px; }
    .result-score { font-size:42px; font-weight:900; color:var(--primary); }
    @media (max-width:576px) { .quiz-box { padding:28px 20px; } .scale-opts { gap:4px; } }
</style>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb-custom">
            <a href="{{ route('landing.inicio') }}">Inicio</a><span>›</span>
            <span>Trabaje con Nosotros</span><span>›</span>
            <span>Evalúe su Sueño</span>
        </div>
        <h1>Evalúe su Salud del Sueño</h1>
        <p>Cuestionario de somnolencia diurna de Epworth — Una herramienta de detección clínica</p>
    </div>
</div>

<section style="background:#f8faf9; padding:70px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div style="background:#fff;border-radius:14px;padding:24px 28px;box-shadow:0 4px 20px rgba(0,0,0,0.06);margin-bottom:30px;">
                    <p style="font-size:13.5px;color:#555;line-height:1.9;margin:0;"><i class="fa fa-info-circle" style="color:var(--primary);margin-right:8px;"></i>La <strong>Escala de Somnolencia de Epworth</strong> evalúa la probabilidad de quedarse dormido en 8 situaciones cotidianas. Es una herramienta de <em>detección</em>. Un puntaje elevado no es diagnóstico por sí solo —requiere evaluación médica especializada.</p>
                </div>

                <div class="quiz-box">
                    <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:8px;">Cuestionario de Somnolencia de Epworth</h3>
                    <p style="font-size:13px;color:#777;margin-bottom:28px;">Para cada situación, indique qué tan probable es que se quede dormido. Use la escala: <strong>0 = nunca</strong>, <strong>1 = poca probabilidad</strong>, <strong>2 = probabilidad moderada</strong>, <strong>3 = alta probabilidad</strong>.</p>

                    <form id="epworthForm">
                        @php
                        $situaciones = [
                            'Sentado leyendo',
                            'Viendo televisión',
                            'Sentado inactivo en un lugar público (teatro, reunión)',
                            'Como pasajero en un carro durante una hora sin parar',
                            'Descansando en la tarde cuando las circunstancias lo permiten',
                            'Sentado hablando con alguien',
                            'Sentado tranquilamente después de almorzar sin haber bebido alcohol',
                            'En un carro mientras espera unos minutos en el tráfico',
                        ];
                        @endphp

                        @foreach($situaciones as $i => $sit)
                            <div style="margin-bottom:22px; padding-bottom:18px; {{ !$loop->last ? 'border-bottom:1px solid #f0f4f3;' : '' }}">
                                <p class="quiz-q">{{ $i+1 }}. {{ $sit }}</p>
                                <div class="scale-opts">
                                    @foreach([0=>'Nunca', 1=>'Poca probabilidad', 2=>'Moderada', 3=>'Alta probabilidad'] as $val => $lbl)
                                        <label>
                                            <input type="radio" name="q{{ $i }}" value="{{ $val }}" required>
                                            <span style="font-size:16px;font-weight:700;color:var(--primary);">{{ $val }}</span>
                                            <span class="opt-label">{{ $lbl }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div style="text-align:center;margin-top:10px;">
                            <button type="button" onclick="calcularEpworth()" class="cf-submit">Ver mi resultado</button>
                        </div>
                    </form>

                    <div class="result-box" id="resultBox">
                        <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;">Su puntaje</p>
                        <div class="result-score" id="resultScore">–</div>
                        <p style="font-size:13px;color:#666;margin:6px 0 0;">/ 24 puntos posibles</p>
                        <hr style="margin:18px 0;border-color:#d8ecea;">
                        <p id="resultMsg" style="font-size:14px;color:#444;line-height:1.85;margin-bottom:18px;"></p>
                        <p style="font-size:12.5px;color:#888;line-height:1.7;"><strong>Recuerde:</strong> Este cuestionario no reemplaza una consulta médica. Si obtiene un puntaje de 10 o más, o tiene dudas sobre su sueño, consulte con nuestro equipo de la <a href="{{ route('servicios.clinicaSueno') }}" style="color:var(--primary);font-weight:700;">Clínica del Sueño</a>.</p>
                        <div style="margin-top:18px;">
                            <a href="{{ route('landing.inicio') }}#map" class="btn-cta-solid" style="border-radius:25px;padding:11px 28px;font-size:12.5px;text-decoration:none;">Solicitar cita</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
function calcularEpworth() {
    const form = document.getElementById('epworthForm');
    let total = 0;
    for (let i = 0; i < 8; i++) {
        const sel = form.querySelector('input[name="q' + i + '"]:checked');
        if (!sel) { alert('Por favor responda todas las preguntas antes de calcular.'); return; }
        total += parseInt(sel.value);
    }
    document.getElementById('resultScore').textContent = total;
    let msg = '';
    if (total <= 5) {
        msg = '<strong style="color:#1b6b3a;">Puntaje normal (0-5):</strong> Su nivel de somnolencia diurna es normal. Siga manteniendo buenos hábitos de sueño.';
    } else if (total <= 9) {
        msg = '<strong style="color:#c0620a;">Somnolencia leve (6-9):</strong> Tiene una somnolencia diurna leve. Evalúe sus hábitos de sueño: horarios irregulares, uso de pantallas o estrés pueden estar contribuyendo.';
    } else if (total <= 15) {
        msg = '<strong style="color:#c0392b;">Somnolencia moderada (10-15):</strong> Su somnolencia es moderada y puede estar afectando su calidad de vida y seguridad. Se recomienda consultar con un especialista en sueño.';
    } else {
        msg = '<strong style="color:#8d1f1f;">Somnolencia severa (16-24):</strong> Su nivel de somnolencia es severo. Por favor consulte a la brevedad con nuestro equipo de la Clínica del Sueño para una evaluación completa.';
    }
    document.getElementById('resultMsg').innerHTML = msg;
    const rb = document.getElementById('resultBox');
    rb.style.display = 'block';
    rb.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>
@endsection
