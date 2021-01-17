<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_products()
    {
        return Product::all();
    }

    public function get_product($product_id)
    {
        return Product::with('comments')->find($product_id);
    }

    public function get_categories()
    {
        return Category::all();
    }

    public function get_category_posts($category_id)
    {
        return Product::whereHas('categories', function($query) use ($category_id) {
            $query->where('category_id', '=', $category_id);
        })->with('categories')->get();
    }
}
