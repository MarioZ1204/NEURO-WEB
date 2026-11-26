<?php

namespace App\Http\Controllers;

use App\Models\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminHomeServiceController extends Controller
{
    public function index()
    {
        $items = HomeService::query()->orderBy('sort_order')->orderBy('id')->get()->groupBy('section');

        return view('admin.home-services.index', [
            'groups' => $items,
            'sections' => HomeService::sections(),
        ]);
    }

    public function create(Request $request)
    {
        $section = array_key_exists($request->query('seccion'), HomeService::sections())
            ? $request->query('seccion')
            : 'consulta';

        return view('admin.home-services.form', [
            'item' => new HomeService(['section' => $section, 'is_active' => true, 'sort_order' => 999]),
            'sections' => HomeService::sections(),
            'pages' => $this->pages(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $item = HomeService::query()->create($data);
        $this->storeImage($request, $item);

        return redirect()->route('admin.homeServices.index')->with('success', 'Servicio agregado a la página de inicio.');
    }

    public function edit(HomeService $homeService)
    {
        return view('admin.home-services.form', [
            'item' => $homeService,
            'sections' => HomeService::sections(),
            'pages' => $this->pages(),
        ]);
    }

    public function update(Request $request, HomeService $homeService)
    {
        $homeService->update($this->validated($request, false));
        $this->storeImage($request, $homeService);

        if ($request->boolean('remove_image') && $homeService->image_path) {
            Storage::disk('public')->delete($homeService->image_path);
            $homeService->update(['image_path' => null]);
        }

        return redirect()->route('admin.homeServices.index')->with('success', 'Servicio actualizado.');
    }

    public function destroy(HomeService $homeService)
    {
        if ($homeService->image_path) {
            Storage::disk('public')->delete($homeService->image_path);
        }
        $homeService->delete();

        return back()->with('success', 'Servicio eliminado de la página de inicio.');
    }

    private function validated(Request $request, bool $creating): array
    {
        $data = $request->validate([
            'section' => ['required', Rule::in(array_keys(HomeService::sections()))],
            'title' => 'required|string|max:150',
            'description' => 'nullable|string|max:400',
            'link' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0|max:9999',
            'image' => ($creating ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,webp|max:4096',
        ], [
            'image.required' => 'Suba una imagen para la tarjeta.',
        ]);

        unset($data['image']);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        return $data;
    }

    private function storeImage(Request $request, HomeService $item): void
    {
        if (!$request->hasFile('image')) {
            return;
        }

        if ($item->image_path) {
            Storage::disk('public')->delete($item->image_path);
        }

        $item->update([
            'image_path' => $request->file('image')->store('home-services', 'public'),
        ]);
    }

    /**
     * Páginas internas sugeridas para el enlace de la tarjeta.
     */
    private function pages(): array
    {
        return [
            '/consulta/neurologia' => 'Neurología',
            '/consulta/epileptologia' => 'Epileptología',
            '/consulta/psiquiatria' => 'Psiquiatría',
            '/consulta/psicologia' => 'Psicología',
            '/consulta/neuropsicologia' => 'Neuropsicología',
            '/consulta/medicina-general' => 'Medicina General',
            '/consulta/oftalmologia' => 'Oftalmología',
            '/consulta/oftalmologia-pediatrica' => 'Oftalmología Pediátrica',
            '/consulta/terapia-fisica' => 'Terapia Física',
            '/consulta/terapia-ocupacional' => 'Terapia Ocupacional',
            '/consulta/fonoaudiologia' => 'Fonoaudiología',
            '/servicios/clinica-del-sueno' => 'Clínica del Sueño',
            '/servicios/electrodiagnosticos' => 'Electrodiagnósticos',
            '/servicios/tipos-terapia' => 'Tipos de terapia',
            '/servicios/tipos-consulta' => 'Tipos de consulta',
            '/especialidades' => 'Especialidades',
            '/portafolio-de-servicios' => 'Portafolio de servicios',
            '/educacion/salud-del-sueno' => 'Salud del sueño',
        ];
    }
}
