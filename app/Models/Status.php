<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'body'
    ];

    public function user()
    {
        return $this->belongsTo('Meddelivery\Models\User', 'user_id');
    }

     public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany('Meddelivery\Models\Status','parent_id');
    } 

    public function likes()
    {
        return $this->morphMany('Meddelivery\Models\Like','likeable');
    } 
}
