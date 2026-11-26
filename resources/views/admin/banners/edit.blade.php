@extends('admin.layout')

@section('title', 'Editar Banner')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 0; margin: 0; background: transparent; min-height: 0;">
    <div class="ad-split">
        <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <h1 style="font-size: 24px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Editar Banner</h1>
            <p style="font-size: 14px; color: #666; margin-bottom: 28px;">Actualiza los datos del banner</p>

            @if ($errors->any())
                <div style="background: #fee2e2; border-left: 4px solid #dc2626; color: #991b1b; padding: 16px; border-radius: 6px; margin-bottom: 20px;">
                    <strong>Error en validación:</strong>
                    <ul style="margin: 8px 0 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="bannerForm" action="{{ url('/admin/banners/'.$banner->id) }}" method="POST" enctype="multipart/form-data" style="display: grid; gap: 20px;">
                @csrf
                @method('PUT')

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Título (opcional)</label>
                    <input type="text" name="title" value="{{ old('title', $banner->title) }}" maxlength="255" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Imagen</label>
                    @if($banner->image_path)
                        <div style="margin-bottom: 12px;">
                            <img src="{{ $banner->imageUrl() }}" alt="Banner" style="max-width: 100%; max-height: 200px; border-radius: 6px;">
                            <p style="font-size: 11px; color: #999; margin: 8px 0 0;">Imagen actual</p>
                        </div>
                    @endif
                    <input type="file" name="image_path" accept="image/*" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; box-sizing: border-box;">
                    <p style="font-size: 11px; color: #999; margin: 6px 0 0; padding: 0;">Deja vacío para mantener la imagen actual. Tamaño máximo: 5MB</p>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ $banner->is_active ? 'checked' : '' }} style="cursor: pointer; width: 16px; height: 16px;">
                    <label for="is_active" style="font-size: 13px; color: #333; cursor: pointer; margin: 0;">Banner activo</label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px;">
                    <button type="submit" style="flex: 1; background: var(--primary); color: white; padding: 12px; border: none; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                        Actualizar
                    </button>
                    <a href="{{ url('/admin/banners') }}" style="flex: 1; background: #eee; color: #666; padding: 12px; border-radius: 6px; font-size: 13px; font-weight: 700; text-decoration: none; text-align: center; text-transform: uppercase; letter-spacing: 0.5px;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
        @include('admin.partials.live-preview', ['form' => '#bannerForm', 'url' => route('admin.preview.banner', $banner), 'targets' => ['#site-banner'], 'note' => 'Así aparecerá el aviso al entrar al sitio.'])
    </div>
</div>
@endsection
