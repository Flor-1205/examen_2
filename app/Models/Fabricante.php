<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = 'fabricantes';

    protected $fillable = [
        'rtn',
        'empresa',
        'categoria',
        'limite_credito',
        'dias_credito',
        'estado'
    ];
}