<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    protected $table='doencas';
    protected $primaryKey='id';
    protected $fillable=[
        'comum',
        'hereditaria',
        'alergias',
        'contras',
        'hospitalizacao',
        'vacinas',
    ];
}
