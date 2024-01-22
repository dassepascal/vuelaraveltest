<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('total_quantity', 'total_price');
    }

    public function getFormattedPriceAttribute(){
        return str_replace('.', ',', $this->price/100).'€';
    }
}
