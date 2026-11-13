<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'rtn',
        'empresa',
        'categoria',
        'limite_credito',
        'dias_credito',
        'estado'
    ];
}