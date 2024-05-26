<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order as ModelsOrder;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Order extends Controller
{
    public function index(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('user.order.show', compact('menu'));
    }


    public function create(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);
        $this->validate($request, [
            'quntity' => 'required|max:2',
            'delivery_date' => 'required',
            'note' => 'required',
        ]);
        $order = new ModelsOrder();
        $order->user_id = Auth::id();
        $order->menu_id = $menu->id;
        $order->quntity = $request->quntity;
        $order->delivery_date = $request->delivery_date;
        $order->note = $request->note;
        $order->amount = $request->quntity * $menu->price_menu;

        $order->save();
        return redirect()->route('cart');
    }


    public function delete($id)
    {
        $order = ModelsOrder::findOrFail($id);
        $order->delete();
        return redirect()->route('cart');
    }
}
