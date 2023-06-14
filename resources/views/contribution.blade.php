@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            <div class="row ">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 style="font-weight: 900">My Contributions</h1>
                    <a href="/create-problems" class="btn btn-outline-dark btn-sm forgot"><i class="fa-solid fa-plus me-2"></i><strong>Create new</strong></a>
                </div>
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
            @if ($message = \Illuminate\Support\Facades\Session::get('error'))
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
                    icon: 'error',
                    title: '{{$message}}'
                })
            </script>
            @endif
            <table class="table forgot mt-2">
                <thead>
                    <tr>
                        <th scope="col" style="width: 4%">#</th>
                        <th scope="col" style="width: 50%">Title</th>
                        <th scope="col" class="text-center" style="width: 15%">Difficulty</th>
                        <th scope="col" style="width: 19%">Created At</th>
                        <th scope="col" class="text-center" style="width: 12%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($prob as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <strong>
                                    <a href="/contribution/userview/{{$item->id}}">{{$item->title}}</a><br>
                                    @php
                                        $tags = explode(',', $item->tags);
                                    @endphp
                                    @foreach($tags as $tag)
                                        <span class="tags text-white">{{ trim($tag) }}</span>
                                    @endforeach
                                </strong>
                            </td>
                            @php
                                $diff = "";
                                if ($item->difficulty == 1) {
                                    $diff = "Easy";
                                }
                                if ($item->difficulty == 2) {
                                    $diff = "Medium";
                                }
                                if ($item->difficulty == 3) {
                                    $diff = "Hard";
                                }
                            @endphp
                            <td class="text-center"><span class="_{{$item->difficulty}}">{{$diff}}</span></td>
                            <td>{{date('F j, Y', strtotime($item->created_at))}}</td>
                            <td class="text-center">
                                <form action="{{$item->publish == 0 ? "contribution/publish/".$item->id : "contribution/hide/".$item->id}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn {{$item->publish == 0 ? "btn-success" : "btn-danger"}} btn-sm">
                                        {{$item->publish == 0 ? "Publish" : "Hide"}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i = $i +1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            {{$prob->links()}}
        </div>
    </div>
</div>
@endsection