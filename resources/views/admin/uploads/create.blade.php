@extends('admin.layout')

@section('title', 'Subir Archivo')

@section('content')
<div style="background: #f5f5f5; min-height: calc(100vh - 80px); padding: 40px 20px;">
    <div class="container" style="max-width: 600px;">
        <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <h1 style="font-size: 24px; font-weight: 900; color: #0f1f1e; margin-bottom: 8px;">Subir Archivo</h1>
            <p style="font-size: 14px; color: #666; margin-bottom: 28px;">Carga un archivo para usar en diferentes secciones de la página</p>

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

            <form action="{{ route('admin.uploads.store') }}" method="POST" enctype="multipart/form-data" style="display: grid; gap: 20px;">
                @csrf

                <!-- Upload del archivo -->
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Seleccionar Archivo *</label>
                    <div style="border: 2px dashed #c8dedd; border-radius: 8px; padding: 40px 20px; text-align: center; cursor: pointer; transition: all 0.3s;" id="dropZone" onmouseover="this.style.background='#f0f9f8'" onmouseout="this.style.background='white'">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: var(--primary); margin-bottom: 12px; display: block;"></i>
                        <p style="margin: 0 0 8px; color: #0f1f1e; font-weight: 600;">Arrastra el archivo aquí o haz clic para seleccionar</p>
                        <p style="margin: 0; font-size: 12px; color: #999;">Máximo 50MB (imágenes, PDF, documentos)</p>
                        <input type="file" name="file" id="fileInput" required style="display: none;" onchange="updateFileName(this)">
                    </div>
                    <p id="fileName" style="margin-top: 12px; font-size: 12px; color: #666;"></p>
                </div>

                <script>
                    const dropZone = document.getElementById('dropZone');
                    const fileInput = document.getElementById('fileInput');

                    dropZone.addEventListener('click', () => fileInput.click());
                    dropZone.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        dropZone.style.background = '#f0f9f8';
                    });
                    dropZone.addEventListener('dragleave', () => dropZone.style.background = 'white');
                    dropZone.addEventListener('drop', (e) => {
                        e.preventDefault();
                        fileInput.files = e.dataTransfer.files;
                        updateFileName(fileInput);
                    });

                    function updateFileName(input) {
                        const fileName = document.getElementById('fileName');
                        if (input.files && input.files[0]) {
                            fileName.textContent = '✓ ' + input.files[0].name + ' (' + (input.files[0].size / 1024).toFixed(2) + ' KB)';
                        }
                    }
                </script>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Sección *</label>
                    <select name="section" required style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; box-sizing: border-box;">
                        <option value="">Seleccionar sección</option>
                        @foreach($sections as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 6px; letter-spacing: 0.5px;">Descripción (Opcional)</label>
                    <textarea name="description" style="width: 100%; padding: 12px; border: 1.5px solid #ddd; border-radius: 6px; font-size: 13px; font-family: 'Poppins', sans-serif; resize: vertical; min-height: 80px; box-sizing: border-box;" placeholder="Agregar notas sobre este archivo..."></textarea>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="is_active" id="is_active" checked style="cursor: pointer; width: 16px; height: 16px;">
                    <label for="is_active" style="font-size: 13px; color: #333; cursor: pointer; margin: 0;">Activar archivo inmediatamente</label>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 24px;">
                    <button type="submit" style="flex: 1; background: var(--primary); color: white; padding: 12px; border: none; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">
                        Subir Archivo
                    </button>
                    <a href="{{ route('admin.uploads.index') }}" style="flex: 1; background: #eee; color: #666; padding: 12px; border-radius: 6px; font-size: 13px; font-weight: 700; text-decoration: none; text-align: center; text-transform: uppercase; letter-spacing: 0.5px;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
