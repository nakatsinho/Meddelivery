<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table='sexo';
    protected $primaryKey='id';
    protected $fillable=['nome'];
}
