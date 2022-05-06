<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Shopcart;

use App\Models\Product;
use App\Models\Orderitem;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Order::where('user_id',Auth::id())->get();
        return view('home.user_order',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $total=$request->input('total');
        $datalist=Shopcart::where('user_id',Auth::id())->get();
        return view('home.user_order_add',['total'=>$total,'datalist'=>$datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Order();
        $data->name=$request->input('name');
        $data->address=$request->input('address');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->total=$request->input('total');
        $data->user_id=Auth::id();
        $data->IP="ıp";
        $data->save();
        $datalist=Shopcart::where('user_id',Auth::id())->get();
        foreach ($datalist as $rs) {
            $data2=new Orderitem();
            $data2->user_id=Auth::id();
            $data2->product_id=$rs->product_id;
            $data2->order_id=$data->id;
            $data2->price=$rs->product->price;
            
            $data2->save();
        }
        DB::table('shopcarts')->where('user_id','=',Auth::id())->delete();
        return redirect()->route('user_orders')->with('success','Sipariş Verildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
