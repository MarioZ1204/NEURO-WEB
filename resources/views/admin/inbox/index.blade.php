@extends('admin.layout')
@section('title', $title)
@section('content')
@php use App\Support\AdminStatus; @endphp
<div class="ad-top">
    <div>
        <h1>{{ $title }}</h1>
        <p>{{ $subtitle }}</p>
    </div>
    <a class="ad-btn ad-btn-ghost" href="{{ route($exportRoute) }}"><i class="fa fa-file-csv"></i> Exportar CSV</a>
</div>

<form class="ad-filters" method="GET">
    <input type="search" name="q" value="{{ request('q') }}" placeholder="Buscar nombre, correo, teléfono…">
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
        <div class="ad-empty">No hay registros con esos filtros.</div>
    @else
        <table class="ad-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Asunto</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->created_at?->format('d/m/Y H:i') }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            {{ $item->email }}<br>
                            <small>{{ $item->phone ?: '—' }}</small>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($item->subject, 50) }}</td>
                        <td><span class="ad-pill {{ AdminStatus::pill($item->status) }}">{{ AdminStatus::label($item->status) }}</span></td>
                        <td><a href="{{ route($showRoute, $item) }}">Ver</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="ad-card-pad">{{ $items->links() }}</div>
    @endif
</div>
@endsection
