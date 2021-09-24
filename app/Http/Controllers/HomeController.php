<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id',0)->get();
        return view('home.index',compact('sliders','categories'));
    }

}
