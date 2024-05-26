<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cart extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('menu')->orderBy('status_order', 'desc')->get();
        // dd($orders);
        return view('user.order.cart', compact('orders'));
    }

    public function payment($id)
    {
        $order = Order::findOrFail($id);
        // $order->id = $order->id;
        $order->status_order = 'paid';
        $order->save();
        return redirect()->route('cart');
    }
}
