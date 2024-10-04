<?php

namespace App\Http\Controllers\admin;

use App\Models\Battery;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Product;
use App\Models\Screen;
use App\Models\Supplier;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function show($id)
{   $variants = Variant::all();
    $product = Product::with(['productImages','variant'])->findOrFail($id);
    return view('admin.products.show', compact('variants','product'));
}



    public function create()
    {
        $variants = Variant::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $batterys = Battery::all();
        $colours = Colour::all();
        $screens = Screen::all();
        return view('admin.products.create',compact('variants', 'categories', 'suppliers', 'batterys', 'colours', 'screens'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_sp' => 'required',
            'image' => 'required|image',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'variant_id' => 'nullable|exists:variants,id',
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'battery_id' => 'nullable|exists:batterys,id',
            'colour_id' => 'nullable|exists:colours,id',
            'screen_id' => 'nullable|exists:screens,id',
        ]);

        $data = $request->all();

    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    
    public function edit(Product $product)
    {
        $variants = Variant::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $batterys = Battery::all();
        $colours = Colour::all();
        $screens = Screen::all();
        return view('admin.products.edit', compact('product','variants', 'categories', 'suppliers', 'batterys', 'colours', 'screens'));
    }

  
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_sp' => 'required',
            'image' => 'nullable|image',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'variant_id' => 'nullable|exists:variants,id',
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'battery_id' => 'nullable|exists:batterys,id',
            'colour_id' => 'nullable|exists:colours,id',
            'screen_id' => 'nullable|exists:screens,id',
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
