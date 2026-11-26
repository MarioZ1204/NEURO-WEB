<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Testimonial;
use App\Models\ContactRequest;
use App\Models\JobApplication;
use App\Models\InternshipRequest;
use App\Models\ConvenioRequest;
use App\Models\TeamMember;
use App\Models\Banner;
use App\Models\HomeService;
use Symfony\Component\HttpFoundation\Response;

class LandingController extends Controller
{
    public function aboutUs() {
        return view('templates.aboutUs');
    }

    public function inicio() {
        return view('templates.landing', $this->landingData());
    }

    public function landingData(): array
    {
        try {
            $testimonials = Testimonial::where('is_active', true)->orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            Log::error('Error loading testimonials: ' . $e->getMessage());
            $testimonials = collect();
        }
        $teamMembers = TeamMember::published();
        try {
            $banners = Banner::where('is_active', true)->orderBy('order')->get();
        } catch (\Exception $e) {
            Log::error('Error loading banners: ' . $e->getMessage());
            $banners = collect();
        }

        $homeServices = HomeService::publishedBySection();

        return compact('testimonials', 'teamMembers', 'banners', 'homeServices');
    }

    public function sendLlamamos(Request $request)
    {
        $validated = $request->validate([
            'doc_type' => 'required|string|max:10',
            'doc_number' => 'required|string|max:40',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_prefix' => 'required|string|max:6',
            'phone' => 'required|string|max:30',
            'insurer' => 'required|string|max:150',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5|max:3000',
            'call_when' => 'nullable|in:asap,scheduled',
            'call_datetime' => 'nullable|date',
            'specialty' => 'nullable|string|max:80',
        ]);

        $phoneDigits = preg_replace('/[^0-9]/', '', $validated['phone_prefix'] . $validated['phone']);
        $fullName = trim($validated['first_name'] . ' ' . $validated['last_name']);
        $when = ($validated['call_when'] ?? 'asap') === 'scheduled' && !empty($validated['call_datetime'])
            ? $validated['call_datetime']
            : 'Lo más pronto posible';
        $specialty = $validated['specialty'] ?: 'No indicada';

        $messageBody = $validated['message'] . "\n\n"
            . "Documento: {$validated['doc_type']} {$validated['doc_number']}\n"
            . "Aseguradora: {$validated['insurer']}\n"
            . "Especialidad: {$specialty}\n"
            . "Cuándo llamar: {$when}\n"
            . "Teléfono: {$validated['phone_prefix']} {$validated['phone']}";

        try {
            ContactRequest::create([
                'name' => $fullName,
                'email' => $validated['email'],
                'phone' => $phoneDigits,
                'type' => 'solicitud',
                'subject' => 'Lo llamamos - solicitud de cita',
                'message' => $messageBody,
            ]);

            $destino = $this->correoContacto();
            $html = '<h2>Nueva solicitud: Lo llamamos</h2><hr>'
                . '<p><strong>Nombre:</strong> ' . e($fullName) . '</p>'
                . '<p><strong>Documento:</strong> ' . e($validated['doc_type'] . ' ' . $validated['doc_number']) . '</p>'
                . '<p><strong>Correo:</strong> ' . e($validated['email']) . '</p>'
                . '<p><strong>Teléfono:</strong> ' . e($validated['phone_prefix'] . ' ' . $validated['phone']) . '</p>'
                . '<p><strong>Aseguradora:</strong> ' . e($validated['insurer']) . '</p>'
                . '<p><strong>Especialidad:</strong> ' . e($specialty) . '</p>'
                . '<p><strong>Cuándo llamar:</strong> ' . e($when) . '</p>'
                . '<p><strong>Mensaje:</strong></p><p>' . nl2br(e($validated['message'])) . '</p>';

            try {
                Mail::send([], [], function ($mail) use ($validated, $html, $destino, $fullName) {
                    $mail->to($destino)
                        ->subject('Lo llamamos: ' . $fullName)
                        ->replyTo($validated['email'], $fullName)
                        ->html($html);
                });
            } catch (\Exception $mailError) {
                Log::error('Error mail sendLlamamos', ['error' => $mailError->getMessage()]);
            }

            return response()->json([
                'ok' => true,
                'message' => 'Solicitud recibida. Lo contactaremos pronto.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error sendLlamamos', ['error' => $e->getMessage()]);
            return response()->json([
                'ok' => false,
                'message' => 'No pudimos registrar su solicitud. Intente de nuevo o escríbanos por WhatsApp.',
            ], 500);
        }
    }

    public function sitemap()
    {
        $urls = [
            route('landing.inicio'),
            route('landing.aboutUs'),
            route('landing.portafolio'),
            route('landing.tiposConsulta'),
            route('landing.tiposTerapia'),
            route('landing.electrodiagnosticos'),
            route('consulta.neurologia'),
            route('consulta.epileptologia'),
            route('consulta.psiquiatria'),
            route('consulta.neuropsicologia'),
            route('consulta.psicologia'),
            route('consulta.medicinaGeneral'),
            route('consulta.oftalmologia'),
            route('consulta.oftalmologiaPediatrica'),
            route('consulta.terapiaFisica'),
            route('consulta.terapiaOcupacional'),
            route('consulta.fonoaudiologia'),
            route('servicios.clinicaSueno'),
            route('especialidades'),
            route('directorioMedico'),
            route('escribanos'),
            route('politicaPrivacidad'),
            route('marcoLegal'),
            route('articulos'),
            route('estadosFinancieros'),
            route('trabaje.hojaDeVida'),
            route('trabaje.practicas'),
            route('trabaje.convenio'),
            route('educacion.polisBasal'),
            route('educacion.polisomnografia'),
            route('educacion.saludSueno'),
            route('testimonial.form'),
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $url) {
            $xml .= '  <url><loc>' . e($url) . '</loc></url>' . "\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    // Métodos para las páginas de servicios
    public function tiposConsulta() {
        return view('templates.tiposConsulta');
    }
    
    public function portafolio() {
    return view('templates.portafolio');
    }

    public function tiposTerapia() {
        return view('templates.tiposTerapia');
    }

    public function electrodiagnosticos() {
        return view('templates.electrodiagnosticos');
    }

    public function politicaPrivacidad() {
        return view('templates.politicaPrivacidad');
    }

    // Nuestra Institución
    public function marcoLegal() {
        return view('templates.marcoLegal');
    }

    // Consulta Especializada
    public function neurologia() {
        return view('templates.neurologia');
    }

    public function epileptologia() {
        return view('templates.epileptologia');
    }

    public function psiquiatria() {
        return view('templates.psiquiatria');
    }

    public function neuropsicologia() {
        return view('templates.neuropsicologia');
    }

    public function psicologia() {
        return view('templates.psicologia');
    }

    public function medicinaGeneral() {
        return view('templates.medicinaGeneral');
    }

    public function oftalmologia() {
        return view('templates.oftalmologia');
    }

    public function oftalmologiaPediatrica() {
        return view('templates.oftalmologiaPediatrica');
    }

    public function terapiaFisica() {
        return view('templates.terapiaFisica');
    }

    public function terapiaOcupacional() {
        return view('templates.terapiaOcupacional');
    }

    public function fonoaudiologia() {
        return view('templates.fonoaudiologia');
    }

    // Servicios Complementarios
    public function clinicaSueno() {
        return view('templates.clinicaSueno');
    }

    // Educación al Paciente
    public function polisBasal() {
        return view('templates.polisomnografiaBasal');
    }

    public function polisomnografia() {
        return view('templates.polisomnografia');
    }

    // Trabaje con Nosotros
    public function hojaDeVida() {
        return view('templates.hojaDeVida');
    }

    public function sendHojaDeVida(Request $request) {
        $validated = $request->validate([
            'nombre'       => 'required|string|max:100',
            'apellido'     => 'required|string|max:100',
            'correo'       => 'required|email|max:255',
            'telefono'     => 'required|string|max:20',
            'profesion'    => 'required|string|max:150',
            'cargo'        => 'required|string|max:100',
            'hoja_de_vida' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'mensaje'      => 'nullable|string|max:2000',
        ]);
        
        $path = $request->file('hoja_de_vida')->store('hojas-de-vida', 'local');
        $validated['email'] = $validated['correo'];
        $validated['file_path'] = $path;
        unset($validated['correo']);
        unset($validated['hoja_de_vida']);
        
        try {
            JobApplication::create($validated);

            Log::info('Nueva postulación HV guardada', ['correo' => $request->correo, 'cargo' => $request->cargo, 'archivo' => $path]);

            $destino = $this->soloUnCorreo(config('mail.hojas_de_vida'));
            $mensaje = '<h2>Nueva postulación de Hoja de Vida</h2><hr>' .
                '<p><strong>Nombre:</strong> ' . e($request->nombre) . ' ' . e($request->apellido) . '</p>' .
                '<p><strong>Correo:</strong> ' . e($request->correo) . '</p>' .
                '<p><strong>Teléfono:</strong> ' . e($request->telefono) . '</p>' .
                '<p><strong>Profesión:</strong> ' . e($request->profesion) . '</p>' .
                '<p><strong>Cargo:</strong> ' . e($request->cargo) . '</p>' .
                '<p><strong>Mensaje:</strong></p><p>' . nl2br(e($request->mensaje)) . '</p>';

            Mail::send([], [], function ($m) use ($request, $mensaje, $destino, $path) {
                $m->to($destino)
                    ->subject('Nueva Hoja de Vida: ' . $request->nombre . ' ' . $request->apellido)
                    ->replyTo($request->correo, $request->nombre . ' ' . $request->apellido)
                    ->html($mensaje)
                    ->attach(storage_path('app/' . $path));
            });

            return redirect()->route('trabaje.hojaDeVida')->with('hv_success', 'Su postulación fue recibida correctamente. Le contactaremos pronto.');
        } catch (\Exception $e) {
            Log::error('Error enviando hoja de vida', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'No pudimos enviar su postulación. Intente de nuevo más tarde.');
        }
    }

    public function practicas() {
        return view('templates.practicas');
    }

    public function sendPracticas(Request $request) {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:100',
            'apellido'    => 'required|string|max:100',
            'correo'      => 'required|email|max:255',
            'telefono'    => 'required|string|max:20',
            'universidad' => 'required|string|max:200',
            'programa'    => 'required|string|max:150',
            'semestre'    => 'required|string|max:50',
            'area'        => 'required|string|max:100',
            'carta'       => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $path = null;
        if ($request->hasFile('carta')) {
            $path = $request->file('carta')->store('practicas', 'local');
        }

        $validated['email'] = $validated['correo'];
        $validated['file_path'] = $path;
        unset($validated['correo']);
        unset($validated['carta']);

        try {
            InternshipRequest::create($validated);

            Log::info('Solicitud de práctica guardada', ['email' => $request->correo, 'universidad' => $request->universidad]);

            $destino = $this->soloUnCorreo(config('mail.hojas_de_vida'));
            $mensaje = '<h2>Nueva solicitud de prácticas académicas</h2><hr>' .
                '<p><strong>Nombre:</strong> ' . e($request->nombre) . ' ' . e($request->apellido) . '</p>' .
                '<p><strong>Correo:</strong> ' . e($request->correo) . '</p>' .
                '<p><strong>Teléfono:</strong> ' . e($request->telefono) . '</p>' .
                '<p><strong>Universidad:</strong> ' . e($request->universidad) . '</p>' .
                '<p><strong>Programa:</strong> ' . e($request->programa) . '</p>' .
                '<p><strong>Semestre:</strong> ' . e($request->semestre) . '</p>' .
                '<p><strong>Área de interés:</strong> ' . e($request->area) . '</p>';

            Mail::send([], [], function ($m) use ($request, $mensaje, $destino, $path) {
                $m->to($destino)
                    ->subject('Nueva solicitud de prácticas: ' . $request->nombre . ' ' . $request->apellido)
                    ->replyTo($request->correo, $request->nombre . ' ' . $request->apellido)
                    ->html($mensaje);

                if ($path) {
                    $m->attach(storage_path('app/' . $path));
                }
            });

            return redirect()->route('trabaje.practicas')->with('practicas_success', 'Su solicitud fue recibida. Le confirmaremos disponibilidad pronto.');
        } catch (\Exception $e) {
            Log::error('Error enviando solicitud de prácticas', ['error' => $e->getMessage(), 'correo' => $request->correo]);
            return back()->withInput()->with('error', 'No pudimos enviar su solicitud. Intente de nuevo más tarde.');
        }
    }

    public function convenioInstitucional() {
        return view('templates.convenioInstitucional');
    }

    public function sendConvenio(Request $request) {
        $validated = $request->validate([
            'institucion'   => 'required|string|max:200',
            'tipo'          => 'required|string|max:100',
            'representante' => 'required|string|max:150',
            'cargo'         => 'required|string|max:100',
            'correo'        => 'required|email|max:255',
            'telefono'      => 'required|string|max:20',
            'objetivo'      => 'required|string|max:2000',
            'propuesta'     => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $path = null;
        if ($request->hasFile('propuesta')) {
            $path = $request->file('propuesta')->store('convenios', 'local');
        }

        $validated['email'] = $validated['correo'];
        $validated['file_path'] = $path;
        unset($validated['correo']);
        unset($validated['propuesta']);

        try {
            ConvenioRequest::create($validated);

            $destino = $this->soloUnCorreo(config('mail.hojas_de_vida'));
            $mensaje = '<h2>Nueva solicitud de convenio interinstitucional</h2><hr>' .
                '<p><strong>Institución:</strong> ' . e($request->institucion) . '</p>' .
                '<p><strong>Tipo:</strong> ' . e($request->tipo) . '</p>' .
                '<p><strong>Representante:</strong> ' . e($request->representante) . '</p>' .
                '<p><strong>Cargo:</strong> ' . e($request->cargo) . '</p>' .
                '<p><strong>Correo:</strong> ' . e($request->correo) . '</p>' .
                '<p><strong>Teléfono:</strong> ' . e($request->telefono) . '</p>' .
                '<p><strong>Objetivo:</strong></p><p>' . nl2br(e($request->objetivo)) . '</p>';

            Mail::send([], [], function ($m) use ($request, $mensaje, $destino, $path) {
                $m->to($destino)
                    ->subject('Nueva solicitud de convenio interinstitucional: ' . $request->institucion)
                    ->replyTo($request->correo, $request->representante)
                    ->html($mensaje);

                if ($path) {
                    $m->attach(storage_path('app/' . $path));
                }
            });

            Log::info('Solicitud de convenio enviada', ['institucion' => $request->institucion, 'correo' => $request->correo, 'destino' => $destino]);

            return redirect()->route('trabaje.convenio')->with('convenio_success', 'Su solicitud fue recibida. Nuestro equipo directivo le contactará a la brevedad.');
        } catch (\Exception $e) {
            Log::error('Error enviando solicitud de convenio', ['error' => $e->getMessage(), 'correo' => $request->correo]);
            return back()->withInput()->with('error', 'No pudimos enviar su solicitud. Intente de nuevo más tarde.');
        }
    }

    public function saludDelSueno() {
        return view('templates.saludDelSueno');
    }

    public function sendEncuestaSueno(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'genero' => 'required|string|max:40',
            'edad' => 'required|integer|min:1|max:120',
            'telefono' => 'required|string|max:30',
            'telefono_alt' => 'nullable|string|max:30',
            'email' => 'required|email|max:255',
            'puntaje' => 'nullable|integer|min:0|max:99',
            'epworth' => 'nullable|integer|min:0|max:24',
        ]);

        $fullName = trim($validated['nombres'] . ' ' . $validated['apellidos']);
        $phone = preg_replace('/[^0-9+]/', '', $validated['telefono']);
        $epworthTxt = array_key_exists('epworth', $validated) && $validated['epworth'] !== null
            ? (string) $validated['epworth']
            : 'No aplica';

        $messageBody = "Encuesta de evaluación del sueño\n"
            . "Género: {$validated['genero']}\n"
            . "Edad: {$validated['edad']}\n"
            . "Teléfono: {$validated['telefono']}\n"
            . "Teléfono alternativo: " . ($validated['telefono_alt'] ?: 'No indicado') . "\n"
            . "Puntaje total: " . ($validated['puntaje'] ?? 'N/D') . " / 99\n"
            . "Epworth: {$epworthTxt}";

        try {
            ContactRequest::create([
                'name' => $fullName,
                'email' => $validated['email'],
                'phone' => $phone,
                'type' => 'solicitud',
                'subject' => 'Encuesta de sueño',
                'message' => $messageBody,
            ]);

            $destino = $this->correoContacto();
            $html = '<h2>Nueva encuesta de evaluación del sueño</h2><hr>'
                . '<p><strong>Nombre:</strong> ' . e($fullName) . '</p>'
                . '<p><strong>Género:</strong> ' . e($validated['genero']) . '</p>'
                . '<p><strong>Edad:</strong> ' . e((string) $validated['edad']) . '</p>'
                . '<p><strong>Correo:</strong> ' . e($validated['email']) . '</p>'
                . '<p><strong>Teléfono:</strong> ' . e($validated['telefono']) . '</p>'
                . '<p><strong>Teléfono alternativo:</strong> ' . e($validated['telefono_alt'] ?: 'No indicado') . '</p>'
                . '<p><strong>Puntaje total:</strong> ' . e((string) ($validated['puntaje'] ?? 'N/D')) . ' / 99</p>'
                . '<p><strong>Epworth:</strong> ' . e($epworthTxt) . '</p>';

            try {
                Mail::send([], [], function ($mail) use ($validated, $html, $destino, $fullName) {
                    $mail->to($destino)
                        ->subject('Encuesta de sueño: ' . $fullName)
                        ->replyTo($validated['email'], $fullName)
                        ->html($html);
                });
            } catch (\Exception $mailError) {
                Log::error('Error mail sendEncuestaSueno', ['error' => $mailError->getMessage()]);
            }

            return response()->json([
                'ok' => true,
                'message' => 'Encuesta registrada. Gracias por completar la evaluación.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error sendEncuestaSueno', ['error' => $e->getMessage()]);
            return response()->json([
                'ok' => false,
                'message' => 'No pudimos registrar la encuesta. Intente de nuevo más tarde.',
            ], 500);
        }
    }

    // Páginas del FAB
    public function escribanos() {
        return view('templates.escribanos');
    }

    public function sendEscribanos(Request $request) {
        $validated = $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo'   => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'asunto'   => 'required|string|max:150',
            'mensaje'  => 'required|string|min:10|max:3000',
        ]);

        // Limpiar teléfono
        if (!empty($validated['telefono'])) {
            $cleanPhone = preg_replace('/[^0-9]/', '', $validated['telefono']);
            if (!empty($cleanPhone) && (strlen($cleanPhone) < 7 || strlen($cleanPhone) > 15)) {
                return back()->withInput()->withErrors(['telefono' => 'El teléfono debe tener entre 7 y 15 dígitos.']);
            }
            $validated['telefono'] = !empty($cleanPhone) ? $cleanPhone : null;
        }

        try {
            $contactData = [
                'name' => $validated['nombre'] . ' ' . $validated['apellido'],
                'email' => $validated['correo'],
                'phone' => $validated['telefono'],
                'type' => 'solicitud',
                'subject' => 'Escríbanos: ' . $validated['asunto'],
                'message' => $validated['mensaje'],
            ];
            ContactRequest::create($contactData);

            $destino = $this->correoContacto();
            $html = '<h2>Mensaje desde Escríbanos</h2><hr>' .
                '<p><strong>Nombre:</strong> ' . e($validated['nombre']) . ' ' . e($validated['apellido']) . '</p>' .
                '<p><strong>Correo:</strong> ' . e($validated['correo']) . '</p>' .
                '<p><strong>Teléfono:</strong> ' . e($validated['telefono'] ?? 'No indicado') . '</p>' .
                '<p><strong>Asunto:</strong> ' . e($validated['asunto']) . '</p>' .
                '<p><strong>Mensaje:</strong></p><p>' . nl2br(e($validated['mensaje'])) . '</p>';

            try {
                Mail::send([], [], function ($m) use ($validated, $html, $destino) {
                    $m->to($destino)
                        ->subject('Escríbanos: ' . $validated['asunto'])
                        ->replyTo($validated['correo'], $validated['nombre'] . ' ' . $validated['apellido'])
                        ->html($html);
                });
            } catch (\Exception $mailError) {
                Log::error('Error mail sendEscribanos', ['error' => $mailError->getMessage()]);
            }

            return redirect()->route('escribanos')->with('escribanos_success', 'Su mensaje fue enviado. Le responderemos en 24 horas hábiles.');
        } catch (\Exception $e) {
            Log::error('Error sendEscribanos', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'No pudimos enviar su mensaje. Intente de nuevo más tarde.');
        }
    }

    public function especialidades() {
        return view('templates.especialidades');
    }

    public function directorioMedico() {
        $teamMembers = TeamMember::published();

        return view('templates.directorioMedico', compact('teamMembers'));
    }

    public function articulos() {
        return view('templates.articulos');
    }

    public function estadosFinancieros() {
        return view('templates.estadosFinancieros');
    }

    public function busqueda() {
        return view('templates.busqueda');
    }

    public function serveTeamPhoto(TeamMember $member): Response
    {
        if (!$member->is_active && !session('admin_authenticated')) {
            abort(404);
        }
        if (!$member->photo_path) {
            abort(404);
        }

        $disk = Storage::disk('public');
        if (!$disk->exists($member->photo_path)) {
            abort(404);
        }

        return response()->file($disk->path($member->photo_path), [
            'Content-Type' => $disk->mimeType($member->photo_path),
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function servePublicFile(string $path): Response
    {
        $path = str_replace('\\', '/', $path);
        if ($path === '' || str_contains($path, '..') || str_starts_with($path, '/')) {
            abort(404);
        }

        $disk = Storage::disk('public');
        if (!$disk->exists($path)) {
            abort(404);
        }

        $mimeType = $disk->mimeType($path) ?: 'application/octet-stream';

        return response()->file($disk->path($path), [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function serveTestimonialFile(Testimonial $testimonial): Response
    {
        if (!$testimonial->file_path) {
            abort(404);
        }

        if (!$testimonial->is_active && !session('admin_authenticated')) {
            abort(404);
        }

        $disk = Storage::disk('public');

        if (!$disk->exists($testimonial->file_path)) {
            abort(404);
        }

        $mimeType = $testimonial->file_type ?: $disk->mimeType($testimonial->file_path);

        return response()->file(
            $disk->path($testimonial->file_path),
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . basename($testimonial->file_path) . '"',
                'Cache-Control' => 'public, max-age=86400',
            ]
        );
    }

    public function showTestimonialForm()
    {
        return view('templates.dejar-testimonio', [
            'services' => $this->testimonialServices(),
        ]);
    }

    public function submitTestimonial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'detail' => ['required', 'string', Rule::in($this->testimonialServices())],
            'text' => 'required|string|min:20|max:500',
            'rating' => 'required|integer|between:1,5',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,gif|max:10240',
        ]);

        $validated['is_active'] = false;

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('testimonials', $fileName, 'public');

            $validated['file_path'] = $filePath;
            $validated['file_type'] = $file->getMimeType();
            $validated['file_size'] = $file->getSize();
        }

        Testimonial::create($validated);

        return redirect()
            ->route('testimonial.form')
            ->with('testimonial_success', '¡Gracias por compartir su experiencia! Su testimonio será revisado y publicado pronto.');
    }

    private function testimonialServices(): array
    {
        return [
            'Neurología',
            'Epileptología',
            'Psiquiatría',
            'Psicología',
            'Neuropsicología',
            'Fisioterapia',
            'Estudio Electrodiagnóstico',
        ];
    }

    private function correoContacto(): string
    {
        $fromSetting = function_exists('setting') ? setting('contact_email') : null;

        return $this->soloUnCorreo($fromSetting ?: config('mail.contact'), 'neurocienciasnarino@gmail.com');
    }

    private function soloUnCorreo(?string $valor, string $fallback = 'institutohojasdevida@gmail.com'): string
    {
        $primero = trim(explode(',', (string) $valor)[0]);

        return $primero !== '' ? $primero : $fallback;
    }
}
