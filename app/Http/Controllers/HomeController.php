<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

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
        return view('home.index',['setting'=>$setting]);
    }

    public function product($id,$slug)
    {
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
                'email' => 'Eşleşmedi',
            ])->onlyInput('email');
        }
        else{
            return view('admin.login');
        }
      
    }
}

