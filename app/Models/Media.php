<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_path',
        'file_type',
        'mime_type',
        'file_size',
        'category',
        'section',
        'description',
        'is_active',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getFileIconAttribute()
    {
        $icons = [
            'pdf' => 'fa-file-pdf',
            'image' => 'fa-image',
            'documento' => 'fa-file-word',
            'video' => 'fa-video',
            'audio' => 'fa-volume-up',
        ];

        return $icons[$this->file_type] ?? 'fa-file';
    }

    public function getFileSizeFormattedAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
