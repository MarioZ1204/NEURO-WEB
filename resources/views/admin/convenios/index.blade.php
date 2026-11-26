@extends('admin.layout')
@section('title', 'Convenios')
@section('content')
@php use App\Support\AdminStatus; @endphp
<div class="ad-top">
    <div>
        <h1>Convenios</h1>
        <p>Solicitudes interinstitucionales</p>
    </div>
</div>
<form class="ad-filters" method="GET">
    <input type="search" name="q" value="{{ request('q') }}" placeholder="Buscar institución, representante…">
    <select name="status" onchange="this.form.submit()">
        <option value="">Todos los estados</option>
        @foreach(AdminStatus::OPTIONS as $value => $label)
            <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    <button class="ad-btn ad-btn-primary" type="submit">Filtrar</button>
</form>
<div class="ad-card">
    @if($items->isEmpty())
        <div class="ad-empty">No hay solicitudes.</div>
    @else
        <table class="ad-table">
            <thead><tr><th>Fecha</th><th>Institución</th><th>Representante</th><th>Contacto</th><th>Estado</th><th></th></tr></thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->created_at?->format('d/m/Y H:i') }}</td>
                    <td>{{ $item->institucion }}<br><small>{{ $item->tipo }}</small></td>
                    <td>{{ $item->representante }} · {{ $item->cargo }}</td>
                    <td>{{ $item->email }}<br><small>{{ $item->telefono }}</small></td>
                    <td><span class="ad-pill {{ AdminStatus::pill($item->status) }}">{{ AdminStatus::label($item->status) }}</span></td>
                    <td><a href="{{ route('admin.convenios.show', $item) }}">Ver</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="ad-card-pad">{{ $items->links() }}</div>
    @endif
</div>
@endsection
