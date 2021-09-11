<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table='provincia';
    protected $primaryKey='id';
    protected $fillable=['nome','pais_id'];
}
