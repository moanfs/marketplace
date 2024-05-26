<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant as ModelsMerchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class Merchant extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $merchant = $user->merchant;
        return view('merchant.toko.show', compact('merchant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->hasMerchant()) {
            return redirect()->route('toko.index')->with('error', 'Anda sudah memiliki toko, (hanya boleh 1).');
        }
        return view('merchant.toko.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->merchant);
        $this->validate($request, [
            'name_merchant' => 'required',
            'address_merchant' => 'required',
            'contact_merchant' => 'required',
            'desc_merchant' => 'required',
        ]);

        $user = Auth::user();
        if ($user->merchant) {
            return redirect()->route('toko.index')->with('error', 'Anda sudah memiliki toko.');
        }
        $userId = $user->id;
        ModelsMerchant::create([
            'name_merchant' => $request->name_merchant,
            'address_merchant' => $request->address_merchant,
            'contact_merchant' => $request->contact_merchant,
            'desc_merchant' => $request->desc_merchant,
            'user_id' => $userId,
        ]);
        return redirect()->route('toko.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $toko = ModelsMerchant::findOrFail($id);
        return view('merchant.toko.edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name_merchant' => 'required',
            'address_merchant' => 'required',
            'contact_merchant' => 'required',
            'desc_merchant' => 'required',
        ]);

        $toko = ModelsMerchant::findOrFail($id);
        $toko->update($request->all());
        return redirect()->route('toko.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
