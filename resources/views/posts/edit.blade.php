@extends('layouts.app')

@section('title')
    Blog | Ubah Postingan
@endsection

@section('content')
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
@endsection
