<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::Paginate(8);
        foreach ($products as $product) {
            unset($product['desc_ttl']);
            unset($product['desc_body']);
            unset($product['created_at']);
            unset($product['updated_at']);
        }
        return response()->json([
            'data' => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $user = auth()->user();
        if ($user) {
            $item = Product::find($product);
            if ($item) {
                unset($item[0]['created_at']);
                unset($item[0]['updated_at']);
                return response()->json([
                    'data' => $item[0]
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
        } else {
            return response()->json([
                'message' => 'Forbidden',
            ], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
