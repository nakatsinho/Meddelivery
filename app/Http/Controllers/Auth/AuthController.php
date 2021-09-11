<?php

namespace Meddelivery\Http\Controllers\Auth;

use Auth;
use Meddelivery\Models\User;
use Meddelivery\Models\Provincia;
use Meddelivery\Models\Distrito;
use Meddelivery\Models\Bairro;
use Meddelivery\Models\Pais;
use Meddelivery\Models\Farmacia;
use Illuminate\Http\Request;
use Meddelivery\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RegistersUsers;


class AuthController extends Controller
{
    use RegistersUsers;


    public function getSignup()
    {
        return view('auth.register');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'surname' => 'required|alpha|max:15',
            'username' => 'required|max:25',
            'email' => 'required|email|max:55|unique:users',
            'password' => 'required|min:6|confirmed',
            'number' => 'required|max:50',

        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'number' => $request->input('number'),
        ]);

        $this->guard()->login($user);

        return redirect()->route('home')->withSuccess('Sua conta de usuário foi criada com sucesso! Pode comprar agora...');
        //dd('All field are filled');
    }

    public function getSignin()
    {
        return view('auth.login');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            //return redirect()->back()->with('info', 'Os teus dados nao foram reconhecidos! Preencha correctamente as credenciais de acesso.');
            return redirect()->back()->withFail('Os teus dados não foram reconhecidos! Preencha correctamente as credenciais de acesso.');
        }

        return redirect()->route('home')->withSuccess('Você entrou no sistema!');
    }

    public function getSignout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }

    // Controladores do Admin

    public function getAdmin()
    {
        return view('admin.index');
    }
    use ThrottlesLogins;
}
