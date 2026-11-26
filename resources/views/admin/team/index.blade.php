@extends('admin.layout')
@section('title', 'Equipo médico')
@section('content')
<div class="ad-top">
    <div>
        <h1>Equipo médico</h1>
        <p>Se muestra en la página de inicio y en el Directorio Médico.</p>
    </div>
    <a class="ad-btn ad-btn-primary" href="{{ route('admin.team.create') }}"><i class="fa fa-plus"></i> Agregar</a>
</div>

<div class="ad-card">
    @if($items->isEmpty())
        <div class="ad-empty">Aún no hay integrantes. Agregue el primero.</div>
    @else
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->sort_order }}</td>
                        <td>
                            <strong>{{ $item->name }}</strong>
                            @if($item->photo_path)<br><small>Con foto</small>@endif
                        </td>
                        <td>{{ $item->specialty }}</td>
                        <td>
                            @if($item->is_active)
                                <span class="ad-pill is-done">Visible</span>
                            @else
                                <span class="ad-pill is-discarded">Oculto</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.team.edit', $item) }}">Editar</a>
                            <form action="{{ route('admin.team.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar a {{ $item->name }}?');">
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
@endsection
