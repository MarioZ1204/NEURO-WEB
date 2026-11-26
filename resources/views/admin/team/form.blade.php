@extends('admin.layout')
@section('title', $item->exists ? 'Editar integrante' : 'Nuevo integrante')
@section('content')
<div class="ad-top">
    <div>
        <h1>{{ $item->exists ? 'Editar integrante' : 'Nuevo integrante' }}</h1>
        <p>Nombre, especialidad, foto y si se muestra en el sitio.</p>
    </div>
    <a class="ad-btn ad-btn-ghost" href="{{ route('admin.team.index') }}">Volver</a>
</div>

<div class="ad-split">
<form class="ad-card ad-card-pad" id="teamForm" method="POST" enctype="multipart/form-data" action="{{ $item->exists ? route('admin.team.update', $item) : route('admin.team.store') }}">
    @csrf
    @if($item->exists) @method('PUT') @endif

    @if($errors->any())
        <div class="ad-alert err">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <div class="ad-field">
        <label>Nombre</label>
        <input type="text" name="name" value="{{ old('name', $item->name) }}" required>
    </div>
    <div class="ad-field">
        <label>Iniciales (si no hay foto)</label>
        <input type="text" name="initials" value="{{ old('initials', $item->initials) }}" maxlength="8">
    </div>
    <div class="ad-field">
        <label>Especialidad</label>
        <input type="text" name="specialty" value="{{ old('specialty', $item->specialty) }}" required style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Experiencia / cargo corto</label>
        <input type="text" name="experience" value="{{ old('experience', $item->experience) }}" style="max-width:100%;">
    </div>
    <div class="ad-field">
        <label>Biografía breve</label>
        <textarea name="bio">{{ old('bio', $item->bio) }}</textarea>
    </div>
    <div class="ad-field">
        <label>Orden (menor = primero)</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" min="0" max="999">
    </div>
    <div class="ad-field">
        <label>Foto (JPG o PNG, máx. 4 MB)</label>
        <input type="file" name="photo" accept="image/jpeg,image/png,image/webp">
        @if($item->photo_path)
            <p style="margin:10px 0 0;"><img src="{{ $item->photoUrl() }}" alt="" style="height:80px;border-radius:8px;object-fit:cover;"></p>
            <label style="margin-top:10px;text-transform:none;font-weight:500;"><input type="checkbox" name="remove_photo" value="1"> Quitar foto actual</label>
        @endif
    </div>
    <div class="ad-field">
        <label style="text-transform:none;font-weight:600;">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
            Visible en el sitio
        </label>
    </div>
    <button class="ad-btn ad-btn-primary" type="submit">Guardar</button>
</form>
@include('admin.partials.live-preview', [
    'form' => '#teamForm',
    'url' => route('admin.preview.team', $item->exists ? $item : null),
    'targets' => ['[data-preview-focus]', '#equipo'],
    'note' => 'El integrante que está editando aparece resaltado en la sección Equipo Médico del inicio.',
])
</div>
@endsection
