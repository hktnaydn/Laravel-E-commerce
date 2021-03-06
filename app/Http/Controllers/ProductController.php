<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Product::all();
        return view('home.user_product',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist=Category::with('children')->get();
        return view('home.user_product_add', ['datalist' => $datalist]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $data=new Product();
            $data->category_id=$request->input('category_id');
            $data->user_id=Auth::id();
            $data->detail=$request->input('detail');
            $data->price=$request->input('price');
            $data->title=$request->input('title',);
            $data->durum=$request->input('durum');
            $data->keywords=$request->input('keywords');
            $data->description=$request->input('description');
            $data->image=Storage::putFile('images',$request->file('image'));
            $data->slug=$request->input('slug');
            $data->size=$request->input('size');
            $data->durum=$request->input('durum');
            $data->save();
            return redirect()->route('user_products');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $data=Product::find($id);
        $datalist=Category::with('children')->get();
        return view('home.user_product_edit',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        $data=Product::find($id);
        $data->category_id=$request->input('category_id');
        $data->user_id=Auth::id();
        $data->detail=$request->input('detail');
        $data->price=$request->input('price');
        $data->title=$request->input('title',);
        $data->durum=$request->input('durum');
        $data->keywords=$request->input('keywords');
        $data->description=$request->input('description');
        if($request->hasFile('image')){
            $data->image=Storage::putFile('images',$request->file('image'));
            }
        $data->slug=$request->input('slug');
        $data->durum=$request->input('durum');
        $data->save();
        return redirect()->route('user_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        
        DB::table('products')->where('id','=',$id)->delete();
        return redirect()->route('user_products');
    }
}
