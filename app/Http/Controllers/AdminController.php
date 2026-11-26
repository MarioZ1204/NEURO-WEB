<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Upload;
use App\Models\Media;
use App\Models\Banner;
use App\Models\ContactRequest;
use App\Models\JobApplication;
use App\Models\InternshipRequest;
use App\Models\ConvenioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Dashboard principal del admin
     */
    public function dashboard()
    {
        try {
            $citas_new = ContactRequest::citas()->where('status', 'new')->count();
            $mensajes_new = ContactRequest::mensajes()->where('status', 'new')->count();
            $jobs_new = JobApplication::where('status', 'new')->count();
            $internships_new = InternshipRequest::where('status', 'new')->count();
            $convenios_new = ConvenioRequest::where('status', 'new')->count();
            $testimonials_count = Testimonial::count();
            $recent_citas = ContactRequest::citas()->latest()->limit(8)->get();
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Admin dashboard', ['error' => $e->getMessage()]);
            $citas_new = $mensajes_new = $jobs_new = $internships_new = $convenios_new = $testimonials_count = 0;
            $recent_citas = collect();
        }

        return view('admin.dashboard', compact(
            'citas_new',
            'mensajes_new',
            'jobs_new',
            'internships_new',
            'convenios_new',
            'testimonials_count',
            'recent_citas'
        ));
    }

    // ========== TESTIMONIOS ==========

    /**
     * Lista todos los testimonios
     */
    public function indexTestimonials()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Forma para crear nuevo testimonio
     */
    public function createTestimonial()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Guardar nuevo testimonio
     */
    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'detail' => 'required|string|max:100',
            'text' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
            'avatar_url' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,pdf|max:10240', // 10MB máximo
            'is_active' => 'nullable|in:0,1,on',
        ]);

        // Convertir el checkbox a booleano
        $validated['is_active'] = $request->has('is_active') && $request->get('is_active') !== '0';

        // Procesar subida de archivo
        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('testimonials', $fileName, 'public');

            $validated['file_path'] = $filePath;
            $validated['file_type'] = $file->getMimeType();
            $validated['file_size'] = $file->getSize();
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonio creado exitosamente');
    }

    /**
     * Editar testimonio
     */
    public function editTestimonial(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Actualizar testimonio
     */
    public function updateTestimonial(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'detail' => 'required|string|max:100',
            'text' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
            'avatar_url' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,pdf|max:10240', // 10MB máximo
            'is_active' => 'nullable|in:0,1,on',
        ]);

        // Convertir el checkbox a booleano
        $validated['is_active'] = $request->has('is_active') && $request->get('is_active') !== '0';

        // Procesar subida de archivo si es nueva
        if ($request->file('file')) {
            // Eliminar archivo anterior si existe
            if ($testimonial->file_path) {
                Storage::disk('public')->delete($testimonial->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('testimonials', $fileName, 'public');

            $validated['file_path'] = $filePath;
            $validated['file_type'] = $file->getMimeType();
            $validated['file_size'] = $file->getSize();
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonio actualizado exitosamente');
    }

    /**
     * Eliminar testimonio
     */
    public function destroyTestimonial(Testimonial $testimonial)
    {
        if ($testimonial->file_path) {
            Storage::disk('public')->delete($testimonial->file_path);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonio eliminado exitosamente');
    }

    // ========== UPLOADS ==========

    /**
     * Lista todos los uploads
     */
    public function indexUploads()
    {
        $uploads = Upload::latest()->paginate(15);
        return view('admin.uploads.index', compact('uploads'));
    }

    /**
     * Forma para subir archivos
     */
    public function createUpload()
    {
        $sections = [
            'hero' => 'Sección Hero/Banner',
            'testimonials' => 'Testimonios',
            'about' => 'Acerca de Nosotros',
            'services' => 'Servicios',
            'gallery' => 'Galería',
            'documents' => 'Documentos',
            'other' => 'Otro',
        ];
        return view('admin.uploads.create', compact('sections'));
    }

    /**
     * Guardar archivo subido
     */
    public function storeUpload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,doc,docx,xls,xlsx,mp4,webm,zip|max:50000', // 50MB max
            'section' => 'required|string',
            'description' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            Upload::create([
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $filePath,
                'file_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'section' => $validated['section'],
                'description' => $validated['description'] ?? null,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('admin.uploads.index')
                ->with('success', 'Archivo subido exitosamente');
        }

        return back()->with('error', 'Error al subir el archivo');
    }

    /**
     * Editar información de upload
     */
    public function editUpload(Upload $upload)
    {
        $sections = [
            'hero' => 'Sección Hero/Banner',
            'testimonials' => 'Testimonios',
            'about' => 'Acerca de Nosotros',
            'services' => 'Servicios',
            'gallery' => 'Galería',
            'documents' => 'Documentos',
            'other' => 'Otro',
        ];
        return view('admin.uploads.edit', compact('upload', 'sections'));
    }

    /**
     * Actualizar información de upload
     */
    public function updateUpload(Request $request, Upload $upload)
    {
        $validated = $request->validate([
            'section' => 'required|string',
            'description' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $upload->update($validated);

        return redirect()->route('admin.uploads.index')
            ->with('success', 'Información del archivo actualizada');
    }

    /**
     * Eliminar archivo
     */
    public function destroyUpload(Upload $upload)
    {
        // Eliminar archivo del almacenamiento
        if (Storage::disk('public')->exists($upload->file_path)) {
            Storage::disk('public')->delete($upload->file_path);
        }

        $upload->delete();

        return redirect()->route('admin.uploads.index')
            ->with('success', 'Archivo eliminado exitosamente');
    }

    /**
     * Descargar archivo
     */
    public function downloadUpload(Upload $upload)
    {
        return Storage::disk('public')->download($upload->file_path, $upload->file_name);
    }

    // ========== BANNERS ==========

    /**
     * Lista todos los banners
     */
    public function indexBanners()
    {
        $banners = Banner::orderBy('order')->paginate(15);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Forma para crear nuevo banner
     */
    public function createBanner()
    {
        return view('admin.banners.create');
    }

    /**
     * Guardar nuevo banner
     */
    public function storeBanner(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|image|max:5120', // 5MB
            'is_active' => 'nullable|in:0,1,on',
        ]);

        $isActive = $request->has('is_active') && $request->get('is_active') !== '0';
        $file = $request->file('image_path');

        if (!$file) {
            return back()->withErrors(['image_path' => 'Imagen requerida'])->withInput();
        }

        try {
            Storage::disk('public')->makeDirectory('banners');
            $fileName = time() . '_banner.' . strtolower($file->getClientOriginalExtension() ?: 'jpg');
            $filePath = $file->storeAs('banners', $fileName, 'public');
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Banner upload failed', ['error' => $e->getMessage()]);
            return back()->withErrors(['image_path' => 'No se pudo guardar la imagen. Revise permisos de storage/app/public.'])->withInput();
        }

        if (!$filePath) {
            return back()->withErrors(['image_path' => 'No se pudo guardar la imagen. Revise permisos de storage/app/public.'])->withInput();
        }

        Banner::create([
            'title' => trim((string) $request->input('title')) !== ''
                ? trim((string) $request->input('title'))
                : ('Banner ' . now()->format('d/m/Y H:i')),
            'image_path' => $filePath,
            'order' => (int) (Banner::max('order') ?? 0) + 1,
            'is_active' => $isActive,
        ]);

        return redirect()->to(url('/admin/banners'))
            ->with('success', 'Banner creado exitosamente');
    }

    /**
     * Editar banner
     */
    public function editBanner(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Actualizar banner
     */
    public function updateBanner(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|max:5120',
            'is_active' => 'nullable|in:0,1,on',
        ]);

        $isActive = $request->has('is_active') && $request->get('is_active') !== '0';

        if ($request->filled('title')) {
            $banner->title = trim((string) $request->input('title'));
        } elseif (!$banner->title) {
            $banner->title = 'Banner ' . now()->format('d/m/Y H:i');
        }

        if ($request->file('image_path')) {
            try {
                if ($banner->image_path) {
                    Storage::disk('public')->delete($banner->image_path);
                }
                Storage::disk('public')->makeDirectory('banners');
                $file = $request->file('image_path');
                $fileName = time() . '_banner.' . strtolower($file->getClientOriginalExtension() ?: 'jpg');
                $filePath = $file->storeAs('banners', $fileName, 'public');
                if (!$filePath) {
                    return back()->withErrors(['image_path' => 'No se pudo guardar la imagen.'])->withInput();
                }
                $banner->image_path = $filePath;
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::error('Banner update upload failed', ['error' => $e->getMessage()]);
                return back()->withErrors(['image_path' => 'No se pudo guardar la imagen.'])->withInput();
            }
        }

        $banner->is_active = $isActive;
        $banner->save();

        return redirect()->to(url('/admin/banners'))
            ->with('success', 'Banner actualizado exitosamente');
    }

    /**
     * Eliminar banner
     */
    public function destroyBanner(Banner $banner)
    {
        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();
        return redirect()->to(url('/admin/banners'))
            ->with('success', 'Banner eliminado exitosamente');
    }

    // ========== MEDIA ==========

    /**
     * Lista todos los archivos multimedia
     */
    public function indexMedia()
    {
        $media = Media::latest()->paginate(20);
        return view('admin.media.index', compact('media'));
    }

    /**
     * Forma para subir multimedia
     */
    public function createMedia()
    {
        $categories = ['imagen', 'pdf', 'documento', 'video', 'audio'];
        return view('admin.media.create', compact('categories'));
    }

    /**
     * Guardar multimedia
     */
    public function storeMedia(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,mp4,webm,mov|max:51200', // 50MB
            'category' => 'required|string',
            'section' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
            'is_active' => 'nullable|in:0,1,on',
        ]);

        $validated['is_active'] = $request->has('is_active') && $request->get('is_active') !== '0';

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('media', $fileName, 'public');

            $validated['file_path'] = $filePath;
            $validated['mime_type'] = $file->getMimeType();
            $validated['file_size'] = $file->getSize();

            Media::create($validated);

            return redirect()->route('admin.media.index')
                ->with('success', 'Archivo multimedia guardado exitosamente');
        }

        return back()->with('error', 'Error al subir el archivo');
    }

    /**
     * Editar multimedia
     */
    public function editMedia(Media $media)
    {
        $categories = ['imagen', 'pdf', 'documento', 'video', 'audio'];
        return view('admin.media.edit', compact('media', 'categories'));
    }

    /**
     * Actualizar información de multimedia
     */
    public function updateMedia(Request $request, Media $media)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string',
            'section' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
            'is_active' => 'nullable|in:0,1,on',
        ]);

        $validated['is_active'] = $request->has('is_active') && $request->get('is_active') !== '0';

        $media->update($validated);

        return redirect()->route('admin.media.index')
            ->with('success', 'Archivo multimedia actualizado exitosamente');
    }

    /**
     * Eliminar multimedia
     */
    public function destroyMedia(Media $media)
    {
        if ($media->file_path) {
            Storage::disk('public')->delete($media->file_path);
        }
        $media->delete();
        return redirect()->route('admin.media.index')
            ->with('success', 'Archivo multimedia eliminado exitosamente');
    }
}
