<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "likeable";

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('Meddelivery\Models\User', 'user_id');
    }
}
