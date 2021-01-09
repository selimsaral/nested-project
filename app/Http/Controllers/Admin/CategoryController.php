<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Cache::remember('categories', 86400, function () {
            return Category::all();
        });

        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->toArray());

        Cache::forget('categories');

        return redirect()->route('admin-category-list');
    }

    public function edit(Category $category)
    {
        $categories = Cache::remember('categories', 86400, function () {
            return Category::all();
        });

        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        $category->name      = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();

        Cache::forget('categories');

        return redirect()->route('admin-category-list');
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin-category-list');
    }
}
