<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $cartItemCount = 0;

            if (Auth::check()) {
                $cart = Cart::with('cartItems.product')->where('user_id', auth()->id())->first();
                $cartItemCount = $cart ? $cart->cartItems->count() : 0;
            }

            $view->with('cartItemCount', $cartItemCount);
        });
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'battery_id' => 'required|integer|exists:batterys,id',
            'variant_id' => 'required|integer|exists:variants,id',
            'color_id' => 'required|integer|exists:colours,id',
        ]);


        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);


        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->where('battery_id', $request->battery_id)
            ->where('variant_id', $request->variant_id)
            ->where('color_id', $request->color_id)
            ->first();

        if ($cartItem) {

            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {

            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'battery_id' => $request->battery_id,
                'variant_id' => $request->variant_id,
                'color_id' => $request->color_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully!']);
    }


    public function showCart()
{
    
    $cart = Cart::with('cartItems.product', 'cartItems.battery', 'cartItems.variant', 'cartItems.color')
        ->where('user_id', auth()->id())
        ->first();

    if ($cart) {
        foreach ($cart->cartItems as $cartItem) {
            
            $productPrice = $cartItem->product->price;
            $variantPrice = $cartItem->variant->price;
            $batteryPrice = $cartItem->battery->price;
            $colorPrice = $cartItem->color->price ?? 0;

          
            $cartItem->total_price = $productPrice + $variantPrice + $batteryPrice + $colorPrice;
        }
    }

    $cartItemCount = $cart ? $cart->cartItems->count() : 0;

    
    return view('user.CartUser', compact('cart', 'cartItemCount'));
}

    public function updateCartItem(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['message' => 'Cart updated successfully!']);
    }

    public function removeCartItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:cart_items,id',
        ]);

        $cartItem = CartItem::findOrFail($request->item_id);
        $cartItem->delete();

        return response()->json(['message' => 'Product removed from cart!']);
    }
   


    
}
