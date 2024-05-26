<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{route('merchant')}}">Merchant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('toko.index')}}">Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('menu.index')}}">Menu Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('order-user')}}">Order</a>
                </li>
            </ul>
            <div>
                @if (session('isLoggedIn'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                @else
                <a class="btn btn-primary" href="{{route('login')}}">Login</a>
                <a class="btn btn-outline-primary" href="{{route('register')}}">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>