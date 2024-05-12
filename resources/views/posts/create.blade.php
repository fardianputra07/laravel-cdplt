@extends('layouts.app')

@section('title')
    Blog | Buat postingan
@endsection

@section('content')
        <h1>Buat Postingan</h1>
        <form method="POST" action="{{ url('posts') }}" class="form-control">
            <div class="mb-3">
                @csrf

                <label for="title" class="form-label">Email address</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="judul kamu">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Masukan Isi Postingan</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection
