<x-merchant>
    <div class="text-center">
        <h1>Edit Menu</h1>
        <span>Silahkan Edit menu toko anda</span>
    </div>
    <div class="card p-2 col-8 mx-auto">
        <form action="{{route('menu.update', $menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_menu" value="{{old('name_menu',$menu->name_menu )}}">
                @error('name_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi Menu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="desc_menu" value="{{old('desc_menu',$menu->desc_menu )}}">
                @error('desc_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar sebelumnya </label>
                <img src="{{asset('/storage/img/' . $menu->img_menu)}}" alt="" width="150px">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gambar Menu</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="img_menu" value="{{old('img_menu',$menu->img_menu)}}">
                <span>Gamabr harus png, jpg, jpeg dan maksimal 2mb</span>
                @error('img_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="price_menu" value="{{old('price_menu',$menu->price_menu )}}">
                @error('price_menu')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Edit Menu</button>
        </form>
    </div>
</x-merchant>