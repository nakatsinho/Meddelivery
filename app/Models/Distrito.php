<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table='distritos';
    protected $primaryKey='id';
    protected $fillable=['nome','provincia_id'];
}
