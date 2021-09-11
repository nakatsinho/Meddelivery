<?php

namespace Meddelivery\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Meddelivery\Models\Pedido;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'username', 
        'email',
        'number', 
        'password',
        'admin', 
        'provider', 
        'provider_id',
        'altura',
        'sexo_id',
        'gsanguineo_id',
        'talta',
        'tbaixa',
        'nascimento',
        'profissao',
        'image',
        'pais_id',
        'provincia_id',
        'user_group_id',
        'farmacia_id',
        
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }
    public function gsanguineo()
    {
        return $this->belongsTo(GSanguineo::class);
    }
    public function isAdmin(){
        return $this->admin;
    }

    public function orders()
    {
        return $this->hasMany(Pedido::class,'user_id','id');
    }
    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }
    public function getName()
    {
        if ($this->name &&  $this->email)
        {
            return "{$this->name} {$this->email}";
        }

        if ($this->name)
        {
            return $this->name;
        }

        return null;
    }

    public function getNameOrContact()
    {
        return $this->getName() ?: $this->number;
    }

    public function getFirstNameOrUsername()
    {
        return $this->name ?: $this->contact;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function statuses()
    {
        return $this->hasMany('Meddelivery\Models\Status', 'user_id');
    }

    public function likes()
    {
        return $this->hasMany('Meddelivery\Models\Like', 'user_id');
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('Meddelivery\Models\User', 'friends', 'user_id', 'friend_id');
    }
    public function friendOf()
    {
        return $this->belongsToMany('Meddelivery\Models\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted',true)->get()->
            merge($this->friendOf()->wherePivot('accepted',true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestsPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestsReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
            'accepted' => true,
        ]);
    }
    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }

    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }

    public function like()
    {
        return $this->morphMany('Meddelivery\Models\Like','likeable');
    }

    public function hasLikedStatus (Status $status)
    {
        return (bool) $status->likes->where('user_id', $this->id)->count();
        /* $status->likes
            ->where('likeable_id', $status->id)
            ->where('likeable_type', get_class($status))
            ->where('user_id', $this->id)
            ->count(); */
    }
}
