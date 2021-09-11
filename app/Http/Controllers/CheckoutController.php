<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Meddelivery\Models\Endereco;
use Meddelivery\Models\Pedido;
use Meddelivery\Models\Pais;
use Meddelivery\Models\Provincia;
use Meddelivery\Models\Distrito;
use Meddelivery\Models\Bairro;
use Meddelivery\Models\Pagamento;
use Meddelivery\Models\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
            $cartItems = Cart::content();
            $provincia = Provincia::pluck('nome', 'id');
            $distrito = Distrito::pluck('nome', 'id');
            $bairro = Bairro::pluck('nome', 'id');
            $pais=Pais::pluck('nome', 'id');
            $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
            $fpay = Pagamento::pluck('nome','id');
            return view('carrinho.checkout', compact('cartItems', 'provincia', 'distrito', 'bairro','pais','pro_last','fpay'));
        // } else {
        //     return redirect('login')->with('info','Faça o login primeiro, e volte a tentar o processo...');
        // }
    }

    public function address(Request $request)
    {
        $formInput = $request->except('image');
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            'nomecompleto' => 'required|min:5|max:35',
            'email' => 'required|email',
            'telefone' => 'required|min:9|max:9',
            'pincode' => 'required|max:5',
            'detalhes' => 'required|min:5|max:250',
            'notes' => 'required|min:5|max:250',
        ]);
        $formInput['user_id'] = Auth::user()->id;

        $image = $request->image;

        $imageName = $image->getClientOriginalName();
        $image->move('admin/images', $imageName);
        $formInput['image'] = $imageName;

        Endereco::create($formInput);
        Pedido::createOrder();
        $order = Pedido::latest()->first();
        
        //Cart::destroy();
        return view('perfil.agradecimento',compact('order'));
    }
}
// composer config --global --auth github-oauth.github.com <token>