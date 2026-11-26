@extends('admin.layout')
@section('title', 'Postulación')
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
        <p>{{ $item->cargo }} · {{ $item->created_at?->format('d/m/Y H:i') }}</p>
    </div>
    <a class="ad-btn ad-btn-ghost" href="{{ route('admin.jobs.index') }}">Volver</a>
</div>
<div class="ad-card ad-card-pad" style="margin-bottom:16px;">
    <p><strong>Profesión:</strong> {{ $item->profesion }}</p>
    <p><strong>Correo:</strong> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a></p>
    <p><strong>Teléfono:</strong> {{ $item->telefono }}</p>
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin:12px 0;">
        @if($wa)<a class="ad-btn ad-btn-wa" href="{{ $wa }}" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> WhatsApp</a>@endif
        @if($tel)<a class="ad-btn ad-btn-call" href="{{ $tel }}"><i class="fa fa-phone"></i> Llamar</a>@endif
        @if($item->file_path)<a class="ad-btn ad-btn-primary" href="{{ route('admin.jobs.download', $item) }}"><i class="fa fa-download"></i> Descargar HV</a>@endif
    </div>
    @if($item->mensaje)
        <div style="white-space:pre-wrap;line-height:1.7;background:#f7faf9;border-radius:12px;padding:16px;">{{ $item->mensaje }}</div>
    @endif
</div>
<div class="ad-card ad-card-pad">
    <form method="POST" action="{{ route('admin.jobs.update', $item) }}">
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
