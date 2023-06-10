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
            <textarea name="" id="json-editor" cols="30" rows="10"></textarea>
            <script>
                // Initialize CodeMirror
                var editor = CodeMirror.fromTextArea(document.getElementById("json-editor"), {
                    theme: "dracula",
                    mode: "application/json",
                    lineNumbers: true,
                    matchBrackets: true,
                    extraKeys: { "Ctrl-Space": "autocomplete" }
                });
            </script>
            @endif
        </div>
    </div>
</div>
@endsection