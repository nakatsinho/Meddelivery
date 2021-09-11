<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $fillable =[
        'user_id',
        'title',
        'description',
        'file',
        'pedido_id',
    ];
}
