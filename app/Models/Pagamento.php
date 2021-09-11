<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table='f_pagamento';
    protected $primaryKey='id';
    protected $fillable=['nome','number','nib','user_id'];
}
