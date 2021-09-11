<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Meddelivery\Models\User;
use Auth;

class PatientController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();

        return view ('paciente.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }

    public function getAdd($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user)
        {
            return redirect()
                ->route('home')
                ->with('info', 'Nao foi possivel achar esse usuario'); 
        }

        if (Auth::user()->id === $user->id)
        {
            return redirect()->route('home');
        }

        if(Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(Auth::user()))
        {
            return redirect()
                ->route('perfil.index', ['username' => $user->username])
                ->with('info', 'Pedido de amizade existente.');
        }

        if(Auth::user()->isFriendsWith($user)) 
        {
            return redirect()
                ->route('perfil.index', ['username' => $user->username])
                ->with('info', 'Voces ja sao amigos!');
        }
        Auth::user()->addFriend($user);

        return redirect()
                ->route('perfil.index', ['username' => $user->username])
                ->with('info', 'Pedido de amizade enviado!');
    }

    public function getAccept ($username)
    {            
        $user = User::where('username', $username)->first();

        if (!$user)
        {
            return redirect()
                ->route('auth.home')
                ->with('info', 'Nao foi possivel achar esse usuario'); 
        }

        if (!Auth::user()->hasFriendRequestsReceived($user))
        {
            return redirect()->route('auth.home');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
            ->route('perfil.index', ['username' => $username])
            ->with('info', 'Pedido de amizade aceite.');
    }
}
