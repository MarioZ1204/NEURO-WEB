<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'text',
        'rating',
        'avatar_url',
        'image_url',
        'file_path',
        'file_type',
        'file_size',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
        'file_size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Obtener la URL del archivo
     * El archivo en BD está guardado como: testimonials/archivo.pdf
     * Pero realmente está en: storage/app/public/testimonials/archivo.pdf
     * Y se accede vía symlink: public/storage/testimonials/archivo.pdf
     */
    public function getFileUrlAttribute()
    {
        if (!$this->file_path) {
            return null;
        }

        if (str_starts_with($this->file_path, 'http')) {
            return $this->file_path;
        }

        if (str_starts_with($this->file_path, '__preview__/')) {
            return url($this->file_path);
        }

        if ($this->id) {
            return route('testimonial.file', $this->id);
        }

        $path = ltrim($this->file_path, '/');

        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }

    /**
     * Obtener el ícono basado en el tipo de archivo
     */
    public function getFileIconAttribute()
    {
        if (!$this->file_type) {
            return 'fa-file';
        }

        if (strpos($this->file_type, 'image') !== false) {
            return 'fa-image';
        }
        if (strpos($this->file_type, 'pdf') !== false) {
            return 'fa-file-pdf';
        }
        if (strpos($this->file_type, 'word') !== false || strpos($this->file_type, 'document') !== false) {
            return 'fa-file-word';
        }
        if (strpos($this->file_type, 'spreadsheet') !== false || strpos($this->file_type, 'excel') !== false) {
            return 'fa-file-excel';
        }

        return 'fa-file';
    }

    /**
     * Obtener el tamaño del archivo en formato legible
     */
    public function getFileSizeFormattedAttribute()
    {
        if (!$this->file_size) {
            return 'N/A';
        }

        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $i < count($units) && $bytes >= 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
