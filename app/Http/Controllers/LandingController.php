<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function aboutUs() {
        return view('templates.aboutUs');
    }

    // Procesa el envío del formulario de contacto (PQRS)
    public function sendContact(Request $request)
    {
        file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Solicitud POST recibida\n", FILE_APPEND);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'type' => 'required|in:peticion,queja,solicitud',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Validación exitosa\n", FILE_APPEND);

        // Limpiar teléfono de espacios y caracteres especiales
        if (!empty($validated['phone'])) {
            $cleanPhone = preg_replace('/[^0-9]/', '', $validated['phone']);
            
            if (!empty($cleanPhone)) {
                // Solo validar si hay números
                if (strlen($cleanPhone) < 7 || strlen($cleanPhone) > 15) {
                    file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Error: teléfono con longitud incorrecta: " . strlen($cleanPhone) . "\n", FILE_APPEND);
                    return back()->withInput()->withErrors(['phone' => 'El teléfono debe tener entre 7 y 15 dígitos.']);
                }
                $validated['phone'] = $cleanPhone;
            } else {
                // Si no hay números, dejarlo vacío
                $validated['phone'] = null;
            }
        }

        try {
            file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Preparando email\n", FILE_APPEND);

            $html = "<h2>Nueva " . ucfirst($validated['type']) . " recibida</h2><hr>" .
                "<p><strong>Nombre:</strong> " . e($validated['name']) . "</p>" .
                "<p><strong>Correo:</strong> " . e($validated['email']) . "</p>" .
                "<p><strong>Teléfono:</strong> " . e($validated['phone'] ?? 'No proporcionado') . "</p>" .
                "<p><strong>Tipo:</strong> " . e($validated['type']) . "</p>" .
                "<p><strong>Asunto:</strong> " . e($validated['subject']) . "</p>" .
                "<p><strong>Mensaje:</strong></p><p>" . nl2br(e($validated['message'])) . "</p>";

            file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Enviando email a neurocienciasnarino@gmail.com\n", FILE_APPEND);

            Mail::send([], [], function ($message) use ($validated, $html) {
                $message->to('neurocienciasnarino@gmail.com')
                    ->subject('🔔 NUEVO FORMULARIO - ' . ucfirst($validated['type']) . ' - ' . $validated['subject'])
                    ->replyTo($validated['email'], $validated['name'])
                    ->html($html);
            });

            file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Email enviado exitosamente\n", FILE_APPEND);
            Log::info('Contacto enviado exitosamente', ['email' => $validated['email']]);
            
            // Limpiar sesión de errores si existen
            session()->forget('errors');
            
            return redirect('/')->with('success', 'Tu mensaje ha sido enviado correctamente.');
        } catch (\Exception $e) {
            file_put_contents(storage_path('logs/contact_debug.log'), date('Y-m-d H:i:s') . " - Error: " . $e->getMessage() . "\n", FILE_APPEND);
            Log::error('Fallo al enviar contacto', [
                'error' => $e->getMessage(),
                'email' => $validated['email'] ?? 'unknown'
            ]);
            return back()->withInput()->with('error', 'Hubo un error al enviar el mensaje. Por favor intenta de nuevo.');
        }
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
        $request->validate([
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
        Log::info('Nueva postulación HV', ['correo' => $request->correo, 'cargo' => $request->cargo, 'archivo' => $path]);
        return redirect()->route('trabaje.hojaDeVida')->with('hv_success', 'Su postulación fue enviada exitosamente. Le contactaremos pronto.');
    }

    public function practicas() {
        return view('templates.practicas');
    }

    public function sendPracticas(Request $request) {
        $request->validate([
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
        Log::info('Solicitud de práctica', ['correo' => $request->correo, 'universidad' => $request->universidad]);
        return redirect()->route('trabaje.practicas')->with('practicas_success', 'Su solicitud fue enviada. Le confirmaremos disponibilidad pronto.');
    }

    public function convenioInstitucional() {
        return view('templates.convenioInstitucional');
    }

    public function sendConvenio(Request $request) {
        $request->validate([
            'institucion'   => 'required|string|max:200',
            'tipo'          => 'required|string|max:100',
            'representante' => 'required|string|max:150',
            'cargo'         => 'required|string|max:100',
            'correo'        => 'required|email|max:255',
            'telefono'      => 'required|string|max:20',
            'objetivo'      => 'required|string|max:2000',
            'propuesta'     => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);
        Log::info('Solicitud de convenio', ['institucion' => $request->institucion, 'correo' => $request->correo]);
        return redirect()->route('trabaje.convenio')->with('convenio_success', 'Su solicitud fue recibida. Nuestro equipo directivo le contactará a la brevedad.');
    }

    public function saludDelSueno() {
        return view('templates.saludDelSueno');
    }

    // Páginas del FAB
    public function escribanos() {
        return view('templates.escribanos');
    }

    public function sendEscribanos(Request $request) {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo'   => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'asunto'   => 'required|string|max:150',
            'mensaje'  => 'required|string|min:10|max:3000',
        ]);
        $html = '<h2>Mensaje desde Escríbanos</h2><hr>' .
            '<p><strong>Nombre:</strong> ' . e($request->nombre) . ' ' . e($request->apellido) . '</p>' .
            '<p><strong>Correo:</strong> ' . e($request->correo) . '</p>' .
            '<p><strong>Teléfono:</strong> ' . e($request->telefono ?? 'No indicado') . '</p>' .
            '<p><strong>Asunto:</strong> ' . e($request->asunto) . '</p>' .
            '<p><strong>Mensaje:</strong></p><p>' . nl2br(e($request->mensaje)) . '</p>';
        try {
            Mail::send([], [], function ($m) use ($request, $html) {
                $m->to('neurocienciasnarino@gmail.com')
                    ->subject('Escríbanos: ' . $request->asunto)
                    ->replyTo($request->correo, $request->nombre . ' ' . $request->apellido)
                    ->html($html);
            });
        } catch (\Exception $e) {
            Log::error('Error sendEscribanos', ['error' => $e->getMessage()]);
        }
        return redirect()->route('escribanos')->with('escribanos_success', 'Su mensaje fue enviado. Le responderemos en 24 horas hábiles.');
    }

    public function especialidades() {
        return view('templates.especialidades');
    }

    public function directorioMedico() {
        return view('templates.directorioMedico');
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
}
