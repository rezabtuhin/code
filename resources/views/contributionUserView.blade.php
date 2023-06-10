@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            @if (isset($error))
            <div class="alert alert-danger" role="alert">
                <p class="forgot">You are not allowed to view, edit or delete this item. <strong><a href="/contribution">Back to contribution</a></strong></p>
            </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex">
                                <a href="/contribution/edit/{{$item->id}}" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil-square"></i></a>
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
                                          <form action="/contribution/delete/{{$item->id}}" method="post">
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
                        <span style="font-weight: 900">{{$item->title}}</span><br>
                        <span class="forgot">Time Limit per test: <span style="font-weight: bold">{{ $item->time_limit }} second(s)</span></span><br>
                        <span class="forgot">Memory Limit per test: <span style="font-weight: bold">{{ $item->memory_limit }} Megabytes</span></span><br>
                        <span class="forgot">Input: <span style="font-weight: bold">Standard input</span></span><br>
                        <span class="forgot">Output: <span style="font-weight: bold">Standard output</span></span>
                        <hr>
                        <div class="content forgot">
                          {!! $item->description !!}
                          @foreach ($item->test_cases as $sample)
                          <div class="card">
                            <div class="card-header io-card">
                              <span style="font-weight: 900">Sample Input</span>
                            </div>
                            <div class="card-body io-card">
                              @if (is_array($sample['input']))
                                @foreach ($sample['input'] as $inneritem)
                                    @if (is_array($inneritem))
                                        {{ implode(' ', $inneritem) }}
                                    @else
                                        {{ $inneritem }}
                                    @endif
                                    <br>
                                @endforeach  
                              @else
                                {{ $sample['input'] }}
                              @endif
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header io-card">
                              <span style="font-weight: 900">Sample Output</span>
                            </div>
                            <div class="card-body io-card">
                              @if (is_array($sample['output']))
                                @foreach ($sample['output'] as $inneritem)
                                    @if (is_array($inneritem))
                                        {{ implode(' ', $inneritem) }}
                                    @else
                                        {{ $inneritem }}
                                    @endif
                                    <br>
                                @endforeach  
                              @else
                                {{ $sample['output'] }}
                              @endif
                            </div>
                          </div>
                          <br>
                          @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
