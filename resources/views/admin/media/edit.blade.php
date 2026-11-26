@extends('admin.layout')

@section('title', 'Editar Multimedia')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 0; margin: 0; background: transparent; min-height: 0;">
    <div class="container" style="max-width: 600px;">
        <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <h1 style="font-size: 24px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Editar Multimedia</h1>
            <p style="font-size: 14px; color: #666; margin-bottom: 28px;">Actualiza la información del archivo</p>

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

            <form action="{{ route('admin.media.update', $media) }}" method="POST" style="display: grid; gap: 20px;">
                @csrf
                @method('PUT')

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Nombre del Archivo *</label>
                    <input type="text" name="name" value="{{ $media->name }}" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Información del Archivo</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div>
                            <p style="font-size: 11px; color: #666; margin: 0 0 4px; font-weight: 700;">Tipo MIME:</p>
                            <p style="font-size: 12px; color: #333; margin: 0; background: #f5f5f5; padding: 8px; border-radius: 4px;">{{ $media->mime_type }}</p>
                        </div>
                        <div>
                            <p style="font-size: 11px; color: #666; margin: 0 0 4px; font-weight: 700;">Tamaño:</p>
                            <p style="font-size: 12px; color: #333; margin: 0; background: #f5f5f5; padding: 8px; border-radius: 4px;">{{ $media->file_size_formatted }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Categoría *</label>
                    <select name="category" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                        <option value="">Seleccionar categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ $media->category === $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Sección</label>
                    <input type="text" name="section" value="{{ $media->section }}" placeholder="Ej: documentos, estados-financieros" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Descripción</label>
                    <textarea name="description" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; resize: vertical; min-height: 80px; box-sizing: border-box;">{{ $media->description }}</textarea>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ $media->is_active ? 'checked' : '' }} style="cursor: pointer; width: 16px; height: 16px;">
                    <label for="is_active" style="font-size: 13px; color: #333; cursor: pointer; margin: 0;">Archivo activo</label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px;">
                    <button type="submit" style="flex: 1; background: var(--primary); color: white; padding: 12px; border: none; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                        Actualizar
                    </button>
                    <a href="{{ route('admin.media.index') }}" style="flex: 1; background: #eee; color: #666; padding: 12px; border-radius: 6px; font-size: 13px; font-weight: 700; text-decoration: none; text-align: center; text-transform: uppercase; letter-spacing: 0.5px;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
