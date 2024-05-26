<x-merchant>
    <div>
        @if($merchant)
        <div class="text-center">
            <h1>Menu Toko</h1>
            <span>Daftar menu Toko</span>
        </div>
        @else
        <div class="text-center">
            <h1>Anda Belum Memiliki Toko</h1>
            <p>Anda dapat membuat toko dengan Terlebih Dahulu</p>
        </div>
        <a class="btn btn-info" href="{{ route('toko.create') }}">Buat Toko</a>
        @endif

        @if($menus !== null && $menus->isNotEmpty())
        <div class="card">
            <table class="table">
                <a class="btn btn-info" href="{{route('menu.create')}}">Tambah Menu</a>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Deskripsi Menu</th>
                        <th>Harga Menu</th>
                        <th>Garmbar Menu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $key => $menu)
                    <tr>
                        <td>{{ $menu->name_menu }}</td>
                        <td>{{ $menu->desc_menu }}</td>
                        <td>{{ $menu->price_menu }}</td>
                        <td>
                            <img src="{{asset('/storage/img/' . $menu->img_menu)}}" alt="" width="50px">
                        </td>
                        <td class="d-flex gap-2">
                            <a class="btn btn-info" href="{{ route('menu.edit', $menu->id) }}">Edit</a>
                            <form onsubmit="return confirm('yakin hapus menu?')" action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p>Tidak ada menu yang tersedia. silahkan buat menu pertama anda</p>
        <a class="btn btn-info" href="{{route('menu.create')}}">Tambah Menu</a>
        @endif

    </div>
</x-merchant>