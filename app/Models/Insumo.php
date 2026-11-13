<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';

    protected $fillable = [
        'sku',
        'nombre',
        'categoria',
        'precio',
        'costo',
        'stock',
        'imagen',
        'fabricante',
        'fecha_vencimiento'
    ];
}
