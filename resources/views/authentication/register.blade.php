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
        <h3 class="text-center text-uppercase">Đăng ký</h3>
        @if (session('msg'))
            <p class="text-danger">{{ session('msg') }}</p>
        @endif
        <form action="{{ route('postRegister') }}" class="form-control" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="username">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" placeholder="Nhập họ và tên" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
        <a href="{{ route('login') }}" class="btn btn-success mt-2">Đăng nhập</a>
    </div>

    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
