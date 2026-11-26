<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthAdminController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLogin()
    {
        if (session('admin_authenticated')) {
            return redirect('/admin/dashboard');
        }

        return view('admin.login');
    }

    /**
     * Procesar login
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $key = 'admin-login:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                'username' => "Demasiados intentos. Espere {$seconds} segundos e intente de nuevo.",
            ]);
        }

        $adminUser = (string) (config('admin.user') ?: 'admin');
        $adminPassword = (string) config('admin.password', '');

        if ($adminPassword === '') {
            RateLimiter::hit($key, 60);
            return back()->with('error', 'El acceso administrativo no está configurado. Suba config/admin.php y defina ADMIN_PASSWORD, luego ejecute: php artisan config:clear && php artisan config:cache');
        }

        if (
            hash_equals($adminUser, $validated['username'])
            && hash_equals($adminPassword, $validated['password'])
        ) {
            RateLimiter::clear($key);
            $request->session()->regenerate();
            session(['admin_authenticated' => true]);

            return redirect('/admin/dashboard')->with('success', 'Sesión iniciada correctamente');
        }

        RateLimiter::hit($key, 60);

        return back()->with('error', 'Usuario o contraseña incorrectos');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        session()->forget('admin_authenticated');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Sesión cerrada correctamente');
    }
}
