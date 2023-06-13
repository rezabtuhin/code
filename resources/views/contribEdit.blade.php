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
            <form action="/contribution/edit/{{$dict->id}}" method="post" class="form">
                @csrf
                @method('PUT')
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="forgot">Edit "<strong>{{$dict->title}}</strong>"</h6>
                        <button class="btn btn-success btn-sm">Save</button>
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="input-group input-group-sm my-2">
                                    <input name="title" type="text" placeholder="title" class="form-control input " value="{{$dict->title}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-sm my-2">
                                    <select class="form-select input" name="difficulty" aria-label="Default select example" required>
                                        @foreach(['Easy', 'Medium', 'Hard'] as $value)
                                            <option value="{{ $value }}" {{ $value == $dict->difficulty ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <textarea name="description" id="post_editor" placeholder="description" required>{!! $dict->description !!}</textarea>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm my-2">
                                    <input name="memory_limit" type="number" placeholder="memory limit" class="form-control input " value="{{$dict->memory_limit}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm my-2">
                                    <input name="time_limit" type="number" placeholder="time limit" class="form-control input " value="{{$dict->time_limit}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm my-2">
                                    <input name="tags" type="text" placeholder="tags (,) sapareted" class="form-control input " value="{{$dict->tags}}" required>
                                </div>
                            </div>

                        </div>
                        <div class="test-cases d-flex forgot my-2">
                            <label for="textareaCount">How many sample test cases?</label>
                            <select name="sample_test_count" id="textareaCount" required>
                                @foreach([1, 2, 3] as $value)
                                    <option value="{{ $value }}" {{ $value == $dict->sample_test_count ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @php
                            $jsonData = $dict->test_cases;
                            $formattedJson = json_encode($jsonData, JSON_PRETTY_PRINT);
                        @endphp
                        <textarea name="test_cases" id="json-editor" style="'JetBrains Mono', sans-serif;">{{ $formattedJson }}</textarea>
                        <button class="btn btn-primary btn-sm w-100 btn-log-reg mt-3">Save</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection