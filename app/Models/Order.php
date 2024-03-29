<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('total_quantity', 'total_price');
    }

}
