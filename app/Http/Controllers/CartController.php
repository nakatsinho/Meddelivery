<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Meddelivery\Models\Product;
use Meddelivery\Models\Pais;
use Meddelivery\Models\Pagamento;

class CartController extends Controller
{
    public function index()
    {
        $carrinhoItems=Cart::content();
        $paises=Pais::all();
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $fpay = Pagamento::all();
        //dd($carrinhoItems);
        return view('carrinho.index', compact('carrinhoItems','paises','pro_last','fpay'));
    
    }
    public function addItem($id)
    {
        $produto=Product::findOrFail($id);
        Cart::add($id, $produto->nome_pro,1,$produto->preco_pro,['img'=>$produto->image,'stock'=>$produto->stock]);
        return back();
    }

    public function update(Request $request, $id)
    {
        $qty=$request->qty;
        $proID=$request->proId;
        $produto=Product::findOrFail($proID);
        $stock=$produto->stock;

        if($qty<$stock)
        {
            Cart::update($id, $request->qty);
            return back()->with('status', 'Carrinho actualizado com sucesso!');
        }
        else{
            return back()->with('error','Porfavor, verifique se a sua quantidade não é maior que o produto existente!');
        }
    }

    public function destroy ($id)
    {
        Cart::remove($id);
        return back();
    }
}
