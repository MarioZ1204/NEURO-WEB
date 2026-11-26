<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function defaults(): array
    {
        return [
            'phone_fixed' => '3236822233',
            'phone_fixed_display' => '323 682 2233',
            'wa1' => '573053560651',
            'wa1_tel' => '3053560651',
            'wa1_display' => '305 356 0651',
            'wa1_label' => 'Especialidades',
            'wa2' => '573159729333',
            'wa2_tel' => '3159729333',
            'wa2_display' => '315 972 9333',
            'wa2_label' => 'Servicios complementarios',
            'address' => 'Carrera 34 #13-80 con Calle 14 #33-15, Pasto, Barrio San Ignacio',
            'maps_url' => 'https://maps.app.goo.gl/2Y62iqQ5WPHYPZ5g7',
            'hours_weekdays' => 'Lun – Vie · 7:30 a.m. – 7:00 p.m.',
            'hours_saturday' => 'Sábados · 7:30 a.m. – 12:00 m.',
            'facebook' => 'https://www.facebook.com/neurocienciasnarino',
            'instagram' => 'https://www.instagram.com/neurocienciasnarino',
            'contact_email' => 'neurocienciasnarino@gmail.com',
            'hero_eyebrow' => 'Pasto, Nariño · Colombia',
            'hero_line1' => 'Instituto',
            'hero_line2' => 'Neurociencias,',
            'hero_em' => 'Recupere su sueño, recupere su vida',
            'hero_desc' => 'Atención especializada en neurología y epileptología, con tecnología de diagnóstico avanzada y un equipo médico comprometido con su bienestar.',
            'banner_seconds' => '30',
            'youtube' => '',
            'tiktok' => '',
            'services_title' => 'Nuestros servicios',
            'services_subtitle' => 'Consulta especializada, ayudas diagnósticas y servicios complementarios en un solo lugar.',
            'cta_title' => 'Unimos ciencia, experiencia y precisión para su cuidado',
            'cta_desc' => 'Agende su cita o comuníquese con nosotros. Su salud es nuestra prioridad.',
            'payments_email' => 'pagosneurociencias@gmail.com',
            'qr_pagos_path' => '',
            'qr_donaciones_path' => '',
        ];
    }

    /** Valores sin guardar que solo aplican a la vista previa del panel en esta petición. */
    protected static array $previewOverrides = [];

    public static function previewWith(array $values): void
    {
        static::$previewOverrides = $values;
    }

    /**
     * Convierte lo enviado desde «Ajustes del sitio» en los valores que se guardan.
     */
    public static function fromAdminInput(array $data): array
    {
        $text = fn (string $key) => trim((string) ($data[$key] ?? ''));

        $wa1 = static::localPhone($text('wa1_display'));
        $wa2 = static::localPhone($text('wa2_display'));

        $values = [
            'phone_fixed' => preg_replace('/\D+/', '', $text('phone_fixed_display')) ?: '',
            'phone_fixed_display' => $text('phone_fixed_display'),
            'wa1' => static::withCountry($wa1),
            'wa1_tel' => $wa1,
            'wa1_display' => $text('wa1_display'),
            'wa2' => static::withCountry($wa2),
            'wa2_tel' => $wa2,
            'wa2_display' => $text('wa2_display'),
            'facebook' => $text('facebook') ?: static::defaults()['facebook'],
            'instagram' => $text('instagram') ?: static::defaults()['instagram'],
            'banner_seconds' => (string) (int) ($data['banner_seconds'] ?? 30),
        ];

        foreach ([
            'wa1_label', 'wa2_label', 'address', 'maps_url', 'hours_weekdays', 'hours_saturday',
            'contact_email', 'hero_eyebrow', 'hero_line1', 'hero_line2', 'hero_em', 'hero_desc',
            'youtube', 'tiktok', 'services_title', 'services_subtitle', 'cta_title', 'cta_desc',
            'payments_email',
        ] as $key) {
            $values[$key] = $text($key);
        }

        return $values;
    }

    private static function localPhone(string $value): string
    {
        $digits = preg_replace('/\D+/', '', $value) ?: '';
        if (str_starts_with($digits, '57') && strlen($digits) === 12) {
            return substr($digits, 2);
        }

        return $digits;
    }

    private static function withCountry(string $local): string
    {
        if ($local === '' || str_starts_with($local, '57')) {
            return $local;
        }

        return '57' . $local;
    }

    public static function map(): array
    {
        return array_merge(static::storedMap(), static::$previewOverrides);
    }

    protected static function storedMap(): array
    {
        return Cache::remember('site_settings_map', 120, function () {
            $fromDb = [];
            try {
                if (Schema::hasTable('site_settings')) {
                    $fromDb = static::query()->pluck('value', 'key')->all();
                }
            } catch (\Throwable $e) {
                $fromDb = [];
            }

            return array_merge(static::defaults(), $fromDb);
        });
    }

    public static function getValue(string $key, $default = null)
    {
        $all = static::map();

        if (array_key_exists($key, $all) && $all[$key] !== null && $all[$key] !== '') {
            return $all[$key];
        }

        return $default ?? (static::defaults()[$key] ?? null);
    }

    public static function putMany(array $values): void
    {
        foreach ($values as $key => $value) {
            static::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value === null ? '' : (string) $value]
            );
        }

        Cache::forget('site_settings_map');
    }
}
