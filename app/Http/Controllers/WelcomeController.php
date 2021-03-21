<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index(){

        $data=Post::with('user')->with('category')->with('comments')->inRandomOrder()->paginate(4);
        return view('welcome',[
            'data'=>$data,
        ]);
        
    }
}
