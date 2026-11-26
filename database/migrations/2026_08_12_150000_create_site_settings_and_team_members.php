<?php

use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->timestamps();
            });
        }

        foreach (SiteSetting::defaults() as $key => $value) {
            SiteSetting::query()->firstOrCreate(['key' => $key], ['value' => $value]);
        }

        if (!Schema::hasTable('team_members')) {
            Schema::create('team_members', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('initials', 8)->nullable();
                $table->string('specialty')->nullable();
                $table->string('experience')->nullable();
                $table->text('bio')->nullable();
                $table->string('photo_path')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (TeamMember::query()->count() === 0) {
            foreach (TeamMember::seedData() as $row) {
                TeamMember::query()->create($row);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('site_settings');
    }
};
