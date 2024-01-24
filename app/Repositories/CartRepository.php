<?php

// namespace Repositories;

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

class CartRepository
{
    public function add(Product $product)
    {
        \Cart::session(auth()->user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $product,
    ));
        return $this->count();


    }

    public function content()
    {

        return \Cart::session(auth()->user()->id)->getContent();

    }

    public function increase(string $id)
    {
        \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => +1,
        ]);
        return $this->count();
    }

    public function decrease(string $id)
    {

        $item = \Cart::session(auth()->user()->id)->get($id);
        if($item->quantity === 1) {
           $this->remove($id);
           return;
        }

        \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => -1,
        ]);
        return $this->count();
    }

    public function remove(string $id)
    {
        \Cart::session(auth()->user()->id)->remove($id);

    }
    public function count()
    {
        return $this->content()->sum('quantity');
    }


}
