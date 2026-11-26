<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('testimonials')) {
            Schema::table('testimonials', function (Blueprint $table) {
                if (!Schema::hasColumn('testimonials', 'file_path')) {
                    $table->string('file_path')->nullable()->after('image_url')->comment('Ruta del archivo (PDF, imagen, documento)');
                }
                if (!Schema::hasColumn('testimonials', 'file_type')) {
                    $table->string('file_type')->nullable()->after('file_path')->comment('Tipo de archivo');
                }
                if (!Schema::hasColumn('testimonials', 'file_size')) {
                    $table->bigInteger('file_size')->nullable()->after('file_type')->comment('Tamaño del archivo en bytes');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('testimonials')) {
            Schema::table('testimonials', function (Blueprint $table) {
                $dropColumns = [];
                if (Schema::hasColumn('testimonials', 'file_path')) {
                    $dropColumns[] = 'file_path';
                }
                if (Schema::hasColumn('testimonials', 'file_type')) {
                    $dropColumns[] = 'file_type';
                }
                if (Schema::hasColumn('testimonials', 'file_size')) {
                    $dropColumns[] = 'file_size';
                }
                if (!empty($dropColumns)) {
                    $table->dropColumn($dropColumns);
                }
            });
        }
    }
};
