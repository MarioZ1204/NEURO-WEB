<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return SiteSetting::getValue($key, $default);
    }
}

if (!function_exists('public_storage_url')) {
    /**
     * URL pública para archivos en storage/app/public.
     * Evita depender del symlink /storage en Hostinger (document root = public_html/).
     */
    function public_storage_url(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        $path = ltrim(str_replace('\\', '/', $path), '/');

        return url('/archivos-publicos/' . $path);
    }
}

if (!function_exists('setting_image')) {
    /**
     * Imagen subida desde Ajustes del sitio, o la imagen por defecto del tema.
     */
    function setting_image(string $key, string $fallbackAsset): string
    {
        $path = SiteSetting::getValue($key, '');

        return $path ? public_storage_url($path) : asset($fallbackAsset);
    }
}
