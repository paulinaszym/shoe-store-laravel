<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tot_price'=>0,
        'tot_amount'=>0
    ];


    public function products()
    {
        return $this->belongsToMany( Product::class)->withPivot('total_product_price', 'total_product_amount', 'product_size');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
