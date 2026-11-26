<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('contact_requests')) {
            DB::table('contact_requests')->whereIn('type', ['peticion', 'queja'])->delete();

            $this->toVarchar('contact_requests', 'status', 'new');
            $this->mapLegacyStatus('contact_requests');
        }

        foreach (['job_applications', 'internship_requests', 'convenio_requests'] as $table) {
            if (!Schema::hasTable($table)) {
                continue;
            }
            $this->toVarchar($table, 'status', 'new');
            $this->mapLegacyStatus($table);
        }
    }

    public function down(): void
    {
        // No revertimos el borrado de PQRS.
    }

    private function toVarchar(string $table, string $column, string $default): void
    {
        $defaultSql = DB::getPdo()->quote($default);
        DB::statement("ALTER TABLE `{$table}` MODIFY `{$column}` VARCHAR(20) NOT NULL DEFAULT {$defaultSql}");
    }

    private function mapLegacyStatus(string $table): void
    {
        DB::table($table)->whereIn('status', ['read', 'in_review'])->update(['status' => 'in_progress']);
        DB::table($table)->where('status', 'responded')->update(['status' => 'done']);
    }
};
