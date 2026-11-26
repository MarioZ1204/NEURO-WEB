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
        if (Schema::hasTable('testimonials') && !Schema::hasColumn('testimonials', 'image_url')) {
            Schema::table('testimonials', function (Blueprint $table) {
                $table->string('image_url')->nullable()->after('avatar_url')->comment('URL de imagen del testimonio');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('testimonials') && Schema::hasColumn('testimonials', 'image_url')) {
            Schema::table('testimonials', function (Blueprint $table) {
                $table->dropColumn('image_url');
            });
        }
    }
};
