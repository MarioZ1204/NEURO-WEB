@extends('admin.layout')
@section('title', 'Práctica')
@section('content')
@php
    use App\Support\AdminStatus;
    use App\Support\PhoneLink;
    $wa = PhoneLink::whatsapp($item->telefono);
    $tel = PhoneLink::tel($item->telefono);
@endphp
<div class="ad-top">
    <div>
        <h1>{{ $item->nombre }} {{ $item->apellido }}</h1>
        <p>{{ $item->universidad }} · {{ $item->created_at?->format('d/m/Y H:i') }}</p>
    </div>
    <a class="ad-btn ad-btn-ghost" href="{{ route('admin.internships.index') }}">Volver</a>
</div>
<div class="ad-card ad-card-pad" style="margin-bottom:16px;">
    <p><strong>Programa:</strong> {{ $item->programa }} ({{ $item->semestre }})</p>
    <p><strong>Área:</strong> {{ $item->area }}</p>
    <p><strong>Correo:</strong> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a></p>
    <p><strong>Teléfono:</strong> {{ $item->telefono }}</p>
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:12px;">
        @if($wa)<a class="ad-btn ad-btn-wa" href="{{ $wa }}" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> WhatsApp</a>@endif
        @if($tel)<a class="ad-btn ad-btn-call" href="{{ $tel }}"><i class="fa fa-phone"></i> Llamar</a>@endif
        @if($item->file_path)<a class="ad-btn ad-btn-primary" href="{{ route('admin.internships.download', $item) }}"><i class="fa fa-download"></i> Descargar carta</a>@endif
    </div>
</div>
<div class="ad-card ad-card-pad">
    <form method="POST" action="{{ route('admin.internships.update', $item) }}">
        @csrf @method('PUT')
        <div class="ad-field">
            <label>Estado</label>
            <select name="status">
                @foreach(AdminStatus::OPTIONS as $value => $label)
                    <option value="{{ $value }}" @selected($item->status === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="ad-field">
            <label>Notas internas</label>
            <textarea name="admin_notes">{{ old('admin_notes', $item->admin_notes) }}</textarea>
        </div>
        <button class="ad-btn ad-btn-primary" type="submit">Guardar</button>
    </form>
</div>
@endsection
