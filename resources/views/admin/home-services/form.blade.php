@extends('admin.layout')
@section('title', $item->exists ? 'Editar servicio' : 'Nuevo servicio')
@section('content')
<div class="ad-top">
    <div>
        <h1>{{ $item->exists ? 'Editar servicio' : 'Nuevo servicio' }}</h1>
        <p>Tarjeta que aparece en «Nuestros servicios» de la página principal.</p>
    </div>
    <a class="ad-btn ad-btn-ghost" href="{{ route('admin.homeServices.index') }}">Volver</a>
</div>

<div class="ad-split">
<form class="ad-card ad-card-pad" id="homeServiceForm" method="POST" enctype="multipart/form-data" action="{{ $item->exists ? route('admin.homeServices.update', $item) : route('admin.homeServices.store') }}">
    @csrf
    @if($item->exists) @method('PUT') @endif

    @if($errors->any())
        <div class="ad-alert err">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <div class="ad-field">
        <label>Fila donde aparece</label>
        <select name="section" required>
            @foreach($sections as $key => $label)
                <option value="{{ $key }}" {{ old('section', $item->section) === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="ad-field">
        <label>Título</label>
        <input type="text" name="title" value="{{ old('title', $item->title) }}" required maxlength="150">
    </div>
    <div class="ad-field">
        <label>Descripción corta</label>
        <textarea name="description" maxlength="400" style="min-height:80px;">{{ old('description', $item->description) }}</textarea>
    </div>
    <div class="ad-field">
        <label>Enlace al hacer clic</label>
        <input type="text" name="link" list="homeServicePages" value="{{ old('link', $item->link) }}" required style="max-width:100%;" placeholder="/consulta/neurologia o https://...">
        <datalist id="homeServicePages">
            @foreach($pages as $path => $label)
                <option value="{{ $path }}">{{ $label }}</option>
            @endforeach
        </datalist>
        <p style="margin:6px 0 0;font-size:12px;color:#6b8080;">Escriba o elija una página del sitio (por ejemplo <code>/consulta/oftalmologia</code>), o pegue una dirección completa.</p>
    </div>
    <div class="ad-field">
        <label>Orden (menor = primero)</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" min="0" max="9999">
    </div>
    <div class="ad-field">
        <label>Imagen (JPG, PNG o WEBP, máx. 4 MB){{ $item->exists ? '' : ' — obligatoria' }}</label>
        <input type="file" name="image" accept="image/jpeg,image/png,image/webp" {{ $item->exists ? '' : 'required' }}>
        @if($item->imageUrl())
            <p style="margin:10px 0 0;"><img src="{{ $item->imageUrl() }}" alt="" style="height:110px;border-radius:8px;object-fit:cover;"></p>
        @endif
        @if($item->image_path)
            <label style="margin-top:10px;text-transform:none;font-weight:500;">
                <input type="checkbox" name="remove_image" value="1">
                Quitar la imagen subida{{ $item->image_asset ? ' y volver a la original' : '' }}
            </label>
        @endif
    </div>
    <div class="ad-field">
        <label style="text-transform:none;font-weight:600;">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
            Visible en la página de inicio
        </label>
    </div>
    <button class="ad-btn ad-btn-primary" type="submit">Guardar</button>
</form>
@include('admin.partials.live-preview', [
    'form' => '#homeServiceForm',
    'url' => route('admin.preview.homeService', $item->exists ? $item : null),
    'targets' => ['[data-preview-focus]', '#services'],
    'note' => 'La tarjeta que está editando aparece resaltada. Si la marca como oculta, desaparece de la vista previa.',
])
</div>
@endsection
