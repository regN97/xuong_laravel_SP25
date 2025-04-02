<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">
    
    <div class="container w-50">
        <h3 class="text-center text-uppercase">Đăng nhập</h3>
        @if (session('msg'))
            <p class="text-danger">{{session('msg')}}</p>
        @endif
        <form action="{{route('postLogin')}}" class="form-control" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <div class="mb-3">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <a href="{{route('register')}}" class="btn btn-success mt-2">Đăng ký</a>
    </div>

    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>