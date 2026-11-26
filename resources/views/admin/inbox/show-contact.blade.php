@extends('admin.layout')
@section('title', $title)
@section('content')
@php
    use App\Support\AdminStatus;
    $wa = $item->whatsappUrl();
    $tel = preg_replace('/[^0-9+]/', '', (string) $item->phone);
@endphp
<div class="ad-top">
    <div>
        <h1>{{ $item->name }}</h1>
        <p>{{ $item->subject }} · {{ $item->created_at?->format('d/m/Y H:i') }}</p>
    </div>
    <a class="ad-btn ad-btn-ghost" href="{{ route($backRoute) }}">Volver</a>
</div>

<div class="ad-card ad-card-pad" style="margin-bottom:16px;">
    <p><strong>Correo:</strong> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a></p>
    <p><strong>Teléfono:</strong> {{ $item->phone ?: 'No indicado' }}</p>
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin:12px 0 18px;">
        @if($wa)
            <a class="ad-btn ad-btn-wa" href="{{ $wa }}" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        @endif
        @if($tel)
            <a class="ad-btn ad-btn-call" href="tel:{{ $tel }}"><i class="fa fa-phone"></i> Llamar</a>
        @endif
        <a class="ad-btn ad-btn-ghost" href="mailto:{{ $item->email }}"><i class="fa fa-envelope"></i> Correo</a>
    </div>
    <div style="white-space:pre-wrap;line-height:1.7;background:#f7faf9;border-radius:12px;padding:16px;">{{ $item->message }}</div>
</div>

<div class="ad-card ad-card-pad">
    <form method="POST" action="{{ route($updateRoute, $item) }}">
        @csrf
        @method('PUT')
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
