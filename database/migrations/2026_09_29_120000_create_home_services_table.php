<?php

use App\Models\HomeService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('home_services')) {
            Schema::create('home_services', function (Blueprint $table) {
                $table->id();
                $table->string('section', 30)->index();
                $table->string('title', 150);
                $table->text('description')->nullable();
                $table->string('link', 255)->nullable();
                $table->string('image_asset', 255)->nullable();
                $table->string('image_path', 255)->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (HomeService::query()->count() === 0) {
            foreach (HomeService::seedData() as $row) {
                HomeService::query()->create($row);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('home_services');
    }
};
