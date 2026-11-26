@extends('admin.layout')

@section('title', 'Editar Archivo')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 40px 20px;">
    <div class="container" style="max-width: 600px;">
        <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <h1 style="font-size: 24px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Editar Archivo</h1>
            <p style="font-size: 14px; color: #666; margin-bottom: 28px;">Actualiza los detalles del archivo</p>

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

            <!-- Información del archivo -->
            <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 24px;">
                <p style="font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase; margin: 0 0 8px; letter-spacing: 0.5px;">Archivo Actual</p>
                <div style="display: flex; align-items: center; gap: 12px;">
                    @php
                        if (strpos($upload->file_type, 'image') !== false) {
                            $icon = 'fa-image';
                            $color = '#3b82f6';
                        } elseif (strpos($upload->file_type, 'pdf') !== false) {
                            $icon = 'fa-file-pdf';
                            $color = '#ef4444';
                        } else {
                            $icon = 'fa-file';
                            $color = '#6b7280';
                        }
                    @endphp
                    <i class="fas {{ $icon }}" style="font-size: 24px; color: {{ $color }};"></i>
                    <div>
                        <p style="font-size: 13px; font-weight: 600; color: #0f1f1e; margin: 0;">{{ $upload->file_name }}</p>
                        <p style="font-size: 11px; color: #999; margin: 4px 0 0;">{{ number_format($upload->file_size / 1024, 2) }} KB · {{ $upload->file_type }}</p>
                    </div>
                    <a href="{{ route('admin.uploads.download', $upload) }}" style="margin-left: auto; display: inline-flex; align-items: center; gap: 6px; background: #e0f2fe; color: #0369a1; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; font-weight: 600;">
                        <i class="fas fa-download"></i> Descargar
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.uploads.update', $upload) }}" method="POST" style="display: grid; gap: 20px;">
                @csrf
                @method('PUT')

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Sección *</label>
                    <select name="section" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                        @foreach($sections as $key => $label)
                            <option value="{{ $key }}" {{ $upload->section == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Descripción (Opcional)</label>
                    <textarea name="description" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; resize: vertical; min-height: 80px; box-sizing: border-box;">{{ $upload->description }}</textarea>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="is_active" id="is_active" {{ $upload->is_active ? 'checked' : '' }} style="cursor: pointer; width: 16px; height: 16px;">
                    <label for="is_active" style="font-size: 13px; color: #333; cursor: pointer; margin: 0;">Archivo activo</label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px;">
                    <button type="submit" style="flex: 1; background: var(--primary); color: white; padding: 12px; border: none; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                        Actualizar
                    </button>
                    <a href="{{ route('admin.uploads.index') }}" style="flex: 1; background: #eee; color: #666; padding: 12px; border-radius: 6px; font-size: 13px; font-weight: 700; text-decoration: none; text-align: center; text-transform: uppercase; letter-spacing: 0.5px;">
                        Cancelar
                    </a>
                </div>
            </form>

            <!-- Opción para eliminar -->
            <div style="margin-top: 32px; padding-top: 24px; border-top: 1px solid #e5e7eb;">
                <p style="font-size: 12px; font-weight: 700; color: #991b1b; text-transform: uppercase; margin: 0 0 12px; letter-spacing: 0.5px;">Zona de Peligro</p>
                <form action="{{ route('admin.uploads.destroy', $upload) }}" method="POST" onsubmit="return confirm('¿Estás seguro? Se eliminará el archivo permanentemente.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #fee2e2; color: #991b1b; padding: 12px 24px; border: none; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                        <i class="fas fa-trash"></i> Eliminar Archivo
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
