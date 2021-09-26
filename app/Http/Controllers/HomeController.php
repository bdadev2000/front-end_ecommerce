<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id',0)->get();
        $products =  Product::latest()->take(6)->get();
        $productsRecommended = Product::latest('views_count','desc')->take(3)->get();
        $settings = Setting::latest()->get();
        
        return view('home.index',compact('sliders','categories','products','productsRecommended','settings'));
    }

}
