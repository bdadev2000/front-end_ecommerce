<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('deleted_at',null)->get();
        return view('home.index',compact('sliders'));
    }

}
