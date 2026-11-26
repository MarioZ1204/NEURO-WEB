<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class HomeService extends Model
{
    protected $fillable = [
        'section',
        'title',
        'description',
        'link',
        'image_asset',
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function sections(): array
    {
        return [
            'consulta' => 'Consulta especializada',
            'diagnostico' => 'Ayudas diagnósticas',
            'complementario' => 'Servicios complementarios',
        ];
    }

    public function sectionLabel(): string
    {
        return static::sections()[$this->section] ?? $this->section;
    }

    public function imageUrl(): ?string
    {
        if ($this->image_path) {
            return public_storage_url($this->image_path);
        }

        return $this->image_asset ? asset($this->image_asset) : null;
    }

    public function linkUrl(): string
    {
        $link = trim((string) $this->link);
        if ($link === '') {
            return url('/');
        }
        if (preg_match('#^(https?:)?//#i', $link) || str_starts_with($link, '#')) {
            return $link;
        }

        return url($link);
    }

    /**
     * Tarjetas visibles agrupadas por sección, en el orden de sections().
     */
    public static function publishedBySection(): array
    {
        return static::groupRows(static::publishedRows());
    }

    public static function groupRows(Collection $rows): array
    {
        $rows = $rows->sortBy([['sort_order', 'asc'], ['id', 'asc']])->values();

        $grouped = [];
        foreach (array_keys(static::sections()) as $key) {
            $grouped[$key] = $rows->where('section', $key)->values();
        }

        return $grouped;
    }

    public static function publishedRows(): Collection
    {
        $rows = null;
        try {
            if (Schema::hasTable('home_services')) {
                $rows = static::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->get();
                if (static::query()->count() === 0) {
                    $rows = null;
                }
            }
        } catch (\Throwable $e) {
            $rows = null;
        }

        if ($rows === null) {
            $rows = collect(static::seedData())->map(fn (array $row) => new static($row));
        }

        return $rows;
    }

    public static function seedData(): array
    {
        $rows = [
            ['consulta', 'Neurología', 'Consulta con el especialista de neurología. Diagnóstico y tratamiento personalizado de enfermedades del sistema nervioso.', '/consulta/neurologia', 'assets/img/consulta-neurologia.png'],
            ['consulta', 'Epileptología', 'Evaluación y manejo de epilepsia, crisis recurrentes y eventos súbitos con protocolos diagnósticos especializados.', '/consulta/epileptologia', 'assets/img/consulta-epileptologia.jpg'],
            ['consulta', 'Somnología', 'Dormir mejor con la ciencia de su lado. Diagnóstico integral de trastornos del sueño.', '/servicios/clinica-del-sueno', 'assets/img/PSG2.png'],
            ['consulta', 'Oftalmología', 'Evaluación y manejo de la salud visual con enfoque clínico especializado.', '/consulta/oftalmologia', 'assets/img/consulta-oftalmologia.jpg'],
            ['consulta', 'Oftalmología Pediátrica', 'Atención visual especializada para niños y adolescentes.', '/consulta/oftalmologia-pediatrica', 'assets/img/consulta-oftalmologia-pediatrica.jpg'],
            ['consulta', 'Terapia Física', 'Rehabilitación funcional personalizada para recuperar movilidad, fuerza y autonomía.', '/consulta/terapia-fisica', 'assets/img/hero-terapias.png'],
            ['consulta', 'Terapia Ocupacional', 'Recuperación de autonomía en actividades cotidianas y participación funcional.', '/consulta/terapia-ocupacional', 'assets/img/terapia-ocupacional.jpg'],
            ['consulta', 'Fonoaudiología', 'Intervención en lenguaje, deglución y comunicación para mejorar su calidad de vida.', '/consulta/fonoaudiologia', 'assets/img/fonoaudiologia.png'],
            ['diagnostico', 'Polisomnografía', 'Dormir bien mejora su calidad de vida; descubra si lo está haciendo bien. Estudio del sueño nocturno.', '/servicios/clinica-del-sueno', 'assets/img/PSG1.png'],
            ['diagnostico', 'VTM', 'Mantenga la epilepsia a raya. Videotelemetría EEG para caracterizar crisis y correlacionar eventos clínicos.', '/servicios/electrodiagnosticos', 'assets/img/VTM.png'],
            ['diagnostico', 'Electroencefalograma', 'Apoyo tecnológico y asistencial al diagnóstico del paciente. EEG digital de alta precisión.', '/servicios/electrodiagnosticos', 'assets/img/EEG.png'],
            ['complementario', 'Psicología', 'Atención psicológica para la gestión emocional, reducción de ansiedad y acompañamiento neurológico.', '/consulta/psicologia', 'assets/img/consulta-psicologia.png'],
            ['complementario', 'Neuropsicología', 'Evaluación y rehabilitación cognitiva de memoria, atención y funciones ejecutivas.', '/consulta/neuropsicologia', 'assets/img/consulta-neuropsicologia.png'],
            ['complementario', 'Unidad de Fonoaudiología', 'Unidad especializada en lenguaje, habla, voz y deglución.', '/consulta/fonoaudiologia', 'assets/img/fonoaudiologia.png'],
            ['complementario', 'Unidad de Terapia Ocupacional', 'Unidad para recuperar autonomía y participación en la vida diaria.', '/consulta/terapia-ocupacional', 'assets/img/terapia-ocupacional.jpg'],
            ['complementario', 'Tracción Digital', 'Terapia avanzada de tracción para aliviar presión vertebral y mejorar la alineación.', '/servicios/tipos-terapia', 'assets/img/terapia-traccion.png'],
            ['complementario', 'Ondas de Choque', 'Tratamiento no invasivo para aliviar el dolor musculoesquelético.', '/servicios/tipos-terapia', 'assets/img/terapia-ondas.png'],
        ];

        $out = [];
        foreach ($rows as $i => [$section, $title, $description, $link, $asset]) {
            $out[] = [
                'section' => $section,
                'title' => $title,
                'description' => $description,
                'link' => $link,
                'image_asset' => $asset,
                'sort_order' => ($i + 1) * 10,
                'is_active' => true,
            ];
        }

        return $out;
    }
}
