<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Battery;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        $cart = Cart::with('cartItems.product')->where('user_id', auth()->id())->first();
        $cartItemCount = $cart ? $cart->cartItems->count() : 0;
        return view('user.shop', compact('products','cart','cartItemCount')); 
    }

    public function show($id)
    {
        $cart = Cart::with('cartItems.product')->where('user_id', auth()->id())->first();
        $cartItemCount = $cart ? $cart->cartItems->count() : 0;
        $product = Product::findOrFail($id);
        $variants = Variant::all();
        $batterys = Battery::all();


        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) 
            ->take(4) // lấy số lượng sp liên quan
            ->get();

      
        return view('user.shop-single', compact('product','variants','batterys', 'relatedProducts','cart','cartItemCount'));
    }
}
