<x-app>
    <div class="my-5">
        <form class="d-flex" role="search" action="{{route('index')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ $search }}" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <span>pencarian berdasarkan nama menu dan alamat katring</span>
    </div>
    @if($menus !== null && $menus->isNotEmpty())
    <div class="d-flex justify-content-between flex-wrap gap-2">
        @foreach ($menus as $menu)
        <div class="card" style="width: 18rem;">
            <img src="{{asset('/storage/img/' . $menu->img_menu)}}" class="card-img-top " alt="..." width="250px">
            <div class="card-body">
                <h5 class="card-title">{{$menu->name_menu}}</h5>
                <p class="card-text">{{$menu->desc_menu}}</p>
                <p class="card-text">Rp. {{$menu->price_menu}}</p>
                <a href="{{route('order', $menu->id)}}" class="btn btn-primary">Pesan</a>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <p>Tidak ada hasil.</p>
    @endif
</x-app>