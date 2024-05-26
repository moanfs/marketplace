<x-merchant>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (!Auth::user()->merchant)
    <a class="btn btn-info" href="{{route('toko.create')}}">Buat Toko</a>
    @endif

    @if($merchant)
    <h1 class="text-center">Data Toko</h1>
    <div class="card col-8 p-2 mx-auto">
        <div class="">
            <a class="btn btn-primary" href="{{route('toko.edit', $merchant->id)}}">Edit Toko</a>
        </div>
        <p>Nama Toko: {{ $merchant->name_merchant }}</p>
        <p>Deskripsi: {{ $merchant->desc_merchant }}</p>
        <p>Alamat: {{ $merchant->address_merchant }}</p>
        <p>Kontak: {{ $merchant->contact_merchant }}</p>
    </div>
    @else
    <h1>Anda Belum Memiliki Toko</h1>
    <p>Anda dapat membuat toko dengan Terlebih Dahulu</p>
    @endif

</x-merchant>