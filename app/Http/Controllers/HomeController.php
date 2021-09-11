<?php

namespace Meddelivery\Http\Controllers;

use Meddelivery\Models\Product;
use Meddelivery\Models\Desejo;
use Meddelivery\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meddelivery\Models\Category;
use Meddelivery\Models\Farmacia;
use Meddelivery\Models\Marca;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    public function index()
    {
        $produtos = Product::orderBy('created_at', 'desc')->paginate(8);
        $provincia = Provincia::pluck('nome', 'id');
        $pro = Product::pluck('nome_pro', 'id');
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', compact('produtos', 'provincia', 'pro', 'pro_last'));
    }
    public function contact()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('contact', compact('pro_last'));
    }

    public function getDetails()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.productdetails', compact('pro_last'));
    }
    public function verCates($id)
    {
        $categoria_pro = Product::where('category_id', $id)->paginate(15);
        $idC = $id;
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.listcategory', compact('categoria_pro', 'idC', 'pro_last'));
    }
    public function verCatesMenu($id){
        $idC = $id;
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.listcategorymenu', compact('idC', 'pro_last'));
    }
    public function getAllBrands(){
        $marcas = Marca::all();
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.listallmarcas', compact('pro_last','marcas'));
    }
    public function getBrandsId($id){
        $idC = $id;
        $marcas = DB::table('marca')->leftJoin('produtos','marca.id','=','produtos.marca_id')->get();
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.listallmarcas', compact('idC', 'pro_last','marcas'));
    }
    public function getProId($id){
        $idC = $id;
        $marca_pro = Product::where('marca_id', $id)->paginate(15);
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.listaprobrand', compact('idC', 'pro_last','marca_pro'));
    }
    public function verSubCates($id)
    {
        $subcategoria_pro = Product::where('subcategory_id', $id)->paginate(15);
        $idS = $id;
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('partials.listsubcategory', compact('subcategoria_pro', 'idS', 'pro_last'));
    }
    public function verCatesAll()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $categoria_all = Category::orderBy('created_at', 'desc')->paginate(15);
        return view('partials.listallcats', compact('categoria_all', 'pro_last'));
    }
    public function verProductAll()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $products_all = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('partials.listallproducts', compact('products_all', 'pro_last'));
    }
    public function detalheProduto($id)
    {
        $produtos = Product::where('id', $id)->get();
        $idP = $id;
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        // dd($produtos);
        return view('partials.productdetails', compact('produtos', 'idP', 'pro_last'));
    }
    public function getDesejo()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $produtos = Desejo::leftJoin('produtos', 'desejos.pro_id', '=', 'produtos.id')->get();
        if (Auth::check()) {
            return view('partials.desejos', compact('produtos', 'pro_last'));
        } else {
            return redirect('login')->with('info','Faça o login primeiro, e volte a tentar o processo...');
        }
    }

    public function addDesejo(Request $request)
    {
        $desejo = new Desejo();
        $desejo->user_id = Auth::user()->id;
        $desejo->pro_id = $request->pro_id;
        $desejo->save();

        $produtos = DB::table('produtos')->where('id', $request->pro_id)->get();
        return view('partials.productdetails', compact('produtos'));
    }

    public function removeDesejo($id)
    {
        DB::table('desejos')->where('pro_id', '=', $id)->delete();
        return back()->with('info', 'Item removido da lista de desejos!');
    }
    public function admin()
    {
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('contact', compact('pro_last'));
    }

    // public function getFatura()
    // {
    //     return view('fatura');
    // }
}
