<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'price',
        'image',
        'stock',
        'description'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'produk_id');
    }
}
