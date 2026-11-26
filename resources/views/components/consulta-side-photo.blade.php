{{-- Foto lateral en páginas de consulta (tamaño contenido, no estirada) --}}
<aside class="consulta-side-photo {{ $class ?? '' }}">
    @if(!empty($src))
        <div class="consulta-side-photo__frame">
            <img src="{{ asset($src) }}" alt="{{ $alt ?? '' }}" loading="lazy" width="480" height="600">
        </div>
        @if(!empty($caption))
            <p class="consulta-side-photo__caption">{{ $caption }}</p>
        @endif
    @else
        <div class="consulta-side-photo__panel">
            <div class="consulta-side-photo__icon"><i class="fa {{ $icon ?? 'fa-user-md' }}"></i></div>
            @if(!empty($title))<h4>{{ $title }}</h4>@endif
            @if(!empty($text))<p>{{ $text }}</p>@endif
        </div>
    @endif
</aside>
