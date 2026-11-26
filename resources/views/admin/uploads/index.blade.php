@extends('admin.layout')

@section('title', 'Gestionar Archivos')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 40px 20px;">
    <div class="container" style="max-width: 1200px;">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
            <div>
                <h1 style="font-size: 28px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Archivos</h1>
                <p style="font-size: 14px; color: #666; margin: 0;">Total: {{ $uploads->total() }} archivos</p>
            </div>
            <a href="{{ route('admin.uploads.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: var(--primary); color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 700;">
                <i class="fas fa-cloud-upload-alt"></i> Subir Archivo
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 16px; border-radius: 6px; margin-bottom: 20px;">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <!-- Tabla -->
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            @if($uploads->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f9fafb; border-bottom: 2px solid #eee;">
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Archivo</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Sección</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Tipo</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Tamaño</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Estado</th>
                                <th style="text-align: center; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uploads as $upload)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 16px;">
                                        <div style="display: flex; align-items: center; gap: 10px;">
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
                                            <i class="fas {{ $icon }}" style="font-size: 18px; color: {{ $color }};"></i>
                                            <span style="font-size: 13px; color: #0f1f1e; font-weight: 600; word-break: break-all;">{{ Str::limit($upload->file_name, 30) }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 16px; font-size: 13px; color: #666;">
                                        <span style="display: inline-block; background: #f3f4f6; color: #374151; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 600;">{{ ucfirst($upload->section) }}</span>
                                    </td>
                                    <td style="padding: 16px; font-size: 12px; color: #999;">
                                        {{ str_replace(['application/', 'image/'], '', $upload->file_type) }}
                                    </td>
                                    <td style="padding: 16px; font-size: 13px; color: #666;">
                                        {{ number_format($upload->file_size / 1024, 2) }} KB
                                    </td>
                                    <td style="padding: 16px; font-size: 13px;">
                                        @if($upload->is_active)
                                            <span style="display: inline-block; background: #d1fae5; color: #065f46; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 700;">Activo</span>
                                        @else
                                            <span style="display: inline-block; background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 700;">Inactivo</span>
                                        @endif
                                    </td>
                                    <td style="padding: 16px; text-align: center;">
                                        <a href="{{ route('admin.uploads.download', $upload) }}" title="Descargar" style="display: inline-block; background: #e0f2fe; color: #0369a1; padding: 6px 10px; border-radius: 4px; text-decoration: none; font-size: 12px; margin-right: 4px;">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="{{ route('admin.uploads.edit', $upload) }}" title="Editar" style="display: inline-block; background: #e0f2fe; color: #0369a1; padding: 6px 10px; border-radius: 4px; text-decoration: none; font-size: 12px; margin-right: 4px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.uploads.destroy', $upload) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro? Se eliminará el archivo.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Eliminar" style="background: #fee2e2; color: #991b1b; padding: 6px 10px; border-radius: 4px; border: none; text-decoration: none; font-size: 12px; cursor: pointer;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Paginación -->
                <div style="padding: 20px; text-align: center; border-top: 1px solid #eee;">
                    {{ $uploads->links() }}
                </div>
            @else
                <div style="padding: 60px 20px; text-align: center;">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ddd; margin-bottom: 16px; display: block;"></i>
                    <p style="color: #999; font-size: 14px; margin: 0;">No hay archivos. <a href="{{ route('admin.uploads.create') }}" style="color: var(--primary); font-weight: 700; text-decoration: none;">Subir uno nuevo</a></p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
