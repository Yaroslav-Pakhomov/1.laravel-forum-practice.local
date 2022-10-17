<!DOCTYPE html>
<html lang="">
<head>
    {{--    <link rel="shortcut icon" href="public/favicon.ico">--}}
    @vite(['resources/js/app.js'])
    <link rel="shortcut icon" href="{{ Vite::asset('favicon.ico') }}">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container-fluid">
        {{ $slot }}
    </div>
</body>
</html>

