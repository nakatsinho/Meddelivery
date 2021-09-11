<?php

namespace Meddelivery\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Meddelivery\Models\User;
use Meddelivery\Models\Product;
use Meddelivery\Models\Marca;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('queryUsers');

        if (!$query) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(name, ' ', number)"), 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        /**dd($users);*/

        return view('pesquisa.result')->with('users', $users);
    }
    public function getResultsProduct(Request $request)
    {
        $query = $request->input('queryPro');

        if (!$query) {
            return redirect()->route('home')->with('info','Introduza uma chave de pesquisa!');
        }

        $products = Product::where(DB::raw("CONCAT(nome_pro, ' ',preco_pro)"), 'LIKE', "%{$query}%")
            ->orWhere('info_pro', 'LIKE', "%{$query}%")
            ->get();
        $marcas = Marca::Where('nome', 'LIKE', "%{$query}%")
            ->get();
        //dd($products,$marcas);

        return view('pesquisa.result',compact('products', 'marcas'));
    }
}
