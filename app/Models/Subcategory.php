<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table='subcategorias';
    protected $primaryKey='id';
    protected $fillable=['nome','category_id'];
}
