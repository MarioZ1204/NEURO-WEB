@extends('admin.layout')
@section('title', 'Servicios del inicio')
@section('content')
<div class="ad-top">
    <div>
        <h1>Servicios del inicio</h1>
        <p>Tarjetas de la sección «Nuestros servicios» en la página principal. Puede cambiar imagen, texto, enlace, orden y visibilidad.</p>
    </div>
    <a class="ad-btn ad-btn-primary" href="{{ route('admin.homeServices.create') }}"><i class="fa fa-plus"></i> Agregar servicio</a>
</div>

@foreach($sections as $key => $label)
    @php $rows = $groups->get($key, collect()); @endphp
    <div class="ad-card" style="margin-bottom:18px;">
        <div class="ad-card-pad" style="display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;">
            <strong>{{ $label }} <span style="color:#6b8080;font-weight:500;">({{ $rows->count() }})</span></strong>
            <a class="ad-btn ad-btn-ghost" href="{{ route('admin.homeServices.create', ['seccion' => $key]) }}"><i class="fa fa-plus"></i> Agregar aquí</a>
        </div>
        @if($rows->isEmpty())
            <div class="ad-empty">No hay tarjetas en esta fila.</div>
        @else
            <table class="ad-table">
                <thead>
                    <tr>
                        <th style="width:70px;">Orden</th>
                        <th style="width:90px;">Imagen</th>
                        <th>Servicio</th>
                        <th>Enlace</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $item)
                        <tr>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                @if($item->imageUrl())
                                    <img src="{{ $item->imageUrl() }}" alt="" style="width:72px;height:48px;object-fit:cover;border-radius:6px;">
                                @endif
                            </td>
                            <td>
                                <strong>{{ $item->title }}</strong><br>
                                <small style="color:#6b8080;">{{ \Illuminate\Support\Str::limit($item->description, 90) }}</small>
                            </td>
                            <td><small>{{ $item->link }}</small></td>
                            <td>
                                @if($item->is_active)
                                    <span class="ad-pill is-done">Visible</span>
                                @else
                                    <span class="ad-pill is-discarded">Oculto</span>
                                @endif
                            </td>
                            <td style="white-space:nowrap;">
                                <a href="{{ route('admin.homeServices.edit', $item) }}">Editar</a>
                                <form action="{{ route('admin.homeServices.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar la tarjeta «{{ $item->title }}»?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ad-btn ad-btn-ghost" style="margin-left:8px;">Quitar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endforeach
@endsection
