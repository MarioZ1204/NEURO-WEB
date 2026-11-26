{{-- Barra final de conversión (páginas de servicio / especialidad) --}}
<div class="page-cta-bar">
    <div class="container">
        <div class="page-cta-inner">
            <div class="page-cta-copy">
                <h3>{{ $title ?? '¿Listo para agendar su cita?' }}</h3>
                <p>{{ $subtitle ?? 'Nuestro equipo le orienta por WhatsApp, llamada o el formulario «Lo llamamos».' }}</p>
            </div>
            <div class="page-cta-actions">
                <a href="#" class="btn-cta-solid" data-bs-toggle="modal" data-bs-target="#solicitarCitaModal">Solicitar Cita</a>
                @if(!empty($secondaryHref))
                    <a href="{{ $secondaryHref }}" class="btn-cta-outline page-cta-secondary">{{ $secondaryLabel ?? 'Ver más' }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
