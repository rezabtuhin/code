@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <h1 style="font-weight: 900">Dictionary</h1>
            </div>
            @if($message = \Illuminate\Support\Facades\Session::get('success'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: '{{$message}}'
                    })
                </script>
            
            @endif
            @if ($message = \Illuminate\Support\Facades\Session::get('success'))
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'failed',
                    title: '{{$message}}'
                })
            </script>
            @endif
            <div class="card">
                <strong class="card-header forgot">Create New</strong>
                <div class="card-body">
                    <div class="input-group input-group-sm">
                        <form action="/user_dictionary" method="POST" class="form w-100">
                            @csrf
                            <div class="input-group input-group-sm my-2">
                                <input name="title" type="text" placeholder="title" class="form-control input ">
                            </div>
                            <textarea name="body" id="post_editor" placeholder="content"></textarea>
                            <div class="d-flex align-items-end flex-column">
                                <button class="btn btn-primary btn-sm my-2 w-9 btn-log-reg">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table forgot mt-2">
                <thead>
                    <tr>
                        <th scope="col" style="width: 4%">#</th>
                        <th scope="col" style="width: 76%">Title</th>
                        <th scope="col" style="width: 20%">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($dicts as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td><strong><a href="/dictionary/view/{{$item->id}}">{{$item->title}}</a></strong></td>
                            <td>{{date('F j, Y', strtotime($item->created_at))}}</td>
                        </tr>
                        @php
                            $i = $i +1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            {{$dicts->links()}}
        </div>
        <div class="col-md-3">
            <div class="card">
                hello
            </div>
        </div>
        
    </div>
</div>
@endsection
