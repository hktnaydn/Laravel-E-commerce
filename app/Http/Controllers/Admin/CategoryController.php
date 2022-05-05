<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{

    protected $appends=[

        'getParentsTree'
    ];
    public static function getParentsTree($category,$title)
    {
        if($category->parent_id==0)
        {
            return $title;
        }

        $parent=Category::find($category->parent_id);
        $title=$parent->title.'>'.$title;
    
        return CategoryController::getParentsTree($parent,$title);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Category::with('children')->get();
 
        return view('admin.category', ['datalist' => $datalist]);
       // return view('admin.category');
    }

    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $data=new Category();
            $data->parent_id=$request->input('parent_id');
            $data->slug=$request->input('slug');
            $data->title=$request->input('title',);
            $data->status=$request->input('status');
            $data->keywords=$request->input('keywords');
            $data->description=$request->input('description');
            $data->image=Storage::putFile('images',$request->file('image'));
       
            $data->save();
            return redirect()->route('admin_category');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $datalist = Category::with('children')->get();

        return view('admin.category_add', ['datalist' => $datalist]);
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
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id','=',$id)->delete();

        return redirect()->route('admin_category');

    }
}
