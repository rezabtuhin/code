@extends('components.layout')
@section('content')
@extends('components.navbar')
<div class="container mt-2">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <h1 style="font-weight: 900">Problem creation window</h1>
            </div>
            <div class="card mb-3">
                <strong class="card-header forgot">
                    Create New
                </strong>
                <div class="card-body">
                    <div class="input-group input-group-sm">
                        <form action="/create-problems" method="post" class="form w-100" enctype="multipart/form-data">
                            @csrf
                            <div class="row my-2">
                                <div class="col-md-6">
                                    <div class="input-group input-group-sm my-2">
                                        <input name="title" type="text" placeholder="title" class="form-control input " required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-sm my-2">
                                        <select class="form-select input" name="difficulty" aria-label="Default select example" required>
                                            <option selected>Difficulty level</option>
                                            <option value="Easy">Easy</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Hard">Hard</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <textarea name="description" id="post_editor" placeholder="description" required>description</textarea>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm my-2">
                                        <input name="memory_limit" type="number" placeholder="memory limit" class="form-control input " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm my-2">
                                        <input name="time_limit" type="number" placeholder="time limit" class="form-control input " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm my-2">
                                        <input name="tags" type="text" placeholder="tags (,) sapareted" class="form-control input " required>
                                    </div>
                                </div>

                            </div>
                            <div class="test-cases d-flex forgot my-2">
                                <label for="textareaCount">How many sample test cases?</label>
                                <select name="sample_test_count" id="textareaCount" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label forgot">Test Cases</label>
                                    <input class="form-control form-control-sm input" name="test_cases" accept=".json, .txt" id="formFileSm" type="file" required >
                                </div>
                            </div>
                                <button class="btn btn-primary btn-sm w-100 btn-log-reg">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
