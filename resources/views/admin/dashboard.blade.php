@extends('admin.layout')
@section('title', 'Resumen')
@section('content')
<div class="ad-top">
    <h1>Resumen</h1>
    <p>Bandeja de solicitudes y contenido del sitio</p>
</div>

<div class="ad-stats">
    <a class="ad-stat" href="{{ url('/admin/citas') }}">
        <div class="k">Citas nuevas</div>
        <div class="n">{{ $citas_new ?? 0 }}</div>
    </a>
    <a class="ad-stat" href="{{ url('/admin/mensajes') }}">
        <div class="k">Mensajes nuevos</div>
        <div class="n">{{ $mensajes_new ?? 0 }}</div>
    </a>
    <a class="ad-stat" href="{{ url('/admin/job-applications') }}">
        <div class="k">Hojas de vida</div>
        <div class="n">{{ $jobs_new ?? 0 }}</div>
    </a>
    <a class="ad-stat" href="{{ url('/admin/internships') }}">
        <div class="k">Prácticas</div>
        <div class="n">{{ $internships_new ?? 0 }}</div>
    </a>
    <a class="ad-stat" href="{{ url('/admin/convenios') }}">
        <div class="k">Convenios</div>
        <div class="n">{{ $convenios_new ?? 0 }}</div>
    </a>
    <a class="ad-stat" href="{{ url('/admin/testimonials') }}">
        <div class="k">Testimonios</div>
        <div class="n">{{ $testimonials_count ?? 0 }}</div>
    </a>
</div>

<div class="ad-card" style="margin-bottom:22px;">
    <div class="ad-card-pad"><strong>Editar el sitio</strong></div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;padding:0 18px 18px;">
        @foreach([
            [url('/admin/servicios-inicio'), 'fa-grip', 'Servicios del inicio', 'Tarjetas, imágenes, textos y orden'],
            [url('/admin/ajustes'), 'fa-sliders', 'Ajustes del sitio', 'Contacto, portada, redes, QR de pagos'],
            [url('/admin/equipo'), 'fa-user-md', 'Equipo médico', 'Directorio y equipo del inicio'],
            [url('/admin/banners'), 'fa-image', 'Banners', 'Avisos emergentes del inicio'],
            [url('/admin/testimonials'), 'fa-star', 'Testimonios', 'Calificaciones de pacientes'],
            [url('/admin/uploads'), 'fa-folder', 'Archivos', 'Documentos descargables'],
        ] as [$href, $icon, $label, $hint])
            <a href="{{ $href }}" style="display:flex;gap:12px;align-items:center;padding:14px;border-radius:10px;background:#f3f8f7;text-decoration:none;color:inherit;">
                <span style="width:38px;height:38px;border-radius:10px;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fa {{ $icon }}"></i></span>
                <span><strong style="display:block;font-size:14px;">{{ $label }}</strong><small style="color:#6b8080;">{{ $hint }}</small></span>
            </a>
        @endforeach
    </div>
</div>

<div class="ad-card">
    <div class="ad-card-pad"><strong>Últimas citas</strong></div>
    @if(empty($recent_citas) || (is_countable($recent_citas) && count($recent_citas) === 0))
        <div class="ad-empty">Aún no hay solicitudes de cita.</div>
    @else
        <table class="ad-table">
            <thead>
                <tr><th>Fecha</th><th>Nombre</th><th>Asunto</th><th></th></tr>
            </thead>
            <tbody>
                @foreach($recent_citas as $c)
                    <tr>
                        <td>{{ optional($c->created_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->subject }}</td>
                        <td><a href="{{ url('/admin/citas/'.$c->id) }}">Abrir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
