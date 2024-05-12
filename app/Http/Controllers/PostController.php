<?php

namespace App\Http\Controllers;


use App\Mail\BlogPosted;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::active()->get();
        $view_data = [
            'posts' => $posts
        ];
        return view('posts.index', $view_data);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
          }
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        $post = Post::create([
            'title' => $title,
            'content' => $content
        ]);


        $this->notifyTele($post);
        Mail::to($request->user())->send(new BlogPosted($post));
        return redirect('posts');
    }


    public function show($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $comments = $post->comments()->limit(5)->get();
        $total_comments = $post->total_comment();
        $view_data = [
            'post' => $post,
            'comments'=> $comments,
            'total_comments' => $total_comments
        ];
        return view('posts.show', $view_data);
    }


    public function edit($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $view_data = [
            'post' => $post
        ];
        return view('posts.edit', $view_data);
    }


    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Post::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect("posts/{$id}");
    }


    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('posts');
    }

    private function notifyTele($post)
    {
        $url = "https://api.telegram.org/bot7020913620:AAGoN2exrdTLFDRFvAVpRgOSUrFpo5K6QJg/sendMessage";
        $chat_id = -4279250385;
        $content ="New article are arival: {$post->title}";

        $data = [
            'chat_id' => $chat_id,
            'text' => $content
        ];

        Http::post($url , $data);
    }
}
