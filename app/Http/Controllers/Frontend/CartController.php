<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {

                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . " Already Added To Cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;

                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . ' Added To Cart']);
                }
            }
        } else {
            return response()->json(['status' => ' Login To Continue']);
        }
    }
}
