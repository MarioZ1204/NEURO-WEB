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
        if (!Schema::hasTable('media')) {
            Schema::create('media', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('file_path');
                $table->string('file_type')->comment('imagen, pdf, documento, etc');
                $table->string('mime_type');
                $table->bigInteger('file_size');
                $table->string('category')->comment('banner, testimonio, documento, etc');
                $table->string('section')->nullable()->comment('Sección donde se usa: hero, testimonios, about, etc');
                $table->text('description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
