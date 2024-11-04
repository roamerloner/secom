<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories = Subcategory::with('category')->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request){
     
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create($request->all());
        
        return redirect()->route('subcategories.index')->with('success', 'Subcategory Created Successfully');
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory->update($request->all());

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategory deleted successfully.');
    }
}
