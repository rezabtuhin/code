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
                                <h6 style="font-weight: 800">Edit '{{$dict['title']}}'</h6>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="input-group input-group-sm">
                            <form action="/dictionary/edit/{{$dict->id}}" method="POST" class="form w-100">
                                @csrf
                                @method('PUT')
                                <div class="input-group input-group-sm my-2">
                                    <input name="title" type="text" placeholder="title" class="form-control input" value="{{$dict['title']}}">
                                </div>
                                <textarea name="body" id="post_editor" placeholder="content">
                                    {!!$dict['body']!!}
                                </textarea>
                                <div class="d-flex align-items-end flex-column">
                                    <button class="btn btn-primary btn-sm my-2 w-9 btn-log-reg">Save</button>
                                </div>
                            </form>
                        </div>
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
