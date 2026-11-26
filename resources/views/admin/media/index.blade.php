@extends('admin.layout')

@section('title', 'Gestionar Multimedia')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 0; margin: 0; background: transparent; min-height: 0;">
    <div class="container" style="max-width: 1200px;">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 12px;">
            <div>
                <h1 style="font-size: 28px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Multimedia</h1>
                <p style="font-size: 14px; color: #666; margin: 0;">Total: {{ $media->total() }} archivos</p>
            </div>
            <a href="{{ route('admin.media.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: var(--primary); color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 700;">
                <i class="fas fa-plus"></i> Subir Archivo
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 16px; border-radius: 6px; margin-bottom: 20px;">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <!-- Tabla -->
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            @if($media->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f9fafb; border-bottom: 2px solid #eee;">
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Nombre</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Tipo</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Categoría</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Tamaño</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Estado</th>
                                <th style="text-align: center; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($media as $file)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 16px; font-size: 13px; color: #0f1f1e; font-weight: 600;">{{ $file->name }}</td>
                                    <td style="padding: 16px; font-size: 13px; color: #666;">{{ $file->file_type }}</td>
                                    <td style="padding: 16px; font-size: 13px; color: #666;">{{ ucfirst($file->category) }}</td>
                                    <td style="padding: 16px; font-size: 13px; color: #999;">{{ $file->file_size_formatted }}</td>
                                    <td style="padding: 16px; font-size: 13px;">
                                        @if($file->is_active)
                                            <span style="display: inline-block; background: #d1fae5; color: #065f46; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 700;">Activo</span>
                                        @else
                                            <span style="display: inline-block; background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 700;">Inactivo</span>
                                        @endif
                                    </td>
                                    <td style="padding: 16px; text-align: center;">
                                        <a href="{{ route('admin.media.edit', $file) }}" style="display: inline-block; background: #e0f2fe; color: #0369a1; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; font-weight: 600; margin-right: 6px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.media.destroy', $file) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: #fee2e2; color: #991b1b; padding: 6px 12px; border-radius: 4px; border: none; text-decoration: none; font-size: 12px; font-weight: 600; cursor: pointer;">
                                                <i class="fas fa-trash"></i> Eliminar
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
                    {{ $media->links() }}
                </div>
            @else
                <div style="padding: 60px 20px; text-align: center;">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ddd; margin-bottom: 16px; display: block;"></i>
                    <p style="color: #999; font-size: 14px; margin: 0;">No hay archivos. <a href="{{ route('admin.media.create') }}" style="color: var(--primary); font-weight: 700; text-decoration: none;">Subir uno nuevo</a></p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
