<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <main class="card col-6 mt-5 p-3 mx-auto">
        <h1>Register</h1>
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Registrasi Sebagai :</label><br>
                <input type="radio" class="btn-check" name="role" id="option1" checked value="customer">
                <label class="btn btn-outline-info" for="option1">Customer</label>

                <input type="radio" class="btn-check" name="role" id="option2" value="merchant">
                <label class="btn btn-outline-info" for="option2">Merchant</label>
            </div>
            <!-- <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="flexRadioDisabled" checked value="customer" />
                    <label class="form-check-label" for="flexRadioDisabled"> Merchant </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="flexRadioCheckedDisabled" value="merchant" />
                    <label class="form-check-label" for="flexRadioCheckedDisabled">Merchant</label>
                </div>
            </div> -->

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <span>Sudah punya akun? <a href="{{route('login')}}">Masuk</a></span>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>