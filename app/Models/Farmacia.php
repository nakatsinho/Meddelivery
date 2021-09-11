<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    protected $table='farmacias';
    protected $primaryKey='id';
    protected $fillable=[
        'nome',
        'titular',
        'nuit',
        'emaill',
        'location',
        'numero',
        'imagem',
        'descricao',
        'quarteirao',
        'pais_id',
        'provincia_id',
        'bairro_id',
        'user_id',
        'image_empresa',
        'video_link'
    ];
}
