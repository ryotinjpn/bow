<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        $disk = Storage::disk('s3');
        $files = $disk->files('/');
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        //
    }
 
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->content = $request->content;

        $file = $request->file('picture');
        $path = Storage::disk('s3')->put('/', $file, 'public');
        $post->picture = Storage::disk('s3')->url($path);
        //ローカル保存
        /* $file = $request->file('picture')->getClientOriginalName(); */
        /* $request->file('picture')->storeAs('public',$file); */
        /* $post->picture = $file; */

        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('/posts');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
