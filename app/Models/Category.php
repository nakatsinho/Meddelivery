<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categorias';
    protected $primaryKey='id';
    protected $fillable=['nome','menu_id'];
}
