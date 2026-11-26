@extends('admin.layout')

@section('title', 'Editar Testimonio')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 40px 20px;">
    <div class="ad-split">
        <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <h1 style="font-size: 24px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Editar Testimonio</h1>
            <p style="font-size: 14px; color: #666; margin-bottom: 28px;">Actualiza los datos del testimonio</p>

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

            <form id="testimonialForm" action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" style="display: grid; gap: 20px;">
                @csrf
                @method('PUT')

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Nombre del Paciente *</label>
                    <input type="text" name="name" value="{{ $testimonial->name }}" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Cargo/Tipo de Paciente *</label>
                    <input type="text" name="detail" value="{{ $testimonial->detail }}" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Testimonio *</label>
                    <textarea name="text" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; resize: vertical; min-height: 100px; box-sizing: border-box;">{{ $testimonial->text }}</textarea>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Calificación (Estrellas) *</label>
                    <select name="rating" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                        <option value="">Seleccionar</option>
                        <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Estrellas ★★★★★</option>
                        <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Estrellas ★★★★</option>
                        <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Estrellas ★★★</option>
                        <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>2 Estrellas ★★</option>
                        <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>1 Estrella ★</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Avatar (Iniciales o URL)</label>
                    <input type="text" name="avatar_url" value="{{ $testimonial->avatar_url }}" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Documento o Comprobante</label>
                    
                    @if($testimonial->file_path)
                        <div style="background: #e8f5e9; border: 1.5px solid #4caf50; border-radius: 6px; padding: 12px; margin-bottom: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                                <div style="display: flex; align-items: center; gap: 8px; flex: 1;">
                                    <i class="fas {{ $testimonial->file_icon }}" style="font-size: 18px; color: #2e7d32;"></i>
                                    <div style="flex: 1; min-width: 0;">
                                        <p style="font-size: 12px; font-weight: 700; color: #2e7d32; margin: 0 0 2px; word-break: break-word;">{{ basename($testimonial->file_path) }}</p>
                                        <p style="font-size: 11px; color: #558b2f; margin: 0;">{{ $testimonial->file_size_formatted }}</p>
                                    </div>
                                </div>
                                <a href="{{ $testimonial->file_url }}" target="_blank" style="background: #4caf50; color: white; padding: 6px 10px; border-radius: 4px; text-decoration: none; font-size: 11px; font-weight: 700; white-space: nowrap;">Ver</a>
                            </div>
                        </div>
                        <p style="font-size: 11px; color: #999; margin: 0 0 12px;">Archivo actual. Sube uno nuevo para reemplazarlo.</p>
                    @endif
                    
                    <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.gif,.doc,.docx,.xls,.xlsx" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; box-sizing: border-box;">
                    <p style="font-size: 11px; color: #999; margin: 6px 0 0; padding: 0;">Formatos permitidos: PDF, JPG, PNG, GIF, DOC, DOCX, XLS, XLSX. Máximo 10MB</p>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }} style="cursor: pointer; width: 16px; height: 16px;">
                    <label for="is_active" style="font-size: 13px; color: #333; cursor: pointer; margin: 0;">Testimonio activo</label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px;">
                    <button type="submit" style="flex: 1; background: var(--primary); color: white; padding: 12px; border: none; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                        Actualizar
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" style="flex: 1; background: #eee; color: #666; padding: 12px; border-radius: 6px; font-size: 13px; font-weight: 700; text-decoration: none; text-align: center; text-transform: uppercase; letter-spacing: 0.5px;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
        @include('admin.partials.live-preview', ['form' => '#testimonialForm', 'url' => route('admin.preview.testimonial', $testimonial), 'targets' => ['[data-preview-focus]', '#testimonios'], 'note' => 'La reseña que está editando aparece resaltada. Si la desactiva, desaparece de la vista previa.'])
    </div>
</div>
@endsection
