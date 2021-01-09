<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Cache::remember('categories', 86400, function () {
            return Category::all();
        });

        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->toArray());

        return redirect()->route('admin-product-list');
    }

    public function edit(Product $product)
    {
        $categories = Cache::remember('categories', 86400, function () {
            return Category::all();
        });

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Product $product, ProductRequest $request): RedirectResponse
    {
        $product->name        = $request->name;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin-product-list');
    }

    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin-product-list');
    }
}
