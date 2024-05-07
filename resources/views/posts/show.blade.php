<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Judul:{{ $post->title }}</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">

        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ date('d M Y H:i',strtotime($post->created_at)) }} by <a href="#">Mark</a></p>

            <p>{{ $post->content }}</p>
        </article>
        <a class="btn btn-warning" href="{{ url("posts") }}">kembali</a>
    </div>


    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}">
    </script>
</body>

</html>
