<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvenioRequest extends Model
{
    protected $fillable = [
        'institucion',
        'tipo',
        'representante',
        'cargo',
        'email',
        'telefono',
        'objetivo',
        'file_path',
        'status',
        'admin_notes',
    ];
}
