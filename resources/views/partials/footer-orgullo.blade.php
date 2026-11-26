<style>
    .orgullo-line { font-size:11px; color:#7a9694; margin:10px 0 0; font-weight:500; line-height:1.7; display:flex; align-items:center; flex-wrap:wrap; gap:6px 8px; }
    .orgullo-item { display:inline-flex; align-items:center; gap:6px; white-space:nowrap; }
    .orgullo-icon { width:20px; height:20px; border-radius:50%; overflow:hidden; display:inline-block; flex-shrink:0; box-shadow:0 0 0 1.5px rgba(255,255,255,.22), 0 1px 3px rgba(0,0,0,.35); background:#0f2a28; }
    .orgullo-icon svg, .orgullo-icon img { width:100%; height:100%; display:block; object-fit:cover; }
    .orgullo-sep { opacity:.45; }
</style>
<p class="orgullo-line">
    <span>Orgullosamente</span>
    <span class="orgullo-item" title="Bandera de San Juan de Pasto">
        <span class="orgullo-icon">
            <svg viewBox="0 0 135 110" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <rect width="135" height="110" fill="#E34234"/>
                <rect y="36.67" width="135" height="36.66" fill="#120A8F"/>
                <polygon points="0,0 45,55 0,110" fill="#FFD700"/>
            </svg>
        </span>pastusa
    </span>
    <span class="orgullo-sep">·</span>
    <span class="orgullo-item" title="Bandera de Nariño">
        <span class="orgullo-icon">
            <svg viewBox="0 0 30 20" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <rect width="30" height="10" fill="#FCD116"/>
                <rect y="10" width="30" height="10" fill="#1E7B34"/>
            </svg>
        </span>nariñense
    </span>
    <span class="orgullo-sep">·</span>
    <span class="orgullo-item" title="Bandera de Colombia">
        <span class="orgullo-icon">
            <svg viewBox="0 0 30 20" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <rect width="30" height="10" fill="#FCD116"/>
                <rect y="10" width="30" height="5" fill="#003893"/>
                <rect y="15" width="30" height="5" fill="#CE1126"/>
            </svg>
        </span>colombiana
    </span>
    <span class="orgullo-sep">·</span>
    <span class="orgullo-item" title="Latinoamérica">
        <span class="orgullo-icon"><img src="{{ asset('assets/img/orgullo-latinoamerica.png') }}" alt="" width="20" height="20" loading="lazy"></span>latinoamericana
    </span>
    <span class="orgullo-sep">·</span>
    <span class="orgullo-item" title="América">
        <span class="orgullo-icon"><img src="{{ asset('assets/img/orgullo-america.png') }}" alt="" width="20" height="20" loading="lazy"></span>americana
    </span>
    <span class="orgullo-sep">·</span>
    <span class="orgullo-item" title="Planeta Tierra">
        <span class="orgullo-icon"><img src="{{ asset('assets/img/orgullo-tierra.png') }}" alt="" width="20" height="20" loading="lazy"></span>del planeta Tierra
    </span>
</p>
