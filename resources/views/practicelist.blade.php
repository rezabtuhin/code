@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <h1 style="font-weight: 900">Problems</h1>
            </div>
            @if($message = \Illuminate\Support\Facades\Session::get('error'))
                <script type="text/javascript">
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000,
                    //     timerProgressBar: true,
                    //     didOpen: (toast) => {
                    //         toast.addEventListener('mouseenter', Swal.stopTimer)
                    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
                    //     }
                    // })

                    // Toast.fire({
                    //     icon: 'error',
                    //     title: '{{$message}}'
                    // })
                    Swal.fire({
                        title: 'Sweet!',
                        text: '{{$message}}',
                        imageUrl: 'https://media.giphy.com/media/mq5y2jHRCAqMo/giphy.gif',
                        imageWidth: 200,
                        imageHeight: 200,
                        imageAlt: 'Not found',
                    })
                </script>
            
            @endif
            <table class="table forgot">
                <thead>
                    <tr>
                        <th scope="col" style="width: 4%">#</th>
                        <th scope="col" style="width: 76%">Title</th>
                        <th scope="col" style="width: 20%">@sortablelink('difficulty')</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($lists as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td><strong><a href="/practice/{{$item->uuid}}">{{$item->title}}</a></strong></td>
                        @if ($item->difficulty == 1)
                            <td><span class="_{{$item->difficulty}}">Easy</span></td>
                        @elseif($item->difficulty == 2)
                            <td><span class="_{{$item->difficulty}}">Medium</span></td>
                        @elseif($item->difficulty == 3)
                            <td><span class="_{{$item->difficulty}}">Hard</span></td>
                        @else
                            Unknown
                        @endif
                    </tr>
                    @php
                        $i = $i +1;
                    @endphp
                @endforeach
                </tbody>
            </table>
            {!! $lists->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>
@endsection