<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'link',
        'button_text',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function imageUrl(): ?string
    {
        if (!$this->image_path) {
            return null;
        }

        $path = ltrim(str_replace('\\', '/', $this->image_path), '/');

        if (function_exists('public_storage_url')) {
            return public_storage_url($path);
        }

        return url('/archivos-publicos/' . $path);
    }
}
