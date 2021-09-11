<?php

namespace Meddelivery\Http\Controllers;

use Meddelivery\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::all();
        return view('admin.category.index', compact('categorias'));
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome'=>'required'
        ]);
        Category::create($request->all());
        return back();
    }


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
        $deleteData=Category::findOrFail($id);
        $deleteData->delete();
        return redirect()->back();
    }
}
