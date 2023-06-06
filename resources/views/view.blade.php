@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
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
                                <a href="/dictionary/edit/{{$dict->id}}" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3"></i></button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <strong class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this item?</strong>
                                          <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="modal-body">
                                          <p class="forgot">Deleting item can not be retrieved again. Once you delete the item it's permanent.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary btn-sm forgot" data-bs-dismiss="modal">Close</button>
                                          <form action="/dictionary/delete/{{$dict->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm forgot">Yes, Delete</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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
