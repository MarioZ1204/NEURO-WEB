<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SolicitarCitaMailable;
use App\Models\ContactRequest;

class SolicitarCitaController extends Controller
{
    public function enviar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:30',
            'mensaje' => 'required|string|max:3000',
        ]);

        try {
            ContactRequest::create([
                'name' => $validated['nombre'],
                'email' => $validated['email'],
                'phone' => preg_replace('/[^0-9+]/', '', $validated['telefono']),
                'type' => 'solicitud',
                'subject' => 'Solicitud de cita',
                'message' => $validated['mensaje'],
            ]);
        } catch (\Exception $e) {
            Log::error('Error guardar solicitar cita', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'No pudimos registrar su solicitud. Intente de nuevo o contáctenos por WhatsApp.');
        }

        try {
            $destino = (string) (setting('contact_email') ?: config('mail.contact'));
            Mail::to($destino)->send(new SolicitarCitaMailable($validated));
        } catch (\Exception $e) {
            Log::error('Error mail solicitar cita', ['error' => $e->getMessage()]);
        }

        return back()->with('success', '¡Su solicitud ha sido enviada correctamente!');
    }
}
