<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('banners') || !Schema::hasColumn('banners', 'title')) {
            return;
        }

        // Evita depender de doctrine/dbal en Hostinger
        DB::statement('ALTER TABLE `banners` MODIFY `title` VARCHAR(255) NULL');
    }

    public function down(): void
    {
        if (!Schema::hasTable('banners') || !Schema::hasColumn('banners', 'title')) {
            return;
        }

        DB::statement('ALTER TABLE `banners` MODIFY `title` VARCHAR(255) NOT NULL');
    }
};
