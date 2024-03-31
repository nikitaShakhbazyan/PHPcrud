<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        return view('products.index',['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
           'name' => 'required',
           'qty' => 'required|numeric', 
           'price' => 'required|decimal:0,10', 
           'description'=>'nullable'

        ]);

        $newProduct = Products::create($data);
        return redirect(route('products.index'));
    }
    public function edit (Products $product) {
        return view('products.edit',['product' => $product]);
    }
    public function update(Products $product,Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric', 
            'price' => 'required|decimal:0,10', 
            'description'=>'nullable'
 
         ]);

         $product->update($data);
    return redirect(route('products.index'))->with("success", "Product updated successfully!");
    }
}
