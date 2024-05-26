<x-merchant>
    <div>
        <!-- @if($merchant)
        <h1>Pesanan Masuk</h1>
        <span>Daftar Pesanan Masuk</span>
        @else
        @endif -->
        <h1 class="text-center mt-5">Data Pesanan</h1>

        @if($orders !== null && $orders->isNotEmpty())
        <div class="card col-6 mx-auto mt-2 p-3">
            @foreach ($orders as $order)
            <div class="card p-4">
                <p>Nama Pemesan :{{$order->user->name}}</p>
                <p>Menu Yang dipesan :{{$order->menu->name_menu}}</p>
                <p>Total Pesan : Rp.{{$order->amount}}</p>
                <p>Tanggal Pengiriman : {{$order->delivery_date}}</p>
                <p>Status Pembayaran : <span class="bg-danger p-1 rounded text-white">{{$order->status_order}}</span></p>
                <!-- <a href="">Cetak invoce</a> -->
            </div>
            @endforeach

        </div>
        @else
        <p>anda belum memiliki order</p>

        @endif

    </div>
</x-merchant>