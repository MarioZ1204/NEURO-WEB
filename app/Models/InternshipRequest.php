<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipRequest extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'universidad',
        'programa',
        'semestre',
        'area',
        'file_path',
        'status',
        'admin_notes',
    ];
}
