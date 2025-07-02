<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        $slug = Str::slug($request->name);
        Category::create(['name' => $request->name, 'slug' => $slug]);
        return redirect()->route('admin.categories.index')->with('status', 'Category created!');
    }

    public function show(Category $category) {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);
        $slug = Str::slug($request->name);
        $category->update(['name' => $request->name, 'slug' => $slug]);
        return redirect()->route('admin.categories.index')->with('status', 'Category updated!');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Category deleted!');
    }
} 