@extends('layout.master')

@section('content')
<div class="container d-flex justify-content-center">

    <div class="card w-50">

        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('loginError')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-header">
            {{__('string.login')}}
        </div>
        <div class="card-body d-flex justify-content-center">
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('string.email')}}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Cookie::get('email') !== null ? Cookie::get('email') : old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div id="emailHelp" class="form-text">{{__('string.share')}}</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">{{__('string.remember')}}</label>
                </div>
                <button type="submit" class="btn btn-primary">{{__('string.login')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection
