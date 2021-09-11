<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Endereco extends Model
{
    protected $table='endereco';
    protected $id='id';
    protected $fillable=[
        'nomecompleto',
        'email',
        'telefone',
        'pincode',
        'detalhes',
        'user_id',
        'provincia_id',
        'pais_id',
        'bairro_id',
        'id_pagamento',
        'image',
        'notes',
    ];
}
