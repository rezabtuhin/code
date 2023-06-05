@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4 py-1 navigation-card">
                    <a href="">
                        <div class="card text-bg-warning p-2">
                            <i class="bi bi-vector-pen"></i>
                            <strong>Create problem</strong>
                        </div>
                    </a>
                    
                </div>
                <div class="col-md-4 py-1 navigation-card">
                    <a href="">
                        <div class="card text-bg-info p-2">
                            <i class="bi bi-book"></i>
                            <strong>Practice problem</strong>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 py-1 navigation-card">
                    <a href="/dictionary">
                        <div class="card text-bg-success p-2">
                            <i class="bi bi-folder"></i>
                            <strong>My Dictionary</strong>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-12">
                    <form action="/post" method="POST">
                        @csrf
                        <textarea name="body" id="post_editor"></textarea>
                        <div class="d-flex align-items-end flex-column">
                            <button class="btn btn-primary btn-sm my-1">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                hello
            </div>
        </div>
        
    </div>
</div>

<script>
    

</script>
@endsection
