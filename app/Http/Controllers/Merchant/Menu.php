<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Menu as ModelsMenu;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $merchant = $user->merchant;
        // dd($merchant);
        $menus = ModelsMenu::where('merchant_id', $merchant->id)->get();
        // dd($menus);
        return view('merchant.menu.show', compact(['merchant', 'menus']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_menu' => 'required',
            'desc_menu' => 'required',
            'img_menu' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'price_menu' => 'required',
        ]);

        $user = Auth::user();

        $merchantId = $user->merchant->id;
        // dd($merchantId);
        $gambar =  $request->file('img_menu');
        $gambar->storeAs('public/img/' . $gambar->hashName());
        ModelsMenu::create([
            'merchant_id' => $merchantId,
            'name_menu' => $request->name_menu,
            'desc_menu' => $request->desc_menu,
            'price_menu' => $request->price_menu,
            'img_menu' => $gambar->hashName(),
        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = ModelsMenu::findOrFail($id);
        return view('merchant.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = ModelsMenu::findOrFail($id);
        if ($request->hasFile('img_menu')) {
            $this->validate($request, [
                'name_menu' => 'required',
                'desc_menu' => 'required',
                'img_menu' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'price_menu' => 'required',
            ]);
            $gambar =  $request->file('img_menu');
            $gambar->storeAs('public/img/', $gambar->hashName());
            $menu->update([
                'name_menu' => $request->name_menu,
                'desc_menu' => $request->desc_menu,
                'price_menu' => $request->price_menu,
                'img_menu' => $gambar->hashName(),
            ]);
        } else {
            $this->validate($request, [
                'name_menu' => 'required',
                'desc_menu' => 'required',
                'price_menu' => 'required',
            ]);
            $menu->update([
                'name_menu' => $request->name_menu,
                'desc_menu' => $request->desc_menu,
                'price_menu' => $request->price_menu,
            ]);
        }
        return redirect()->route('menu.index')->with('success', 'Menu Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $menu = ModelsMenu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
