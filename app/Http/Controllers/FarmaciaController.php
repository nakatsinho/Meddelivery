<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Meddelivery\Models\Provincia;
use Meddelivery\Models\Distrito;
use Meddelivery\Models\Bairro;
use Meddelivery\Models\Pais;
use Meddelivery\Models\Farmacia;
use Meddelivery\Models\User;

class FarmaciaController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $provincia = Provincia::pluck('nome', 'id');
        $distrito = Distrito::pluck('nome', 'id');
        $bairro = Bairro::pluck('nome', 'id');
        $pais = Pais::pluck('nome', 'id');
        return view('auth.registerAd', compact('provincia', 'distrito', 'bairro'));
    }

    public function create()
    {
        //???
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image', 'image_empresa', 'imagem');
        $this->validate($request, [
            // 'name' => 'required|string|max:30',
            // 'surname' => 'required|string|max:15',
            // 'username' => 'required|string|max:25',
            // 'email' => 'required|email|max:55|unique:users',
            // 'emaill' => 'required|email|max:55',
            // 'password' => 'required|min:6|confirmed',
            // 'nome' => 'required|string|max:30',
            // 'titular' => 'required|max:25',
            // 'nuit' => 'required|max:55',
            // 'location' => 'required|max:25',
            // 'number' => 'required|max:50',
            // 'numero' => 'required|max:50',
            // 'descricao' => 'required|max:3000',
            // 'quarteirao' => 'required|min:2',
            // 'image' => 'image|mimes:png,jpg,jpeg|max:10000',
            // 'imagem' => 'image|mimes:png,jpg,jpeg|max:10000',
            // 'image_empresa' => 'image|mimes:png,jpg,jpeg|max:10000',
            // 'video_link' => 'required|max:50',

        ]);

        $image = $request->imagem;
        $image1 = $request->image;
        $image2 = $request->image_empresa;

        $imageName1 = $image1->getClientOriginalName();
        $image1->move('admin/images', $imageName1);
        $formInput['image'] = $imageName1;

        $formInput['password'] = Hash::make($request->password);
        $formInput['pais_id'] = 1;
        $user = User::create($formInput);

        $this->guard()->login($user);

        $imageName2 = $image2->getClientOriginalName();
        $image2->move('admin/images', $imageName2);
        $formInput['image_empresa'] = $imageName2;

        $imageName = $image->getClientOriginalName();
        $image->move('admin/images', $imageName);
        $formInput['imagem'] = $imageName;

        $formInput['user_id'] = Auth::user()->id;
        $formInput['pais_id'] = 1;
        $farm = Farmacia::create($formInput);
        User::findOrFail($user->id)->update([
            'farmacia_id' => $farm->id,
        ]);

        Mail::send('auth.newuser', [
            'head' => 'Confirmação de Cadastro',
            'user' => Auth::user()->name,
            'surname' => Auth::user()->surname,
            'email' => Auth::user()->email,
            'emaill' => $farm->emaill,
            'number' => Auth::user()->number,
            'number2' => $farm->numero,
            'farm' => $farm->nome,
            'titular' => $farm->titular,
            'local' => $farm->location,
            'nuit' => $farm->nuit,
            'desc' => $farm->descricao,
            'date' => Auth::user()->created_at,
        ], function ($body) {
            $body->from('rentfood@gmail.com', 'MEDDELIVERY, LDA');
            $body->to(Auth::user()->email);
            $body->cc('nakatsinho@gmail.com', 'Meddelivery Admin');
            $body->replyTo('support@meddelivery.co.mz');
            $body->subject('Account Success Register Confirmation');
        });

        // dd($formInput, $user, $farm,$up);
        return redirect()->route('auth.wait')->with('info', 'Sua conta de administrador foi criada com sucesso! Aguarde pela aprovaçao...');
        //dd('All field are filled');
    }

    public function wait()
    {
        return view('auth.wait');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
