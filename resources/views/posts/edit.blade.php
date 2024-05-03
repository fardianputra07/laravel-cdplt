<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Postingan</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Ubah Postingan</h1>
        <form method="POST" action="{{ url("posts/$post->id") }}" class="form-control">
            <div class="mb-3">
                @method('PATCH')
                @csrf

                <label for="title" class="form-label">Email address</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="judul kamu" value="{{ $post->title }}">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Masukan Isi Postingan</label>
                <textarea class="form-control" id="content" name="content" rows="3" >{{ $post->content }}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <form action="{{ url("posts/$post->id") }}" class="form-control" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>

        </form>
    </div>

    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
