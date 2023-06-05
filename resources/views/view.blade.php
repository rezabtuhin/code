@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            @if(isset($error))
                <div class="alert alert-danger" role="alert">
                    <p class="forgot">You are not allowed to view, edit or delete this item. <strong><a href="/dictionary">Back to Dictionary</a></strong></p>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <h6 style="font-weight: 800">{{$dict['title']}}</h6>
                            </div>
                            <div class="d-flex">
                                <form action="" method="post">
                                    <button class="btn btn-success btn-sm me-2"><i class="bi bi-pencil-square"></i></button>
                                </form>
                                <form action="" method="post">
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!!$dict['body']!!}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            <div class="card">
                hello
            </div>
        </div>
        
    </div>
</div>
@endsection
