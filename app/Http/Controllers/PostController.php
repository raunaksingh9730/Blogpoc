<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Backend\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Post::all();
        return view('welcome',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $category = $category->toArray();
        return view('addpost',['category'=>$category]);
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
            'category'=>'required',
            'detail'=>'required',
            'thumb' => 'required',
            'full_img' => 'required',
            'tags' => 'required',
        ]);

        // Post Thumbnail
        // dd($request->all());
        if($request->hasFile('thumb')){
            $image1=$request->file('thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/posts/images/thumbnail');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

        // Post Full Image
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/posts/images/fullimage');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=auth()->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();

        return redirect('post/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post',['data'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category=Category::all();
        $data=$post;
        if(auth()->user()->id != $data->user_id){
            return response('Unauthorized',401);
        }
        return view('editpost',['category'=>$category,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        dd($request->all());
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
            'thumb' => 'required',
            'full_img' => 'required',
            'tags' => 'required',
        ]);

        // Post Thumbnail
        if($request->hasFile('thumb')){
            $image1=$request->file('thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/posts/images/thumbnail');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage=$request->thumb;
        }

        // Post Full Image
        if($request->hasFile('full_img')){
            $image2=$request->file('full_img');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/posts/images/fullimage');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage=$request->full_img;
        }

        $post=$post;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();

        return redirect('post/'.$post->id.'/edit')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::where('id',$post->id)->delete();
        return redirect('post');
    }
}
