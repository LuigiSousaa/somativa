<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header style="width: 100%; height: 20px; display: flex; align-items: center; justify-content: flex-end;">
        @if (\Illuminate\Support\Facades\Auth::check())
            <a href="{{ route('logout') }}" class="btn btn-danger" style="text-decoration: none; color: white;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        @endif
    </header>   
    @yield('content')
</body>

</html>
