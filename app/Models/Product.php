<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='produtos';
    protected $primaryKey='id';
    protected $fillable=['nome_pro','codigo_pro','preco_pro','stock','info_pro','spl_price','image','category_id','farmacia_id'];

    public function getName()
    {
        if ($this->nome_pro &&  $this->info_pro)
        {
            return "{$this->nome_pro} {$this->info_pro}";
        }

        if ($this->nome_pro)
        {
            return $this->nome_pro;
        }

        return null;
    }

    public function getNameOrPrice()
    {
        return $this->getName() ?: $this->preco_pro;
    }

    public function getNameOrCategory()
    {
        return $this->nome_pro ?: $this->category_id;
    }

    // public function getNameOrUsername()
    // {
    //     return $this->getName() ?: $this->username;
    // }
    public function similars()
    {
        return $this->belongsToMany('App\Genre', 'genre_artist');
    }
}
