<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_merchant',
        'address_merchant',
        'contact_merchant',
        'desc_merchant',
        'user_id'
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Menu::class);
    }
}
