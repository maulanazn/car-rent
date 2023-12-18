<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('styles')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />  
    <title>@section('title')</title>
</head>
<body>
    @if (session('name') != "" && (request()->is('login') || request()->is('register')))
        <script>window.location = "/"</script>
    @endif
    <main>
        @yield('content')
    </main>
</body>
</html>