<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Socialite;
use Meddelivery\Models\User;
use Auth;

class SocialController extends Controller
{
    protected $redirectTo = '/home';

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleuser = Socialite::driver('google')->user();
        
        $user = User::where('provider_id', $googleuser->getId())->first();
        // dd($user);
        if (!$user){
            $user = User :: create([
                'provider_id' => $googleuser->getId(),
                'username' =>$googleuser->getNickname(),
                'name' =>$googleuser->getName(),
                'email' =>$googleuser->getEmail(),
                'image' =>$googleuser->getAvatar(),
                'provider' => 'Google',
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
    
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $gituser = Socialite::driver('github')->user();

        $user = User::where('provider_id', $gituser->getId())->first();
        // dd($gituser);
        if (!$user){
            $user = User :: create([
                'provider_id' => $gituser->getId(),
                'username' =>$gituser->getNickname(),
                'name' =>$gituser->getName(),
                'email' =>$gituser->getEmail(),
                'image' =>$gituser->getAvatar(),
                'provider' => 'GitHub',
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $fbuser = Socialite::driver('facebook')->user();

        $user = User::where('provider_id', $fbuser->getId())->first();
        // dd($gituser);
        if (!$user){
            $user = User :: create([
                'provider_id' => $fbuser->getId(),
                'username' =>$fbuser->getNickname(),
                'name' =>$fbuser->getName(),
                'email' =>$fbuser->getEmail(),
                'image' =>$fbuser->getAvatar(),
                'provider' => 'Facebook',
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
