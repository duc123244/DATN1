<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Colour;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function index()
    {
        $product_images = ProductImage::all(); 
        return view('admin.product_image.index', compact('product_images'));
    }

    public function create()
    {
        $products = Product::all();
        $colours = Colour::all();
        return view('admin.product_image.create', compact('products', 'colours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'colour_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        ProductImage::create([ 
            'product_id' => $request->product_id,
            'colour_id' => $request->colour_id,
            'image_path' => $imagePath
        ]);

        return redirect()->route('product_image.index')->with('success', 'Image added successfully.');
    }

    public function edit($id)
    {
        $product_images = ProductImage::find($id); 
        $products = Product::all();
        $colours = Colour::all();
        return view('admin.product_image.edit', compact('product_images', 'products', 'colours'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'colour_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product_images = ProductImage::find($id); 

        if ($request->hasFile('image')) {
          
            Storage::delete('public/' . $product_images->image_path);
            $imagePath = $request->file('image')->store('images', 'public');
            $product_images->image_path = $imagePath;
        }

        $product_images->product_id = $request->product_id;
        $product_images->colour_id = $request->colour_id;
        $product_images->save();

        return redirect()->route('product_image.index')->with('success', 'Image updated successfully.');
    }

    public function destroy($id)
    {
        $product_images = ProductImage::find($id); 

        Storage::delete('public/' . $product_images->image_path);

        $product_images->delete();

        return redirect()->route('product_image.index')->with('success', 'Image deleted successfully.');
    }
}
