@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-4">
            <div class="card-body">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <form method="POST" action="{{ url('login') }}" >
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    {{-- <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> --}}
                    <button  class="w-100 btn btn-lg btn-primary"  type="submit">Log in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
