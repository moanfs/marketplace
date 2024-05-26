<x-merchant>
    <h1>Tambah Menu</h1>
    <span>Silahkan tambah menu toko anda</span>
    <div>
        <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_menu" value="{{old('name_menu')}}">
                @error('name_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi Menu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="desc_menu" value="{{old('desc_menu')}}">
                @error('desc_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar Menu</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="img_menu">
                <span>Gamabr harus png, jpg, jpeg dan maksimal 2mb</span>
                @error('img_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="price_menu" value="{{old('price_menu')}}">
                @error('price_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Menu</button>
        </form>
    </div>
</x-merchant>