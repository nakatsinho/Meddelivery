<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table='pais';
    protected $primaryKey='id';
    protected $fillable=['nome'];
}
