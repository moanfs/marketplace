<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoce extends Model
{
    use HasFactory;
    protected $fillable = ['oder_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
