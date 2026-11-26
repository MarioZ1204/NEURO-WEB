<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Credenciales del panel administrativo
    |--------------------------------------------------------------------------
    |
    | Deben leerse con config('admin.*'), nunca con env() fuera de este archivo,
    | para que sigan funcionando tras php artisan config:cache.
    |
    */

    'user' => env('ADMIN_USER', 'admin'),

    'password' => env('ADMIN_PASSWORD', ''),

];
