<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = DB::table('posts')->select('id', 'title', 'content', 'created_at')->where('active', 1)->get();
        $view_data = [
            'posts' => $posts
        ];
        return view('posts.index', $view_data);
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        DB::table('posts')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('posts');
    }


    public function show($id)
    {
        $post = DB::table('posts')->select('id', 'title', 'content', 'created_at')->where('id', '=', $id)->first();
        $view_data = [
            'post' => $post
        ];
        return view('posts.show', $view_data);
    }


    public function edit($id)
    {
        $post = DB::table('posts')->select('id', 'title', 'content', 'created_at')->where('id', '=', $id)->first();
        $view_data = [
            'post' => $post
        ];
        return view('posts.edit', $view_data);
    }


    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        DB::table('posts')->where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect("posts/{$id}");
    }


    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect('posts');
    }
}