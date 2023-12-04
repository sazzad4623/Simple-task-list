<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::paginate(10);
        return view('category.index', $data);
    }
    public function create()
    {
        return view('category.form');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully!');
    }



    public function show(Category $category)
    {
        return view('category.show', [
            'category' => $category
        ]);
    }


    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->validated());

        return redirect()->route('categories.show', ['category' => $category->id])
            ->with('success', 'Category updated successfully!');
    }

    public function delete(Category $category)
    {
        $category->delete();


        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
