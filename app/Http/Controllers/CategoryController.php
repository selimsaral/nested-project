<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories-nested', 86400, function () {
            return Category::with('recursiveChildren')->whereNull('parent_id')->get();
        });

        $categories = Helper::nestedToHtml($categories);

        return view('home', compact('categories'));
    }

    public function detail(Category $category)
    {
        $category->load('recursiveChildren');

        $categoryIds = Helper::nestedToArray($category, 'id');

        $products = Cache::remember('products_with_' . implode($categoryIds), 86400, function () use ($categoryIds) {
            return Product::whereIn('category_id', $categoryIds)->paginate(10);
        });

        return view('detail', compact('products'));
    }
}
