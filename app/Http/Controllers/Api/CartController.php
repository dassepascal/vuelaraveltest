<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cartContent = (new CartRepository())->content();
        return response()->json([
            'cartContent' => $cartContent,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();
        $count = (new CartRepository())->add($product);

        return response()->json([
            'count' => $count,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        (new CartRepository())->remove($id);
    }

public function increase(string $id)
    {
        $count = (new CartRepository())->increase($id);

        return response()->json([
            'count' => $count,
        ]);
    }

    public function decrease(string $id)
    {
        $count = (new CartRepository())->decrease($id);

        return response()->json([
            'count' => $count,
        ]);
    }


    public function count()
    {
        $count = (new CartRepository())->count();

        return response()->json([
            'count' => $count,
        ]);
    }
}
