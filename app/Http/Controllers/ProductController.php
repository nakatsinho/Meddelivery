<?php

namespace Meddelivery\Http\Controllers;

use Meddelivery\Models\Product;
use Meddelivery\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produtos=Product::all();
        return view('admin.product.index', compact('produtos'));
    }
    public function create()
    {
        $categorias=Category::pluck('nome', 'id');
        return view('admin.product.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $formInput=$request->except('image');
        $this->validate($request,[
            'nome_pro'=>'required',
            'codigo_pro'=>'required',
            'preco_pro'=>'required',
            'info_pro'=>'required',
            'spl_price'=>'required',
            'stock'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('admin/images',$imageName);
            $formInput['image']=$imageName;
        }
        Product::create($formInput);
        return redirect()->back()->with('info', 'Produto adicionado com sucesso!');
    }

    public function similarProduct()
   {
       //get the artist
      $artist = Artist::with('similars')->findOrFail(1);

      $genreIds = $artist->genres->pluck('id')->toArray();

      $similarArtists = Artist::whereHas('similars', function ($query) use ($genreIds) {
          return $query->whereIn('id', $genreIds);
      })->where('id', '!=', $artist->id)
          ->limit(10)
          ->get();

      return $similarArtists;
   }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $deleteData=Product::findOrFail($id);
        $deleteData->delete();
        return redirect()->back();
    }
}
