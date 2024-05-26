<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Order extends Controller
{
    public function index()
    {
        $merchant = Auth::user()->merchant;
        // $orders = ModelsOrder::where('merchant_id', $merchant->id)->get();
        $orders = $merchant->orders()->get();
        return view('merchant.order.show', compact('orders', 'merchant'));
    }
}
