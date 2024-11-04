<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('subcategory.category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('products.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_price' => 'required|numeric|min:0',
            'new_price' => 'required|numeric|min:0',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'subcategory_id' => $request->subcategory_id,
        ]);

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $subcategories = Subcategory::with('category')->get();
        return view('products.edit', compact('product', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_price' => 'required|numeric|min:0',
            'new_price' => 'required|numeric|min:0',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function viewBySubcategory($categorySlug, $subcategorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $subcategory = Subcategory::where('slug', $subcategorySlug)
            ->where('category_id', $category->id)
            ->firstOrFail();
        $products = Product::where('subcategory_id', $subcategory->id)->get();

        return view('products.by_subcategory', compact('category', 'subcategory', 'products'));
    }
}