{{-- Encuesta reutilizable de detección de trastornos del sueño --}}
<style>
    .quiz-box { background:#fff; border-radius:18px; box-shadow:0 8px 40px rgba(0,0,0,0.09); padding:44px 48px; }
    .section-title { font-size:13px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:var(--primary); background:var(--primary-ultra); border-left:4px solid var(--primary); padding:10px 16px; border-radius:0 8px 8px 0; margin:32px 0 20px; }
    .quiz-q { font-size:14px; font-weight:700; color:var(--dark); margin-bottom:12px; }
    .scale-opts { display:grid; grid-template-columns:repeat(4,1fr); gap:8px; margin-bottom:24px; }
    .scale-opts input[type=radio] { display:none; }
    .scale-opts label { display:flex; flex-direction:column; align-items:center; gap:6px; cursor:pointer; padding:10px 6px; border-radius:10px; border:0.5px solid #d8ecea; background:#fff; transition:border-color 0.15s, background 0.15s; }
    .scale-opts label:hover { border-color:#9FE1CB; background:#f2faf8; }
    .scale-opts input[type=radio]:checked + label { border:1.5px solid var(--primary); background:var(--primary-ultra); }
    .scale-opts .opt-num { font-size:20px; font-weight:700; color:var(--primary); }
    .scale-opts .opt-label { font-size:11px; color:#777; text-align:center; line-height:1.3; }
    .scale-opts input[type=radio]:checked + label .opt-num { color:var(--primary-dark); }
    .scale-opts input[type=radio]:checked + label .opt-label { color:var(--primary); }
    .cf-submit { padding:14px 40px; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; border:none; border-radius:10px; font-size:13.5px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; cursor:pointer; font-family:'Poppins',sans-serif; transition:opacity 0.2s,transform 0.2s; }
    .cf-submit:hover { opacity:0.88; transform:translateY(-1px); }
    .result-box { display:none; background:var(--primary-ultra); border:1.5px solid var(--primary-pale); border-radius:14px; padding:28px 32px; margin-top:32px; }
    .result-score { font-size:42px; font-weight:900; color:var(--primary); }
    .epworth-block { display:none; background:var(--primary-ultra); border:1.5px solid var(--primary-pale); border-radius:14px; padding:28px 32px; margin:8px 0 24px; }
    .epworth-block.visible { display:block; }
    .alert-info-box { background:#fffbe6; border:1.5px solid #f0c040; border-radius:10px; padding:14px 18px; font-size:13px; color:#7a5c00; margin-bottom:18px; }
    .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center; }
    .modal-overlay.active { display:flex; }
    .modal-card { background:#fff; border-radius:18px; padding:36px 40px; width:100%; max-width:500px; box-shadow:0 20px 60px rgba(0,0,0,0.18); max-height:90vh; overflow-y:auto; }
    .modal-title { font-size:17px; font-weight:800; color:var(--dark); margin-bottom:6px; }
    .modal-subtitle { font-size:13px; color:#888; margin-bottom:24px; line-height:1.6; }
    .form-field { margin-bottom:16px; }
    .form-field label { display:block; font-size:12px; font-weight:700; color:#555; letter-spacing:0.5px; margin-bottom:6px; text-transform:uppercase; }
    .form-field input, .form-field select { width:100%; padding:10px 14px; border:1px solid #d8ecea; border-radius:8px; font-size:13.5px; color:var(--dark); font-family:'Poppins',sans-serif; outline:none; box-sizing:border-box; transition:border-color 0.2s; }
    .form-field input:focus, .form-field select:focus { border-color:var(--primary); }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
    @media (max-width:576px) {
        .quiz-box { padding:28px 20px; }
        .scale-opts { gap:4px; }
        .modal-card { padding:24px 20px; margin:16px; }
        .form-row { grid-template-columns:1fr; }
    }
</style>
<div id="encuesta-sueno">
                <div class="quiz-box">
                    <h3 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:8px;">Encuesta de Detección de Trastornos del Sueño</h3>
                    <p style="font-size:13px;color:#777;margin-bottom:28px;">Seleccione <strong>una única respuesta</strong> por cada pregunta. Use la escala: <strong>0 = nunca</strong>, <strong>1 = poca probabilidad</strong>, <strong>2 = probabilidad moderada</strong>, <strong>3 = alta probabilidad</strong>.</p>

                    <form id="sleepForm">

                        {{-- SECCIÓN 1 --}}
                        <div class="section-title">Sección 1 · Calidad y Duración del Sueño</div>
                        @php
                        $s1 = [
                            1 => '¿Tiene dificultad para conciliar el sueño?',
                            2 => '¿Se despierta varias veces durante la noche?',
                            3 => '¿Se despierta más temprano de lo deseado?',
                            4 => '¿Siente que su sueño no es reparador?',
                            5 => '¿Duerme menos de 6 horas por noche regularmente?',
                        ];
                        @endphp
                        @foreach($s1 as $n => $pregunta)
                            @include('partials.sleep-question', ['n' => $n, 'pregunta' => $pregunta, 'last' => $loop->last])
                        @endforeach

                        {{-- SECCIÓN 2 --}}
                        <div class="section-title">Sección 2 · Somnolencia Diurna</div>
                        <div style="margin-bottom:22px; padding-bottom:18px; border-bottom:1px solid #f0f4f3;">
                            <p class="quiz-q">6. ¿Siente sueño excesivo durante el día?</p>
                            <div class="scale-opts">
                                @foreach([0=>'Nunca', 1=>'Poca probabilidad', 2=>'Moderada', 3=>'Alta probabilidad'] as $val => $lbl)
                                    <input type="radio" name="q6" id="q6_{{ $val }}" value="{{ $val }}" required onchange="checkEpworth(this)">
                                    <label for="q6_{{ $val }}">
                                        <span class="opt-num">{{ $val }}</span>
                                        <span class="opt-label">{{ $lbl }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Bloque Epworth (se muestra si q6 >= 2) --}}
                        <div class="epworth-block" id="epworthBlock">
                            <div class="alert-info-box">
                                <i class="fa fa-exclamation-triangle" style="margin-right:6px;"></i>
                                Ha indicado somnolencia diurna moderada o alta. Por favor complete el <strong>Cuestionario de Somnolencia de Epworth</strong> a continuación, que nos permitirá evaluar este síntoma con mayor detalle.
                            </div>
                            <h4 style="font-size:15px;font-weight:800;color:var(--dark);margin-bottom:6px;">Cuestionario de Somnolencia de Epworth</h4>
                            <p style="font-size:12.5px;color:#777;margin-bottom:20px;">Para cada situación, indique qué tan probable es que se quede dormido.</p>
                            @php
                            $epworth = [
                                'e1' => 'Sentado leyendo',
                                'e2' => 'Viendo televisión',
                                'e3' => 'Sentado inactivo en un lugar público (teatro, reunión)',
                                'e4' => 'Como pasajero en un carro durante una hora sin parar',
                                'e5' => 'Descansando en la tarde cuando las circunstancias lo permiten',
                                'e6' => 'Sentado hablando con alguien',
                                'e7' => 'Sentado tranquilamente después de almorzar sin haber bebido alcohol',
                                'e8' => 'En un carro mientras espera unos minutos en el tráfico',
                            ];
                            @endphp
                            @foreach($epworth as $key => $sit)
                                <div style="margin-bottom:18px; padding-bottom:14px; {{ !$loop->last ? 'border-bottom:1px solid #ddeee9;' : '' }}">
                                    <p class="quiz-q">{{ $loop->index + 1 }}. {{ $sit }}</p>
                                    <div class="scale-opts">
                                        @foreach([0=>'Nunca', 1=>'Poca probabilidad', 2=>'Moderada', 3=>'Alta probabilidad'] as $val => $lbl)
                                            <input type="radio" name="{{ $key }}" id="{{ $key }}_{{ $val }}" value="{{ $val }}" class="epworth-input">
                                            <label for="{{ $key }}_{{ $val }}">
                                                <span class="opt-num">{{ $val }}</span>
                                                <span class="opt-label">{{ $lbl }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- SECCIÓN 3 --}}
                        <div class="section-title">Sección 3 · Respiración Durante el Sueño</div>
                        @php
                        $s3 = [
                            9  => '¿Le han dicho que ronca fuerte?',
                            10 => '¿Le han observado pausas en la respiración al dormir?',
                            11 => '¿Se despierta con sensación de ahogo o falta de aire?',
                            12 => '¿Se despierta con dolor de cabeza?',
                            13 => '¿Respira por la boca al dormir?',
                        ];
                        @endphp
                        @foreach($s3 as $n => $pregunta)
                            @include('partials.sleep-question', ['n' => $n, 'pregunta' => $pregunta, 'last' => $loop->last])
                        @endforeach

                        {{-- SECCIÓN 4 --}}
                        <div class="section-title">Sección 4 · Síntomas Neurológicos o Conductuales</div>
                        @php
                        $s4 = [
                            14 => '¿Tiene movimientos involuntarios al dormir?',
                            15 => '¿Habla, grita o actúa sueños mientras duerme?',
                            16 => '¿Siente necesidad irresistible de mover las piernas al acostarse?',
                            17 => '¿Tiene sensaciones incómodas en las piernas por la noche?',
                            18 => '¿Se despierta confundido o desorientado?',
                        ];
                        @endphp
                        @foreach($s4 as $n => $pregunta)
                            @include('partials.sleep-question', ['n' => $n, 'pregunta' => $pregunta, 'last' => $loop->last])
                        @endforeach

                        {{-- SECCIÓN 5 --}}
                        <div class="section-title">Sección 5 · Hábitos y Ritmo de Sueño</div>
                        @php
                        $s5 = [
                            19 => '¿Tiene horarios de sueño irregulares?',
                            20 => '¿Le cuesta dormir en horarios convencionales?',
                            21 => '¿Trabaja en turnos nocturnos o rotativos?',
                            22 => '¿Usa dispositivos electrónicos antes de dormir?',
                            23 => '¿Consume cafeína en la noche?',
                        ];
                        @endphp
                        @foreach($s5 as $n => $pregunta)
                            @include('partials.sleep-question', ['n' => $n, 'pregunta' => $pregunta, 'last' => $loop->last])
                        @endforeach

                        {{-- SECCIÓN 6 --}}
                        <div class="section-title">Sección 6 · Factores Emocionales</div>
                        @php
                        $s6 = [
                            24 => '¿Se siente ansioso al momento de dormir?',
                            25 => '¿Tiene pensamientos constantes que le impiden dormir?',
                            26 => '¿Se despierta por preocupaciones o estrés?',
                            27 => '¿Ha tenido episodios recientes de tristeza o depresión?',
                            28 => '¿Su estado emocional afecta su sueño?',
                        ];
                        @endphp
                        @foreach($s6 as $n => $pregunta)
                            @include('partials.sleep-question', ['n' => $n, 'pregunta' => $pregunta, 'last' => $loop->last])
                        @endforeach

                        {{-- SECCIÓN 7 --}}
                        <div class="section-title">Sección 7 · Impacto en la Vida Diaria</div>
                        @php
                        $s7 = [
                            29 => '¿Su sueño afecta su rendimiento laboral o académico?',
                            30 => '¿Tiene problemas de concentración o memoria que atribuya a un mal sueño?',
                            31 => '¿Se siente irritable o de mal humor por falta de sueño?',
                            32 => '¿Ha tenido accidentes o errores por somnolencia?',
                            33 => '¿Considera que su sueño afecta su calidad de vida?',
                        ];
                        @endphp
                        @foreach($s7 as $n => $pregunta)
                            @include('partials.sleep-question', ['n' => $n, 'pregunta' => $pregunta, 'last' => $loop->last])
                        @endforeach

                        <div style="text-align:center;margin-top:10px;">
                            <button type="button" onclick="calcularEncuesta()" class="cf-submit">Ver su resultado</button>
                        </div>
                    </form>

                    {{-- Resultado general --}}
                    <div class="result-box" id="resultBox">
                        <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:8px;">Su puntaje total</p>
                        <div class="result-score" id="resultScore">–</div>
                        <p style="font-size:13px;color:#666;margin:6px 0 0;">/ 99 puntos posibles</p>
                        <hr style="margin:18px 0;border-color:#d8ecea;">

                        {{-- Epworth resultado (solo si aplica) --}}
                        <div id="epworthResult" style="display:none;margin-bottom:18px;padding:16px 20px;background:#fff;border-radius:10px;border:1px solid #d8ecea;">
                            <p style="font-size:12px;letter-spacing:1.5px;text-transform:uppercase;color:var(--primary-light);font-weight:700;margin-bottom:4px;">Somnolencia de Epworth</p>
                            <span style="font-size:28px;font-weight:900;color:var(--primary);" id="epworthScore">–</span>
                            <span style="font-size:13px;color:#888;"> / 24</span>
                            <p id="epworthMsg" style="font-size:13px;color:#444;line-height:1.8;margin:8px 0 0;"></p>
                        </div>

                        <p id="resultMsg" style="font-size:14px;color:#444;line-height:1.85;margin-bottom:18px;"></p>
                        <div id="sectionAlerts" style="font-size:13px;color:#555;line-height:1.9;margin-bottom:18px;"></div>
                        <p style="font-size:12.5px;color:#888;line-height:1.7;"><strong>Recuerde:</strong> Este cuestionario no reemplaza una consulta médica. Si tiene dudas sobre su sueño, consulte con nuestro equipo especializado.</p>
                        <div style="margin-top:18px;">
                            <a href="#" class="btn-cta-solid" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal" onclick="window._fromSleepSurvey=true;">Solicitar cita</a>
                        </div>
                    </div>
                </div>
{{-- Modal datos personales --}}
<div class="modal-overlay" id="datosModal">
    <div class="modal-card">
        <p class="modal-title">Antes de ver su resultado</p>
        <p class="modal-subtitle">Por favor complete sus datos de contacto. Esta información es confidencial y se utiliza únicamente con fines de orientación en salud.</p>

        <div class="form-row">
            <div class="form-field">
                <label>Nombres</label>
                <input type="text" id="d_nombres" placeholder="Sus nombres" autocomplete="given-name">
            </div>
            <div class="form-field">
                <label>Apellidos</label>
                <input type="text" id="d_apellidos" placeholder="Sus apellidos" autocomplete="family-name">
            </div>
        </div>

        <div class="form-row">
            <div class="form-field">
                <label>Género</label>
                <select id="d_genero">
                    <option value="">Seleccione...</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="No binario">No binario</option>
                    <option value="Prefiero no decir">Prefiero no decir</option>
                </select>
            </div>
            <div class="form-field">
                <label>Edad</label>
                <input type="number" id="d_edad" placeholder="Años" min="1" max="120" autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-field">
                <label>Teléfono principal</label>
                <input type="tel" id="d_tel1" placeholder="Ej: 300 123 4567" autocomplete="tel">
            </div>
            <div class="form-field">
                <label>Teléfono alternativo <span style="font-weight:400;color:#aaa;">(opcional)</span></label>
                <input type="tel" id="d_tel2" placeholder="Opcional" autocomplete="off">
            </div>
        </div>

        <div class="form-field">
            <label>Correo electrónico</label>
            <input type="email" id="d_email" placeholder="correo@ejemplo.com" autocomplete="email">
        </div>

        <div id="datosError" style="display:none;font-size:12.5px;color:#c0392b;margin-bottom:12px;padding:10px 14px;background:#fdf0ef;border-radius:8px;border-left:3px solid #c0392b;"></div>

        <div style="display:flex;gap:10px;margin-top:8px;">
            <button onclick="cerrarModal()" style="flex:1;padding:12px;background:#f5f5f5;border:none;border-radius:8px;font-size:13px;font-weight:600;color:#666;cursor:pointer;font-family:'Poppins',sans-serif;">Cancelar</button>
            <button onclick="confirmarDatos()" class="cf-submit" style="flex:2;padding:12px 20px;">Ver su resultado</button>
        </div>
    </div>
</div>
<script>
let _pendingResults = null;

function checkEpworth(radio) {
    const block = document.getElementById('epworthBlock');
    const inputs = block.querySelectorAll('.epworth-input');
    if (parseInt(radio.value) >= 2) {
        block.classList.add('visible');
        inputs.forEach(i => i.required = true);
    } else {
        block.classList.remove('visible');
        inputs.forEach(i => { i.required = false; i.checked = false; });
    }
}

function calcularEncuesta() {
    const form = document.getElementById('sleepForm');

    // Preguntas principales: sección 1 (1-5), sección 2 (6), secciones 3-7 (9-33)
    const mainQs = [1,2,3,4,5,6,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33];
    let total = 0;
    for (const n of mainQs) {
        const sel = form.querySelector('input[name="q' + n + '"]:checked');
        if (!sel) { alert('Por favor responda todas las preguntas antes de calcular.'); return; }
        total += parseInt(sel.value);
    }

    // Epworth (solo si q6 >= 2)
    const q6val = parseInt(form.querySelector('input[name="q6"]:checked').value);
    let epworthTotal = null;
    if (q6val >= 2) {
        epworthTotal = 0;
        for (let i = 1; i <= 8; i++) {
            const sel = form.querySelector('input[name="e' + i + '"]:checked');
            if (!sel) { alert('Por favor complete el Cuestionario de Epworth antes de calcular.'); return; }
            epworthTotal += parseInt(sel.value);
        }
    }

    // Guardar y abrir modal
    _pendingResults = { total, epworthTotal, form };
    document.getElementById('datosModal').classList.add('active');
    setTimeout(() => document.getElementById('d_nombres').focus(), 100);
}

function cerrarModal() {
    document.getElementById('datosModal').classList.remove('active');
    document.getElementById('datosError').style.display = 'none';
}

function confirmarDatos() {
    const nombres   = document.getElementById('d_nombres').value.trim();
    const apellidos = document.getElementById('d_apellidos').value.trim();
    const genero    = document.getElementById('d_genero').value;
    const edad      = document.getElementById('d_edad').value.trim();
    const tel1      = document.getElementById('d_tel1').value.trim();
    const tel2      = document.getElementById('d_tel2').value.trim();
    const email     = document.getElementById('d_email').value.trim();
    const errEl     = document.getElementById('datosError');

    const errores = [];
    if (!nombres)   errores.push('Nombres');
    if (!apellidos) errores.push('Apellidos');
    if (!genero)    errores.push('Género');
    if (!edad || isNaN(edad) || edad < 1 || edad > 120) errores.push('Edad válida');
    if (!tel1)      errores.push('Teléfono principal');
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errores.push('Correo electrónico válido');

    if (errores.length) {
        errEl.style.display = 'block';
        errEl.textContent = 'Por favor complete correctamente: ' + errores.join(', ') + '.';
        return;
    }

    const pending = _pendingResults || {};
    const payload = {
        nombres: nombres,
        apellidos: apellidos,
        genero: genero,
        edad: edad,
        telefono: tel1,
        telefono_alt: tel2,
        email: email,
        puntaje: pending.total,
        epworth: pending.epworthTotal,
    };

    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
    const token = tokenMeta ? tokenMeta.getAttribute('content') : '';

    fetch('{{ route('encuestaSueno.enviar') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify(payload)
    }).catch(function () { /* el resultado se muestra igual */ });

    window._fromSleepSurvey = true;
    cerrarModal();
    mostrarResultado(pending);
}

function mostrarResultado({ total, epworthTotal, form }) {
    document.getElementById('resultScore').textContent = total;

    // Rangos ajustados a 33 preguntas × 3 = 99 pts máximo
    let msg = '';
    if (total <= 19) {
        msg = '<strong style="color:#1b6b3a;">Riesgo bajo (0–19):</strong> Sus respuestas no evidencian señales de alerta significativas. Continúe con buenos hábitos de sueño e higiene del descanso.';
    } else if (total <= 44) {
        msg = '<strong style="color:#c0620a;">Riesgo moderado (20–44):</strong> Hay algunos aspectos de su sueño que podrían estar afectando su bienestar. Se recomienda revisar sus hábitos y considerar una consulta preventiva con un especialista.';
    } else if (total <= 69) {
        msg = '<strong style="color:#c0392b;">Riesgo alto (45–69):</strong> Sus respuestas sugieren alteraciones importantes del sueño. Se recomienda consultar con un especialista en sueño a la brevedad.';
    } else {
        msg = '<strong style="color:#8d1f1f;">Riesgo muy alto (70–99):</strong> Sus respuestas indican alteraciones severas del sueño en múltiples áreas. Por favor, consulte con nuestro equipo de la Clínica del Sueño con carácter de urgencia.';
    }
    document.getElementById('resultMsg').innerHTML = msg;

    // Detalle por sección — números actualizados
    const secciones = [
        { label: 'Calidad y duración del sueño',        qs: [1,2,3,4,5] },
        { label: 'Somnolencia diurna',                  qs: [6] },
        { label: 'Respiración durante el sueño',         qs: [9,10,11,12,13] },
        { label: 'Síntomas neurológicos o conductuales', qs: [14,15,16,17,18] },
        { label: 'Hábitos y ritmo de sueño',             qs: [19,20,21,22,23] },
        { label: 'Factores emocionales',                 qs: [24,25,26,27,28] },
        { label: 'Impacto en la vida diaria',            qs: [29,30,31,32,33] },
    ];
    let alertsHtml = '<p style="font-size:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--primary-light);margin-bottom:10px;">Detalle por sección</p>';
    for (const sec of secciones) {
        let secTotal = 0;
        for (const n of sec.qs) {
            secTotal += parseInt(form.querySelector('input[name="q' + n + '"]:checked').value);
        }
        const max = sec.qs.length * 3;
        const pct = Math.round((secTotal / max) * 100);
        const color = pct <= 33 ? '#1b6b3a' : pct <= 66 ? '#c0620a' : '#c0392b';
        alertsHtml += `
            <div style="margin-bottom:10px;">
                <div style="display:flex;justify-content:space-between;font-size:12.5px;margin-bottom:4px;">
                    <span style="color:#444;">${sec.label}</span>
                    <span style="font-weight:700;color:${color};">${secTotal}/${max}</span>
                </div>
                <div style="background:#e2efec;border-radius:6px;height:6px;">
                    <div style="width:${pct}%;background:${color};border-radius:6px;height:6px;transition:width 0.6s;"></div>
                </div>
            </div>`;
    }
    document.getElementById('sectionAlerts').innerHTML = alertsHtml;

    // Resultado Epworth
    if (epworthTotal !== null) {
        document.getElementById('epworthResult').style.display = 'block';
        document.getElementById('epworthScore').textContent = epworthTotal;
        let emsg = '';
        if (epworthTotal <= 5) {
            emsg = '<strong style="color:#1b6b3a;">Normal (0–5):</strong> Su nivel de somnolencia diurna es normal.';
        } else if (epworthTotal <= 9) {
            emsg = '<strong style="color:#c0620a;">Leve (6–9):</strong> Somnolencia diurna leve. Evalúe sus hábitos de sueño.';
        } else if (epworthTotal <= 15) {
            emsg = '<strong style="color:#c0392b;">Moderada (10–15):</strong> Su somnolencia puede estar afectando su calidad de vida. Se recomienda consultar con un especialista.';
        } else {
            emsg = '<strong style="color:#8d1f1f;">Severa (16–24):</strong> Nivel de somnolencia severo. Consulte a la brevedad con nuestra Clínica del Sueño.';
        }
        document.getElementById('epworthMsg').innerHTML = emsg;
    } else {
        document.getElementById('epworthResult').style.display = 'none';
    }

    const rb = document.getElementById('resultBox');
    rb.style.display = 'block';
    rb.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>
</div>
