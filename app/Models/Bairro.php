<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table='bairro';
    protected $primaryKey='id';
    protected $fillable=['nome','distrito_id'];
}
