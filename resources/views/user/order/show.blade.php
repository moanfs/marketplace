<x-app>
    <h1> Order</h1>
    <div class="d-flex gap-2">
        <div>
            <img src="{{asset('/storage/img/' . $menu->img_menu)}}" alt="" width="160px">
        </div>
        <div class="card p-2 col-8">
            <h5>Nama menu : {{$menu->name_menu}}</h5>
            <h5>Desripsi menu : {{$menu->desc_menu}}</h5>
            <h5 class="">Harga : Rp.{{$menu->price_menu}}</h5>
            <form action="{{route('order', $menu->id)}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jumlah Pesan</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="quntity" maxlength="3" value="{{old('quntity')}}">
                    @error('quntity')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Antar</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="delivery_date" value="{{old('delivery_date')}}" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                </div>
                @error('delivery_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Catatan Ke Penjual</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="note">
                </div>
                @error('note')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        </div>
    </div>
</x-app>