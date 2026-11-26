<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('site_settings')) {
            return;
        }

        $updates = [
            'phone_fixed' => '3236822233',
            'phone_fixed_display' => '323 682 2233',
            'wa1_label' => 'Especialidades',
            'wa2_label' => 'Servicios complementarios',
            'address' => 'Carrera 34 #13-80 con Calle 14 #33-15, Pasto, Barrio San Ignacio',
        ];

        foreach ($updates as $key => $value) {
            $exists = DB::table('site_settings')->where('key', $key)->exists();
            if ($exists) {
                DB::table('site_settings')->where('key', $key)->update([
                    'value' => $value,
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('site_settings')->insert([
                    'key' => $key,
                    'value' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        Cache::forget('site_settings_map');
    }

    public function down(): void
    {
        // no-op: valores comerciales no se revierten automáticamente
    }
};
