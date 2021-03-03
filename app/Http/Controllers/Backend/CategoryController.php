<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    // Read
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category.categoty', compact('categories'));
    }

    // Create
    public function create()
    {
        return view('backend.category.create');
    }

    // Store
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = \Str::slug($request->title);
        Category::create($data);
        return redirect('category')->with('status', 'Create data successfully');
    }

    // Edit
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    // Update
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = \Str::slug($request->title);
        $category->update($data);
        return redirect('category')->with('status', 'Update data successfully');
    }




}
