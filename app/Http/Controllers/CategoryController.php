<?php

namespace App\Http\Controllers;

use App\Models\Backend\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('backend.category.index',[
            'data'=>$data,
            'title'=>'All Categories',
            'meta_desc'=>'This is meta description for all categories'
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'detail'=>'required'
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $reImage=time().'_'.auth()->user()->id.'.'.$image->getClientOriginalExtension();
            $dest=public_path('/category/images');
            $image->move($dest,$reImage);
        }else{
            $reImage='na';
        }

        $category=new Category;
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        // $data=Category::find($id);
        $data = $category;
        return view('backend.category.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
            'image' => 'required'
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $reImage=time().'_'.auth()->user()->id.'.'.$image->getClientOriginalExtension();
            $dest=public_path('/category/images');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->image;
        }

        // $category=Category::find($id);
        $category = $category;
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/'.$category->id.'/edit')->with('success','Data has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::where('id',$category->id)->delete();
        return redirect('admin/category');
    }
}
