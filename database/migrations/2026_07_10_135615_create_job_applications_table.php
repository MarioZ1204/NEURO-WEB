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
        if (!Schema::hasTable('job_applications')) {
            Schema::create('job_applications', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 100);
                $table->string('apellido', 100);
                $table->string('email', 255);
                $table->string('telefono', 20);
                $table->string('profesion', 150);
                $table->string('cargo', 100);
                $table->string('file_path')->nullable();
                $table->longText('mensaje')->nullable();
                $table->enum('status', ['new', 'read', 'in_review', 'responded'])->default('new');
                $table->text('admin_notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
