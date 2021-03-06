<?php
namespace App\Http\Controllers;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = auth()->user()->orders; // n + 1 issues
        $orders = auth()->user()->orders()->sortable(['created_at'=>'desc'])->with('products')->get(); // fix n + 1 issues
        return view('my-orders')->with('orders', $orders);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }
        $products = $order->products;
        return view('my-order')->with([
            'order' => $order,
            'products' => $products,
        ]);
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
    public function admin()
    {
        $orders =Order::sortable(['created_at'=>'desc'])->paginate(30);; // fix n + 1 issues
        return view('all-orders')->with('orders', $orders);


    }
    public function adminshow(Order $order)
    {

        $products = $order->products;
        return view('all-order')->with([
            'order' => $order,
            'products' => $products,
        ]);
    }
    public function potvrda(Request $request){

       // $x=$request->input('potvrda');
     //   $id=$request->input('id');
     //   DB::update('update orders set status=? where id = ? ',[$x,$id]);
       $order= Order::find($request->id);
       $order->status=$request->status;
       $order->save();

    return $this->admin();




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
