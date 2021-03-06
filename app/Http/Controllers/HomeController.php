<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Setting;
use App\Models\Order;
use App\Models\Orderitem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public static function categoryList()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public static function getSetting()
    {
        return Setting::first();
    }
    public function index()
    {
        $setting=Setting::first();
        $daily=Product::select('id','title','image','price','slug','durum')->limit(8)->inRandomOrder()->get();
        $last=Product::select('id','title','image','price','slug','durum')->limit(8)->orderByDesc('id')->get();
        $cheap=Product::select('id','title','image','price','slug','durum')->limit(8)->orderBy('price')->get();
        $picked=Product::select('id','title','image','price','slug','durum')->limit(8)->orderByDesc('id')->get();
        $data=[
            'setting'=>$setting,
            'daily'=>$daily,
            'last'=>$last,
            'picked'=>$picked,
            'cheap'=>$cheap,
            'page'=>'home'
        ];
        return view('home.index',$data);
    }

    public function product($id,$slug)
    {
        $data=Product::find($id);
        $datalist=Image::where('product_id',$id)->get();
       return view('home.productdetail',['data'=>$data,'datalist'=>$datalist]);
    }
    public function addtocart($id)
    {
        echo "Sepete Eklendi <br>";
        $data=Product::find($id);
        print_r($data);
        exit();
    }
    public function categoryproducts($id,$slug)
    {
        $data=Category::find($id);
            $datalist=Product::where('category_id',$id)->get();
            return view('home.categoryproducts',['datalist'=>$datalist,'data'=>$data]);
    }
    public function orderwait()
    {
        $datalist=Order::where('owner',Auth::id())->get();
        return view('home.user_order_wait',['datalist'=>$datalist]);
    }
    public function orderwaitshow($id)
    {
        $datalist=Orderitem::where('order_id',$id)->get();
        return view('home.user_order_item',['datalist'=>$datalist]);
    }
    public function orderwaitshipping($id)
    {
        $data=Order::where('id',$id)->first();
        $data->status="shipping";
        $data->save();
        $datalist=Order::where('owner',Auth::id())->get();
        return view('home.user_order_wait',['datalist'=>$datalist]);
    }
    public function aboutus()
    {
        $setting=Setting::first();
        return view('home.aboutus',['setting'=>$setting]);
    }
    public function faq()
    {
        $setting=Setting::first();
        return view('home.faq',['setting'=>$setting]);
    }
    public function contact()
    {
        $setting=Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }
    public function references()
    {
        $setting=Setting::first();
        return view('home.references',['setting'=>$setting]);
    }


    public function login()
    {
        return view('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');


    }
    public function logincheck(Request $request)
    {
        if($request->isMethod('post'))
        {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('home');
            }
     
            return back()->withErrors([
                'email' => 'E??le??medi',
            ])->onlyInput('email');
        }
        else{
            return view('admin.login');
        }
      
    }
}

