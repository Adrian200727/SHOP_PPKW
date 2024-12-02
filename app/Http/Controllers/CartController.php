<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Crud;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('user.cart.index', compact('carts'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Crud::findOrFail($productId);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity ?? 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $request->quantity ?? 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function removeFromCart($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}

