<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $menus = Menu::query()
            ->whereHas('merchant', function ($query) use ($search) {
                $query->where('address_merchant', 'like', "%$search%");
            })
            ->orWhere('name_menu', 'like', "%$search%")
            ->with('merchant')
            ->get();
        // $merchant = Merchant::with('menu')->get();
        // $menus = Menu::with('merchant')->get();
        // dd($menus);

        return view('user.index', compact(['menus', 'search']));
    }
}
