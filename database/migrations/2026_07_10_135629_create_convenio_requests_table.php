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
        if (!Schema::hasTable('convenio_requests')) {
            Schema::create('convenio_requests', function (Blueprint $table) {
                $table->id();
                $table->string('institucion', 200);
                $table->string('tipo', 100);
                $table->string('representante', 150);
                $table->string('cargo', 100);
                $table->string('email', 255);
                $table->string('telefono', 20);
                $table->longText('objetivo');
                $table->string('file_path')->nullable();
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
        Schema::dropIfExists('convenio_requests');
    }
};
