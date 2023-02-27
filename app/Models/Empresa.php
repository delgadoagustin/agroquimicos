<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'nombre',
        'cuit',
        'domicilio_empresa',
        'telefono_empresa',
        'titular',
        'dni_titular',
        'asesor',
        'matricula',
        'domicilio_asesor',
        'dni_asesor',
        'telefono_asesor',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
