<x-app>
    <div class="card col-6 mx-auto mt-4">
        <div class="card-header">
            <h1 class="text-center">Pesanan Anda</h1>
        </div>
        <div class="card-body">
            @forelse ($orders as $order)
            <div class="card d-flex p-3">
                <div class="">
                    <p>Nama Produk : <span class="fw-bold">{{$order->menu->name_menu}}</span></p>
                    <p>Jumah Pesan : <span class="fw-bold">{{$order->quntity}}</span></p>
                    <p>Total Pembayaran : <span class="fw-bold text-danger">Rp. {{$order->amount}}</span></p>
                    <p>Status Pembayaran : <span class="fw-bold"> {{$order->status_order}}</span></p>
                </div>
                @if ($order->status_order == "Paid")
                <span>Tanggal Pembayaran : {{$order->updated_at}}</span>
                <a href="">Cetak Invoice</a>
                @else
                <div class="d-flex gap-2">
                    <!-- <a href="{{route('payment', $order->id)}}" class="btn btn-primary">Bayar Sekarang</a> -->
                    <form onsubmit="return confirm('Pembarayan sudah selesai?')" action="{{route('payment', $order->id)}}" method="POST">
                        @csrf
                        <!-- @method('PUT') -->
                        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                    </form>
                    <!-- <a href="{{route('order.edit', $order->id)}}" class="btn btn-warning">Edit Pesan</a> -->
                    <form onsubmit="return confirm('yakin batal pesan?')" action="{{ route('order/delete', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Batal Pesan</button>
                    </form>
                </div>
                @endif
            </div>
            @empty
            <p>Anda Belum memiliki pesanan</p>
            @endforelse
        </div>
    </div>
</x-app>