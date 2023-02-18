<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use PDO;

class UserPostController extends Controller
{
    public function index(){
        return view('user.posts.index',[
            "posts" => Post::latest()->filter(request(['search']))->paginate(4)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('user/posts/show',[
            'post' => $post
        ]);
    }

    public function postkomentar(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        Comment::latest()->create($request->all());
        return redirect()->back()->with('success', 'Komentar Berhasil ditambahkan');
    }

}
