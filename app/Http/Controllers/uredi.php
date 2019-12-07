<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class uredi extends Controller
{

    public function index()
    {
        $products = DB::select('select product_name,product_desc,price,product_img_name from products');
        return view('cijene', ['products' => $products]);


    }

    public function update(ProductRequest $request, Product $product)
    {

        $product->price = $request->price;

        $product->save();
        $product->categories()->sync($request->category);

        return redirect()->route('cijene');
    }
    public function show($id)
    {
        //
        $products = DB::select('select * from products where id = ?',[$id]);
        return view('uredi1',['products'=>$products]);
    }
}
