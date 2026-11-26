@extends('layout.app')
@section('title', 'Búsqueda')
@section('content')
<style>
    body { padding-top: var(--navbar-h, 80px); }
    .page-hero { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 60px 0 50px; text-align: center; color: #fff; }
    .page-hero h1 { font-size: clamp(24px,3vw,38px); font-weight: 900; margin-bottom: 10px; }
    .search-input-wrap { position:relative; max-width:620px; margin:0 auto; }
    .search-input-wrap input {
        width:100%; padding:16px 56px 16px 22px; border-radius:32px;
        border:none; font-size:15px; color:var(--dark); font-family:'Poppins',sans-serif;
        box-shadow:0 4px 20px rgba(0,0,0,0.15); outline:none;
    }
    .search-input-wrap button {
        position:absolute; right:6px; top:50%; transform:translateY(-50%);
        width:42px; height:42px; border-radius:50%; background:var(--primary);
        border:none; color:#fff; font-size:15px; cursor:pointer;
        transition:background 0.2s;
    }
    .search-input-wrap button:hover { background:var(--primary-dark); }
    .result-count { font-size:13px; color:#666; margin-bottom:24px; }
    .result-card {
        background:#fff; border-radius:12px; padding:22px 26px;
        box-shadow:0 3px 16px rgba(0,0,0,0.07); margin-bottom:16px;
        display:flex; gap:18px; align-items:flex-start;
        transition:box-shadow 0.2s, transform 0.2s;
    }
    .result-card:hover { box-shadow:0 6px 28px rgba(0,0,0,0.12); transform:translateX(3px); }
    .result-icon {
        width:44px; height:44px; border-radius:10px; flex-shrink:0;
        background:linear-gradient(135deg,var(--primary),var(--primary-dark));
        display:flex; align-items:center; justify-content:center; color:#fff; font-size:16px;
    }
    .result-card h5 { font-size:15px; font-weight:700; color:var(--dark); margin-bottom:5px; }
    .result-card p  { font-size:13px; color:#666; line-height:1.7; margin-bottom:10px; }
    .result-link {
        font-size:12px; font-weight:600; color:var(--primary);
        text-decoration:none; letter-spacing:0.3px;
    }
    .result-link:hover { text-decoration:underline; }
    .result-category {
        font-size:10px; font-weight:700; text-transform:uppercase;
        color:var(--primary-dark); background:var(--primary-ultra);
        padding:2px 10px; border-radius:16px; letter-spacing:0.5px;
        margin-bottom:8px; display:inline-block;
    }
    .highlight { background:rgba(27,130,110,0.15); border-radius:3px; padding:1px 3px; font-weight:600; color:var(--primary-dark); }
    .no-results { text-align:center; padding:60px 20px; color:#aaa; }
    .no-results i { font-size:48px; margin-bottom:16px; }
    .suggestions { display:flex; gap:8px; flex-wrap:wrap; justify-content:center; margin-top:12px; }
    .suggestion-pill {
        background:rgba(255,255,255,0.15); border-radius:20px;
        padding:6px 16px; font-size:12px; font-weight:600; color:#fff;
        cursor:pointer; transition:background 0.2s;
    }
    .suggestion-pill:hover { background:rgba(255,255,255,0.28); }
</style>

<div class="page-hero">
    <div class="container">
        <h1><i class="fa fa-search" style="margin-right:12px;opacity:0.75;"></i>Buscador</h1>
        <p style="margin-bottom:24px;color:var(--primary-pale);">Encuentre servicios, especialidades, procedimientos e información sobre el instituto</p>
        <form method="GET" action="{{ route('busqueda') }}" class="search-input-wrap">
            <input type="text" name="q" id="searchInput"
                   value="{{ request('q') }}"
                   placeholder="Ej: EEG, Neurología, Terapia física, Polisomnografía…"
                   autocomplete="off" autofocus>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="suggestions" id="suggestions">
            @foreach(['EEG', 'Epilepsia', 'Polisomnografía', 'Neuropsicología', 'Terapia física', 'Psiquiatría'] as $sug)
            <span class="suggestion-pill" onclick="doSearch('{{ $sug }}')">{{ $sug }}</span>
            @endforeach
        </div>
    </div>
</div>

<section style="background:#f8faf9; padding:60px 0;">
    <div class="container" style="max-width:760px;">

        @php
        $query = trim(request('q', ''));

        /* ── Índice de contenidos del sitio ── */
        $index = [
            [
                'titulo'     => 'Neurología',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-brain',
                'descripcion'=> 'Diagnóstico y tratamiento de enfermedades del sistema nervioso central y periférico. Cefalea, migraña, Parkinson, ACV, demencias, neuropatías, esclerosis múltiple.',
                'keywords'   => ['neurología', 'neurologo', 'cerebro', 'nervio', 'cefalea', 'migraña', 'parkinson', 'acv', 'ictus', 'demencia', 'alzheimer', 'esclerosis', 'neuropatia', 'miopatia', 'vertigo', 'movimiento'],
                'ruta'       => route('consulta.neurologia'),
            ],
            [
                'titulo'     => 'Epileptología',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-bolt',
                'descripcion'=> 'Diagnóstico y manejo especializado de epilepsia, crisis convulsivas, ajuste antiepiléptico y evaluación prequirúrgica.',
                'keywords'   => ['epilepsia', 'epileptologia', 'crisis', 'convulsion', 'antiepiléptico', 'refractaria'],
                'ruta'       => route('consulta.epileptologia'),
            ],
            [
                'titulo'     => 'Psiquiatría',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-head-side-virus',
                'descripcion'=> 'Valoración y tratamiento de trastornos mentales: depresión, ansiedad, trastorno bipolar, psicosis.',
                'keywords'   => ['psiquiatría', 'psiquiatra', 'depresion', 'ansiedad', 'bipolar', 'psicosis', 'trastorno mental'],
                'ruta'       => route('consulta.psiquiatria'),
            ],
            [
                'titulo'     => 'Psicología',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-heart',
                'descripcion'=> 'Psicoterapia individual, de pareja y familiar. Consulta de primera vez y control por psicología.',
                'keywords'   => ['psicología', 'psicologo', 'psicoterapia', 'terapia cognitiva', 'pareja', 'familiar', 'emocional'],
                'ruta'       => route('consulta.psicologia'),
            ],
            [
                'titulo'     => 'Neuropsicología',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-puzzle-piece',
                'descripcion'=> 'Evaluación cognitiva, pruebas de inteligencia, personalidad y neuropsicológicas. Terapia de rehabilitación cognitiva.',
                'keywords'   => ['neuropsicología', 'neuropsicólogo', 'cognitivo', 'memoria', 'inteligencia', 'personalidad', 'rehabilitacion cognitiva', 'prueba cognitiva'],
                'ruta'       => route('consulta.neuropsicologia'),
            ],
            [
                'titulo'     => 'Oftalmología',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-eye',
                'descripcion'=> 'Diagnóstico y tratamiento de enfermedades de los ojos: defectos refractivos, glaucoma, cataratas, retinopatía y alteraciones visuales de origen neurológico.',
                'keywords'   => ['oftalmología', 'oftalmologo', 'ojos', 'vision', 'visión', 'gafas', 'glaucoma', 'catarata', 'retina', 'miopia', 'astigmatismo', 'fondo de ojo'],
                'ruta'       => route('consulta.oftalmologia'),
            ],
            [
                'titulo'     => 'Oftalmología Pediátrica',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-child',
                'descripcion'=> 'Atención visual para bebés, niños y adolescentes: estrabismo, ojo perezoso (ambliopía) y necesidad de gafas.',
                'keywords'   => ['oftalmología pediátrica', 'oftalmologia infantil', 'niños', 'estrabismo', 'ambliopia', 'ojo perezoso', 'bizco', 'vision infantil'],
                'ruta'       => route('consulta.oftalmologiaPediatrica'),
            ],
            [
                'titulo'     => 'Fonoaudiología',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-comments',
                'descripcion'=> 'Evaluación y terapia de lenguaje, habla, voz y deglución. Afasias, disartrias, disfagia, tartamudez y retraso del lenguaje.',
                'keywords'   => ['fonoaudiología', 'fonoaudiologo', 'lenguaje', 'habla', 'voz', 'deglucion', 'disfagia', 'afasia', 'disartria', 'tartamudez', 'terapia de lenguaje'],
                'ruta'       => route('consulta.fonoaudiologia'),
            ],
            [
                'titulo'     => 'Terapia Ocupacional',
                'categoria'  => 'Consulta Especializada',
                'icono'      => 'fa-hands',
                'descripcion'=> 'Recuperación de la autonomía en actividades de la vida diaria, motricidad fina, integración sensorial y adaptación del entorno.',
                'keywords'   => ['terapia ocupacional', 'terapeuta ocupacional', 'motricidad fina', 'vida diaria', 'integracion sensorial', 'autonomia', 'escritura'],
                'ruta'       => route('consulta.terapiaOcupacional'),
            ],
            [
                'titulo'     => 'Electroencefalograma (EEG)',
                'categoria'  => 'Electrodiagnóstico',
                'icono'      => 'fa-wave-square',
                'descripcion'=> 'EEG convencional, computarizado y digital con mapeo cerebral. Monitorización video-EEG por hora. Diagnóstico de epilepsia y encefalopatías.',
                'keywords'   => ['eeg', 'electroencefalograma', 'encefalografia', 'mapeo cerebral', 'videotelemetria', 'video eeg', 'actividad cerebral'],
                'ruta'       => route('landing.electrodiagnosticos'),
            ],
            [
                'titulo'     => 'Polisomnografía y Medicina del Sueño',
                'categoria'  => 'Electrodiagnóstico / Clínica del Sueño',
                'icono'      => 'fa-moon',
                'descripcion'=> 'Polisomnografía completa, noche dividida, titulación CPAP, MSLT, prueba de mantenimiento de vigilia y actigrafía.',
                'keywords'   => ['sueño', 'polisomnografia', 'apnea', 'cpap', 'narcolepsia', 'insomnio', 'hipersomnia', 'mslt', 'actigrafia', 'somnologia', 'vigilia', 'noche dividida'],
                'ruta'       => route('landing.electrodiagnosticos'),
            ],
            [
                'titulo'     => 'Terapia Física y Rehabilitación',
                'categoria'  => 'Terapia Física',
                'icono'      => 'fa-running',
                'descripcion'=> 'Terapia física integral, ondas de choque, modalidades mecánicas y eléctricas, tracción lumbar, piso pélvico, rehabilitación pulmonar, terapia neural.',
                'keywords'   => ['terapia fisica', 'fisioterapia', 'rehabilitacion', 'ondas de choque', 'traccion', 'piso pelvico', 'pulmonar', 'neural', 'osteopatia', 'linfatica', 'esqueletica'],
                'ruta'       => route('consulta.terapiaFisica'),
            ],
            [
                'titulo'     => 'Procedimientos Especiales en Neurología',
                'categoria'  => 'Neurología',
                'icono'      => 'fa-syringe',
                'descripcion'=> 'Toxina botulínica, bloqueo mioneural, inyección de anestésico periférico, revisión de neuroestimulador (DBS).',
                'keywords'   => ['toxina botulinica', 'botoxx', 'bloqueo', 'neuroestimulador', 'dbs', 'anestésico periférico', 'procedimiento', 'espasticidad', 'distonia'],
                'ruta'       => route('consulta.neurologia'),
            ],
            [
                'titulo'     => 'Clínica del Sueño',
                'categoria'  => 'Servicios Complementarios',
                'icono'      => 'fa-bed',
                'descripcion'=> 'Unidad especializada en el diagnóstico y tratamiento de los trastornos del sueño: apnea, insomnio, narcolepsia, síndrome de piernas inquietas.',
                'keywords'   => ['clinica del sueno', 'trastorno del sueno', 'apnea del sueno', 'insomnio cronico', 'piernas inquietas', 'somnolencia'],
                'ruta'       => route('servicios.clinicaSueno'),
            ],
            [
                'titulo'     => 'Marco Legal',
                'categoria'  => 'Nuestra Institución',
                'icono'      => 'fa-gavel',
                'descripcion'=> 'Normatividad aplicable: Resolución 3100, Ley 100, habilitación, protección de datos, derechos del paciente.',
                'keywords'   => ['marco legal', 'habilitacion', 'reps', 'ley 100', 'supersalud', 'resolucion', 'norma', 'decreto'],
                'ruta'       => route('marcoLegal'),
            ],
            [
                'titulo'     => 'Estados Financieros',
                'categoria'  => 'Nuestra Institución',
                'icono'      => 'fa-chart-bar',
                'descripcion'=> 'Transparencia financiera del Instituto Neurociencias de Nariño. Balance general, estados de resultados y flujo de efectivo.',
                'keywords'   => ['estados financieros', 'balance', 'contabilidad', 'finanzas', 'transparencia', 'resultado', 'flujo efectivo'],
                'ruta'       => route('estadosFinancieros'),
            ],
            [
                'titulo'     => 'Artículos y Revistas',
                'categoria'  => 'Nuestra Institución',
                'icono'      => 'fa-book-open',
                'descripcion'=> 'Publicaciones informativas, artículos científicos y material educativo para pacientes y profesionales de la salud.',
                'keywords'   => ['articulos', 'revistas', 'publicaciones', 'educacion', 'informacion', 'heyzine', 'pdf', 'documentos'],
                'ruta'       => route('articulos'),
            ],
            [
                'titulo'     => 'Preparación para Polisomnografía',
                'categoria'  => 'Educación al Paciente',
                'icono'      => 'fa-clipboard-list',
                'descripcion'=> 'Instrucciones de preparación para el estudio de polisomnografía basal y completa.',
                'keywords'   => ['preparacion', 'polisomnografia basal', 'instrucciones', 'estudio de sueno', 'antes del examen'],
                'ruta'       => route('educacion.polisBasal'),
            ],
            [
                'titulo'     => 'Trabaje con Nosotros',
                'categoria'  => 'Institución',
                'icono'      => 'fa-briefcase',
                'descripcion'=> 'Postule su hoja de vida, realice sus prácticas profesionales o solicite convenio interinstitucional.',
                'keywords'   => ['trabajo', 'empleo', 'hoja de vida', 'practicas', 'convenio', 'curriculum'],
                'ruta'       => route('trabaje.hojaDeVida'),
            ],
            [
                'titulo'     => 'Contacto y Ubicación',
                'categoria'  => 'Contacto',
                'icono'      => 'fa-map-marker-alt',
                'descripcion'=> 'Dos sedes en Pasto, Nariño. Carrera 34 #13-80 con Calle 14 #33-15, Pasto, Barrio San Ignacio. Horario Lun–Vie 7:30am–7:00pm. WhatsApp: 305-356-0651, 315-972-9333.',
                'keywords'   => ['contacto', 'ubicacion', 'direccion', 'telefono', 'whatsapp', 'sede', 'pasto', 'nariño', 'horario'],
                'ruta'       => route('landing.inicio'),
            ],
        ];

        /* ── Ejecutar búsqueda ── */
        $results = [];
        if ($query !== '') {
            $qLower = mb_strtolower($query);
            $terms  = preg_split('/\s+/', $qLower);
            foreach ($index as $item) {
                $score  = 0;
                $haystack = mb_strtolower($item['titulo'] . ' ' . $item['descripcion'] . ' ' . implode(' ', $item['keywords']));
                // Exact phrase
                if (str_contains($haystack, $qLower)) $score += 10;
                // Per term
                foreach ($terms as $t) {
                    if (strlen($t) < 2) continue;
                    if (str_contains(mb_strtolower($item['titulo']), $t)) $score += 5;
                    if (str_contains($haystack, $t)) $score += 2;
                }
                if ($score > 0) {
                    $item['score'] = $score;
                    $results[] = $item;
                }
            }
            usort($results, fn($a, $b) => $b['score'] - $a['score']);
        }
        @endphp

        @if($query === '')
        <div class="no-results">
            <i class="fa fa-search" style="color:var(--primary-light);"></i>
            <h4 style="font-size:18px;font-weight:800;color:var(--dark);margin-bottom:8px;">Escriba algo para buscar</h4>
            <p style="font-size:14px;max-width:420px;margin:0 auto;">Puede buscar por nombre de servicio, especialidad, procedimiento o palabra clave.</p>
        </div>

        @elseif(count($results) === 0)
        <p class="result-count">Sin resultados para "<strong>{{ $query }}</strong>".</p>
        <div class="no-results">
            <i class="fa fa-search" style="color:var(--primary-light);"></i>
            <h4 style="font-size:18px;font-weight:700;color:var(--dark);margin-bottom:8px;">No encontramos resultados</h4>
            <p style="font-size:14px;max-width:440px;margin:0 auto;">Intente con otros términos. Por ejemplo: <em>EEG, Neurología, Terapia, Psicología, Sueño</em>.</p>
        </div>

        @else
        <p class="result-count">{{ count($results) }} resultado(s) para "<strong>{{ e($query) }}</strong>"</p>

        @foreach($results as $r)
        <div class="result-card">
            <div class="result-icon"><i class="fa {{ $r['icono'] }}"></i></div>
            <div>
                <span class="result-category">{{ $r['categoria'] }}</span>
                <h5>{{ $r['titulo'] }}</h5>
                <p>{{ $r['descripcion'] }}</p>
                <a href="{{ $r['ruta'] }}" class="result-link"><i class="fa fa-arrow-right" style="font-size:11px;margin-right:5px;"></i>Ver página</a>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>

<script>
function doSearch(term) {
    window.location.href = '{{ route('busqueda') }}?q=' + encodeURIComponent(term);
}
</script>
@endsection

