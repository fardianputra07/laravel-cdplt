@extends('layouts.app')

@section('title')
    Blog | {{ $post->title }}
@endsection

@section('content')
        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ date('d M Y H:i', strtotime($post->created_at)) }} by <a href="#">Mark</a>
            </p>

            <p>{{ $post->content }}</p>


            <small class="text-muted">{{ $total_comments }} Komentar</small>
            @foreach ($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p style="font-size: 8px">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            @endforeach
        </article>
        <a class="btn btn-warning" href="{{ url('posts') }}">kembali</a>
@endsection
