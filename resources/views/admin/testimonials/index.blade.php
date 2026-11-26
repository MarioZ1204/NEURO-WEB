@extends('admin.layout')

@section('title', 'Gestionar Testimonios')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 40px 20px;">
    <div class="container" style="max-width: 1200px;">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
            <div>
                <h1 style="font-size: 28px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Testimonios</h1>
                <p style="font-size: 14px; color: #666; margin: 0;">Total: {{ $testimonials->total() }} testimonios</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: var(--primary); color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 700;">
                <i class="fas fa-plus"></i> Nuevo Testimonio
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 16px; border-radius: 6px; margin-bottom: 20px;">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @php $testimonialFormUrl = route('testimonial.form'); @endphp
        <div style="background: white; border-radius: 12px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); margin-bottom: 28px; display: grid; grid-template-columns: 200px 1fr; gap: 28px; align-items: center;">
            <div style="text-align: center;">
                <img
                    src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode($testimonialFormUrl) }}"
                    alt="QR para dejar testimonio"
                    width="180"
                    height="180"
                    style="border: 8px solid #f0f7f6; border-radius: 12px; display: block; margin: 0 auto;"
                >
            </div>
            <div>
                <h2 style="font-size: 18px; font-weight: 800; color: #0f1f1e; margin: 0 0 8px;">
                    <i class="fas fa-qrcode" style="color: var(--primary); margin-right: 8px;"></i>
                    QR para testimonios de pacientes
                </h2>
                <p style="font-size: 14px; color: #666; margin: 0 0 12px; line-height: 1.6;">
                    Imprima o comparta este código QR en recepción. Los pacientes podrán escanearlo y dejar su comentario desde el celular.
                    Los testimonios enviados quedan <strong>inactivos</strong> hasta que usted los active o elimine desde este panel.
                </p>
                <p style="font-size: 12px; color: #888; margin: 0 0 10px;">Enlace directo:</p>
                <a href="{{ $testimonialFormUrl }}" target="_blank" style="font-size: 13px; color: var(--primary); word-break: break-all;">{{ $testimonialFormUrl }}</a>
            </div>
        </div>

        <!-- Tabla -->
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            @if($testimonials->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f9fafb; border-bottom: 2px solid #eee;">
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Nombre</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Detalle</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Testimonio</th>
                                <th style="text-align: center; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Archivo</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Rating</th>
                                <th style="text-align: left; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Estado</th>
                                <th style="text-align: center; padding: 16px; font-size: 12px; font-weight: 700; color: #666; text-transform: uppercase;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                                <tr style="border-bottom: 1px solid #eee; hover: background #f9fafb;">
                                    <td style="padding: 16px; font-size: 13px; color: #0f1f1e; font-weight: 600;">{{ $testimonial->name }}</td>
                                    <td style="padding: 16px; font-size: 13px; color: #666;">{{ $testimonial->detail }}</td>
                                    <td style="padding: 16px; font-size: 13px; color: #666;">{{ Str::limit($testimonial->text, 40) }}</td>
                                    <td style="padding: 16px; text-align: center;">
                                        @if($testimonial->file_path)
                                            <a href="{{ $testimonial->file_url }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: #e8f5e9; border-radius: 6px; color: #2e7d32; text-decoration: none; font-size: 14px;">
                                                <i class="fas {{ $testimonial->file_icon }}"></i>
                                            </a>
                                        @else
                                            <span style="color: #ccc; font-size: 12px;">—</span>
                                        @endif
                                    </td>
                                    <td style="padding: 16px; font-size: 13px;">
                                        <span style="color: #f59e0b; font-weight: 700;">{{ $testimonial->rating }}/5 ★</span>
                                    </td>
                                    <td style="padding: 16px; font-size: 13px;">
                                        @if($testimonial->is_active)
                                            <span style="display: inline-block; background: #d1fae5; color: #065f46; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 700;">Activo</span>
                                        @else
                                            <span style="display: inline-block; background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 700;">Inactivo</span>
                                        @endif
                                    </td>
                                    <td style="padding: 16px; text-align: center;">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" style="display: inline-block; background: #e0f2fe; color: #0369a1; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; font-weight: 600; margin-right: 6px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro?');">
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
                    {{ $testimonials->links() }}
                </div>
            @else
                <div style="padding: 60px 20px; text-align: center;">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ddd; margin-bottom: 16px; display: block;"></i>
                    <p style="color: #999; font-size: 14px; margin: 0;">No hay testimonios. <a href="{{ route('admin.testimonials.create') }}" style="color: var(--primary); font-weight: 700; text-decoration: none;">Crear uno nuevo</a></p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
