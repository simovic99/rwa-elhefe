<?php

namespace App\Http\Controllers;

use App\Product;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();

        return view('cijene',['products'=>$products]);
    }
    public function index2()
    {
       // $products= DB::select('select  product_name,product_desc,price,product_img_name from products');
            $products=Product::sortable()->paginate(30);

        return view('naruci',compact('products'));
    }
    public function index3()
    {


        return view('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1( $request)
    {

          $product=Product::create([
            'price' => $request->price,
            'product_img_name' => $request->product_img_name,
            'product_desc' => $request->product_desc,
    ]);
          return $product;

}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
    public function store(Request $request)
{
      $product=  $this->create1($request);
        return view('cijene');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $price= $request->input('price');
        $id=$request->input('id');

//$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);
//DB::table('student')->update($data);
// DB::table('student')->whereIn('id', $id)->update($request->all());
        DB::update('update products set price =? where id = ? ',[$price,$id]);

        return $this->index();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
