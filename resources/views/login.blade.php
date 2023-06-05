@extends('components.layout')
@section('content')
    <main class="container">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <img src="/logo_.svg" height="30" alt="codersher logo" class="pt-1">
                        <strong>Login</strong>
                    </div>
                    <div class="card-body">
                        @error('username')
                            <div class="alert alert-warning" role="alert">
                                <h5 class="d-block forgot">{{ $message }}</h5>
                            </div>
                        @enderror
                        <form action="/login" method="POST" class="form">
                            @csrf
                            <div class="input-group input-group-sm my-2">
                                <input name="username" type="text" placeholder="username" class="form-control input " value="{{ old('username') }}">
                            </div>
                            <div class="input-group input-group-sm my-2">
                                <input name="password" type="password" placeholder="password" class="form-control input">
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                                <strong><a href="#" class="forgot">Forgot password?</a></strong>
                            </div>
                            <div class="d-flex align-items-end flex-column">
                                <button class="btn btn-primary btn-sm my-2 w-100 btn-log-reg">Login</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mx-3">
                            <p class="forgot">Don't have an account? <strong><a href="/register">Register</a></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
