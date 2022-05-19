<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'category' => 'required',
            'name' => 'required',
            'size' => 'required',
            'color' => 'required',
            'price' => 'required',
            ]);

            $product = new Product;
            $product->brand = $request->brand;
            $product->category = $request->category;
            $product->name = $request->name;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->price = $request->price;
            $product->save();
            
            return redirect()->route('products.index')->with('Success','Product has been created successfully.');
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
        $product = Product::find($id);
        return view('products.edit', compact('product'));
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
        $request->validate([
            'brand' => 'required',
            'category' => 'required',
            'name' => 'required',
            'size' => 'required',
            'color' => 'required',
            'price' => 'required',
            ]);

            $product = Product::find($id);
            $product->brand = $request->brand;
            $product->category = $request->category;
            $product->name = $request->name;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->price = $request->price;
            $product->save();
            
            return redirect()->route('products.index')->with('Success','Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('Success','Product has been deleted successfully');
    }

    public function main(Request $request)
    {
        return Product::filter($request)->get();
    }

    public function filter_by_category(Request $request)
    {
        return Product::filter($request)->get();
    }

}
