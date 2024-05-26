<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['merchant_id', 'name_menu', 'desc_menu', 'img_menu', 'price_menu'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereHas('menu', function ($query) use ($search) {
            $query->where('name_menu', 'LIKE', "%$search%");
        })->orWhereHas('menu.merchant', function ($query) use ($search) {
            $query->where('address', 'LIKE', "%$search%");
        });
    }
}
