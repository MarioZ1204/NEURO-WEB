<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'profesion',
        'cargo',
        'file_path',
        'mensaje',
        'status',
        'admin_notes',
    ];
}
