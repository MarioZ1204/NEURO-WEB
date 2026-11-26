<?php

namespace App\Support;

class AdminStatus
{
    public const OPTIONS = [
        'new' => 'Nuevo',
        'in_progress' => 'En gestión',
        'done' => 'Atendido',
        'discarded' => 'Descartado',
    ];

    public static function label(?string $status): string
    {
        $map = self::OPTIONS + [
            'read' => 'En gestión',
            'in_review' => 'En gestión',
            'responded' => 'Atendido',
        ];

        return $map[$status ?? 'new'] ?? ($status ?: 'Nuevo');
    }

    public static function pill(?string $status): string
    {
        if (in_array($status, ['in_progress', 'read', 'in_review'], true)) {
            return 'is-progress';
        }
        if (in_array($status, ['done', 'responded'], true)) {
            return 'is-done';
        }
        if ($status === 'discarded') {
            return 'is-discarded';
        }
        return 'is-new';
    }
}
