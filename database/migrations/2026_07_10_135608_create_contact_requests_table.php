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
        if (!Schema::hasTable('contact_requests')) {
            Schema::create('contact_requests', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('email', 255);
                $table->string('phone', 20)->nullable();
                $table->enum('type', ['peticion', 'queja', 'solicitud']);
                $table->string('subject', 255);
                $table->longText('message');
                $table->enum('status', ['new', 'read', 'responded'])->default('new');
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
        Schema::dropIfExists('contact_requests');
    }
};
