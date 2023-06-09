<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/main.css">
    <title>
        @isset($title)
            {{$title}}
        @endisset
    </title>
</head>
<body>

<div>
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
<script src="{{asset('code_block/src/codeblock.ts')}}"></script>
<script>
    CKEDITOR.replace('post_editor');
    
    ClassicEditor.create(document.querySelector('.lol'), {
    ckfinder: {
        uploadUrl: '{{ route("ckeditor.upload")."?_token=".csrf_token()}}',
    },
    codeBlock: {
            languages: [
                { language: 'css', label: 'CSS' },
                { language: 'html', label: 'HTML' }
            ]
        },
    
    }).catch((error) => {
        console.error(error);
    });
</script>
<script src="/main.js"></script>
</body>
</html>
