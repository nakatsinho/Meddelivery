<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Detalhes extends Model
{
    protected $table='detalhes';
    protected $primaryKey='id';
    protected $fillable=['validade','fabricante','recomendacao','riscos','sintomas','qty','produto_id'];
}
