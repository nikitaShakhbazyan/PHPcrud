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
}
