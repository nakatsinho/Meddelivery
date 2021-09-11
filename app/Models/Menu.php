<?php

namespace Meddelivery;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menus';
    protected $primaryKey='id';
    protected $fillable=['nome'];
}
