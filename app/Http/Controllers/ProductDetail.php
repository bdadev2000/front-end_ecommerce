<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Setting;

class ProductDetail extends Controller
{
    public function index($id)
    {
        $categories = Category::where('parent_id',0)->get();
        $categortBrand = Category::latest()->get();
        $settings = Setting::latest()->get();
        $product = Product::find($id);
        return view('product.detail.product-details',compact('categories','categortBrand','settings','product'));
    }
}
