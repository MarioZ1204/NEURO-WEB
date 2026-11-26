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

        $nueva = 'Carrera 34 #13-80 con Calle 14 #33-15, Pasto, Barrio San Ignacio';

        $exists = DB::table('site_settings')->where('key', 'address')->exists();

        if ($exists) {
            DB::table('site_settings')->where('key', 'address')->update([
                'value' => $nueva,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('site_settings')->insert([
                'key' => 'address',
                'value' => $nueva,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Cache::forget('site_settings_map');
    }

    public function down(): void
    {
        if (!Schema::hasTable('site_settings')) {
            return;
        }

        DB::table('site_settings')->where('key', 'address')->update([
            'value' => 'Calle 14A #34-13. Barrio San Ignacio. Pasto.',
            'updated_at' => now(),
        ]);

        Cache::forget('site_settings_map');
    }
};
