<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Meddelivery\Models\GSanguineo;
use Meddelivery\Models\Bairro;
use Meddelivery\Models\Sexo;
use Meddelivery\Models\Provincia;
use Meddelivery\Models\Pais;
use Meddelivery\Models\User;
use Meddelivery\Models\Product;
use Image;
use Meddelivery\Models\Doenca;
use Meddelivery\Models\Endereco;

class PerfilController extends Controller
{
    public function index()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $user_id=Auth::user()->id;
        $doencas=Doenca::where('user_id',$user_id)->limit(1)->get();
        return view ('perfil.index',compact('doencas','pro_last'));
    }

    public function getProfile($name)
    {
        $user = User::where('name', $name)->first();

        if (!$user)
        {
            abort(404);
        }

        return view ('pesquisa.index')
            ->with('user', $user);
    }

    public function getPhoto()
    {
        $user_id=Auth::user()->id;
        $sexo = Sexo :: pluck ('nome' ,'id');
        $users=User::where('id',$user_id)->limit(1)->get();
        return view('perfil.foto',compact('user_id', 'sexo', 'users'));
    }

    public function postPhoto (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:35',
            'email' => 'required|email|unique:endereco',
            'number' => 'required|min:9|max:9',
        ]);
        
        if ($request->hasFile('image')){
            $imageP = $request->file('image');
            $filename = time() . '.' . $imageP->getClientOriginalExtension();
            Image::make($imageP)->resize(300,300)->save('/admin/images' . $filename);

            $user = Auth::user()->id;
            $user->image = $filename;
            $user->save();
        }
        $user_id=Auth::user()->id;
        $users=User::where('id',$user_id)->limit(1)->get();
        return view('perfil.foto',compact('user_id', 'sexo', 'users'));
    }

    public function orders()
    {
        $user_id=Auth::user()->id;
        $pedido=DB::table('pedido_product')
            ->leftJoin('produtos', 'produtos.id','=','pedido_product.product_id')
            ->leftJoin('pedidos', 'pedidos.id','=','pedido_product.pedido_id')
            ->where('pedidos.user_id','=',$user_id)->get();
        return view ('perfil.pedido', compact('pedido'));
    }

    public function address()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $user_id=Auth::user()->id;
        $provincia = Provincia::pluck('nome', 'id');
        $pais = Pais::pluck('nome', 'id');
        $bairro = Bairro::pluck('nome', 'id');
        $address=Endereco::where('user_id',$user_id)->latest()->limit(1)->get();
        return view ('perfil.endereco', compact('address','provincia', 'pais', 'bairro','pro_last'));
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request,[
            'nomecompleto'=>'required',
            'telefone'=>'required',
            'detalhes'=>'required',
        ]);
        $userid=Auth::user()->id;
        Endereco::where('user_id',$userid)->update($request->except('_token'));
        return back()->with('info', 'Seus dados foram alterados com sucesso!');
    }

    public function dados(Request $request)
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $user_id=Auth::user()->id;
        $gs = GSanguineo :: pluck('nome' ,'id');
        $sexo = Sexo :: pluck ('nome' ,'id');
        $user=User::where('id',$user_id)->limit(1)->get();
        $doencas=Doenca::where('user_id',$user_id)->limit(1)->get();
        return view ('perfil.dados', compact('user','gs', 'sexo','doencas','pro_last'));
    }

    public function updateDados(Request $request)
    {
        $formInput = $request->except('image');
        $formInput2 = $request->except('_token','sexo_id','gsanguineo_id','name','surname','username','email','number','nascimento','tbaixa','profissao','talta','altura');
        $this->validate($request,[
            'name' => 'required|max:30',
            'surname' => 'required|alpha|max:15',
            'username' => 'required|max:25',
            'email' => 'required|email|max:55',
            'number' => 'required|max:9',
            'nascimento' => 'required',
            'altura' => 'required',
            'talta' => 'required',
            'tbaixa' => 'required',
            'profissao' => 'required',
            
        ]);
        $userid=Auth::user()->id;
        User::find($userid)->update($formInput);
        Doenca::where('user_id',$userid)->update($formInput2);
        return redirect()->route('perfil.index')->with('info','Seus dados foram alterados com sucesso!');

        
    }
}
