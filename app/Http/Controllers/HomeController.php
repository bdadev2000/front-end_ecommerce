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
        $products =  Product::latest()->take(12)->get();
        $productsRecommended = Product::latest('views_count','desc')->take(3)->get();
        $settings = Setting::latest()->get();
        return view('home.index',compact('sliders','categories','products','productsRecommended','settings'));
    }

    
    function addToCart($id)
    {
        // session()->flush();
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'name' =>$product->name,
                'price' =>$product->price,
                'quantity' =>1,
                'image'=>$product->feature_image_path,
            ];
        }
        session()->put('cart',$cart);
        return response()->json([
            'code'=>200,
            'message'=>'success',
        ],200);
    }

    public function showCart()
    {
        $settings = Setting::latest()->get();
        $carts = session()->get('cart');
        return view('product.cart.shopping-cart',compact('settings','carts'));
    }

    public function updateCart(Request $request)
    {
       
        if($request->id && $request->quantity){
            $carts = session()->get("cart");
            $carts[$request->id]["quantity"] = $request->quantity;
            session()->put("cart",$carts);
            $carts = session()->get("cart");
            $cartComponent = view('product.cart.shopping-cart',compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent,'code' =>200],200);
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->id){
            $carts = session()->get("cart");
            unset($carts[$request->id]);
            session()->put("cart",$carts);
            $carts = session()->get("cart");
            $cartComponent = view('product.cart.shopping-cart',compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent,'code' =>200],200);
        }
    }
}
