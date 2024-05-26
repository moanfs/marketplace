<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <main class="card p-5 mt-5 col-10 col-lg-6 mx-auto">
        @if (session()->has('message'))
        <span class="text-white bg-danger flex text-center rounded-sm p-1 ">
            {{session('message')}}
        </span>
        @endif
        <h1 class="text-center">Login</h1>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login Sebagai :</label><br>
                <input type="radio" class="btn-check" name="role" id="option1" autocomplete="off" checked value="customer">
                <label class="btn btn-outline-info" for="option1">Customer</label>

                <input type="radio" class="btn-check" name="role" id="option2" autocomplete="off" value="merchant">
                <label class="btn btn-outline-info" for="option2">Merchant</label>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <span>Belum punya akun? <a href="{{route('register')}}">Daftar</a></span>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>