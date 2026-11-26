<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'initials',
        'specialty',
        'experience',
        'bio',
        'photo_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function photoUrl(): ?string
    {
        if ($this->photo_path && str_starts_with($this->photo_path, '__preview__/')) {
            return url($this->photo_path);
        }
        if (!$this->photo_path || !$this->id) {
            return null;
        }

        return route('team.photo', $this->id);
    }

    public static function published()
    {
        try {
            if (!Schema::hasTable('team_members')) {
                return static::fallback();
            }

            $rows = static::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            return $rows->isEmpty() ? static::fallback() : $rows;
        } catch (\Throwable $e) {
            return static::fallback();
        }
    }

    public static function fallback()
    {
        return collect(static::seedData())->map(function (array $row) {
            return new static($row);
        });
    }

    public static function seedData(): array
    {
        return [
            ['name' => 'Dr. José A. Zambrano A.', 'initials' => 'JZ', 'specialty' => 'Neurólogo clínico · Medicina del sueño', 'experience' => '+18 años de experiencia', 'bio' => 'Miembro de la Junta Directiva de la Seccional Sur Occidente de la Asociación Colombiana de Medicina del Sueño.', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Dr. José A. Zambrano León', 'initials' => 'JZL', 'specialty' => 'Neurólogo · Epileptólogo', 'experience' => '+9 años de experiencia', 'bio' => 'Especialista en neurología y epileptología.', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Dra. María A. León R.', 'initials' => 'ML', 'specialty' => 'Medicina general', 'experience' => 'Médica · Medicina general', 'bio' => 'Atención de primer nivel y acompañamiento integral al paciente.', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Dra. Diana Bravo', 'initials' => 'DB', 'specialty' => 'Neuróloga · Epileptóloga', 'experience' => '+8 años de experiencia', 'bio' => 'Especialista en neurología y epileptología.', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'Dra. Adriana Gelpud', 'initials' => 'AG', 'specialty' => 'Fisioterapeuta', 'experience' => '+2 años de experiencia', 'bio' => 'Terapia física y neurorrehabilitación.', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Dra. Angela Legarda', 'initials' => 'AL', 'specialty' => 'Fisioterapeuta', 'experience' => '+2 años de experiencia', 'bio' => 'Terapia física y neurorrehabilitación.', 'sort_order' => 6, 'is_active' => true],
            ['name' => 'Dra. Karen Chamorro', 'initials' => 'KCH', 'specialty' => 'Fisioterapeuta', 'experience' => '+2 años de experiencia', 'bio' => 'Terapia física y neurorrehabilitación.', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'Dr. Sebastian G. Lagos', 'initials' => 'SL', 'specialty' => 'Psicólogo', 'experience' => 'Psicólogo · Psicología', 'bio' => 'Atención psicológica clínica.', 'sort_order' => 8, 'is_active' => true],
            ['name' => 'Dra. Nathalia Portilla', 'initials' => 'NP', 'specialty' => 'Neuropsicóloga', 'experience' => 'Neuropsicóloga · Neuropsicología', 'bio' => 'Evaluación y rehabilitación neuropsicológica.', 'sort_order' => 9, 'is_active' => true],
            ['name' => 'Dra. Deysi Mora', 'initials' => 'DM', 'specialty' => 'Neuropsicóloga', 'experience' => 'Neuropsicóloga · Neuropsicología', 'bio' => 'Evaluación y rehabilitación neuropsicológica.', 'sort_order' => 10, 'is_active' => true],
            ['name' => 'Dra. Ana Ximena Murillo', 'initials' => 'AM', 'specialty' => 'Psiquiatra', 'experience' => 'Psiquiatra · Psiquiatría', 'bio' => 'Atención en salud mental y psiquiatría.', 'sort_order' => 11, 'is_active' => true],
        ];
    }
}
