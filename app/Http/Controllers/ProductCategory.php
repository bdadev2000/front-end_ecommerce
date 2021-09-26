<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductCategory extends Controller
{
    public function index($slug,$categoryId)
    {
        $settings = Setting::latest()->get();
        $categories = Category::where('parent_id',0)->get();
        $products = Product::where('category_id',$categoryId)->paginate(3);
        return view('product.category.list',compact('settings','categories','products'));
    }
}
