@extends('components.layout')
@section('content')
    <main class="container">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <img src="/logo_.svg" height="30" alt="codersher logo" class="pt-1">
                        <strong>Register</strong>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-warning" role="alert">
                                @foreach ($errors->all() as $error)
                                    <h5 class="d-block forgot">{{ $error }}</h5>
                                @endforeach
                            </div>
                        @endif
                        <form action="/register" method="POST" class="form">
                            @csrf
                            <div class="input-group input-group-sm my-2">
                                <input name="username" type="text" placeholder="username" class="form-control input "
                                    value="{{ old('username') }}">
                            </div>
                            <div class="input-group input-group-sm my-2">
                                <input name="email" type="email" placeholder="email" class="form-control input"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="input-group input-group-sm my-2">
                                <select name="gender" id="" class="form-select input" required>
                                    @foreach (json_decode('{"Male":"male", "Female":"female", "Others":"others"}', true) as $optionKey => $optionValue)
                                        <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-sm my-2">
                                <input name="password" type="password" placeholder="password" class="form-control input"
                                    required>
                            </div>
                            <div class="input-group input-group-sm my-2">
                                <input name="confirm_password" type="password" placeholder="confirm password"
                                    class="form-control input " required>
                            </div>


                            <div class="d-flex align-items-end flex-column">
                                <button class="btn btn-primary btn-sm my-2 w-100">Register</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mx-3">
                            <p class="forgot">Already have an account? <strong><a href="/login">Login</a></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
