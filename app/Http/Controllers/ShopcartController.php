<?php

namespace App\Http\Controllers;

use App\Models\Shopcart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ShopcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Shopcart::where('user_id',Auth::id())->get();
        return view('home.user_shopcart',['datalist'=>$datalist]); 
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
    public function store(Request $request,$id)
    {
        $check=Shopcart::where('product_id',$id)->where('user_id',Auth::id())->first();
        $auth=Product::find($id);
        if(Auth::id()==$auth->user_id){
            return redirect()->back()->with('alert', 'Bu Ürün Zaten Sizin');
        }
        else{
                if($check!=null){
                        return redirect()->back()->with('alert', 'Bu Ürün Zaten Sepetinizde');
                        }
                else
                    {
                        $data=new Shopcart();
                        $data->product_id=$id;
                        $data->user_id=Auth::id();
                        $data->save();
                    }
             }

        
        return redirect()->back()->with('alert', 'Ürün Sepetinize Eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function show(Shopcart $shopcart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopcart $shopcart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopcart $shopcart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopcart $shopcart,$id)
    {
        DB::table('shopcarts')->where('id','=',$id)->delete();
        return redirect()->route('user_shopcart');
    }
}
