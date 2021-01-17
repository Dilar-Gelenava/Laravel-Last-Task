<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2|max:40',
            'description' => 'required|string|min:2|max:500',
            'image_url' => 'string',
        ]);

        $all_Categories = Category::all();
        $product_categories = array();
        foreach ($all_Categories as $category) {
            if ($request->has($category->id)) {
                array_push($product_categories, $category->id);
            };
        }

        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
        ]);

        Product::latest()->first()->categories()->sync($product_categories);

        return redirect()->back();
    }

    public function view_product($product_id)
    {
        $product = Product::find($product_id);
        return view('product', [
            'product' => $product,
        ]);
    }

    public function edit_product(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $categories = Category::all();
        $product_categories = array();
        foreach ($product->categories as $category)
        {
            array_push( $product_categories, $category->id);
        }
        return view('edit_product', [
            'product' => $product,
            'categories' => $categories,
            'product_categories' => $product_categories,
        ]);
    }

    public function update_product(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2|max:40',
            'description' => 'required|string|min:2|max:500',
            'image_url' => 'string',
        ]);

        $all_Categories = Category::all();
        $product_categories = array();
        foreach ($all_Categories as $category) {
            if ($request->has($category->id)) {
                array_push($product_categories, $category->id);
            };
        }

        $product = Product::with('categories')->find($request->input('product_id'));

        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
        ]);

        $product->categories()->sync($product_categories);

        return redirect('/home');

    }

    public function delete_product(Request $request)
    {
        Product::find($request->input('product_id'))->categories()->detach();
        Product::with('categories')->find($request->input('product_id'))->delete();
        return redirect()->back();
    }
}
