<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class GSanguineo extends Model
{
    protected $table='g_sanguineo';
    protected $primaryKey='id';
    protected $fillable=['nome'];
}
