<x-merchant>
    <div class="text-center">
        <h1>Buat Toko</h1>
        <span>satu akun hanya dapat membuat satu toko</span>
    </div>
    <div class="card col-8 p-3 mx-auto">
        <form action="{{route('toko.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_merchant" value="{{old('name_merchant')}}">
                @error('name_merchant')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi Toko</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="desc_merchant" value="{{old('desc_merchant')}}">
                @error('desc_merchant')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address_merchant" value="{{old('address_merchant')}}">
                @error('address_merchant')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kontak</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="contact_merchant" value="contact_merchant">
                @error('contact_merchant')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-merchant>