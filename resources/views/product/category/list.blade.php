@extends('layout.master')

@section('title')
Category Product
@endsection

@section('content')
@include('components.header')
<section>
    <div class="container">
        <div class="row">
            @include('components.siderbar')

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach($products as $productCategory)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ config('app.base_url'). $productCategory->feature_image_path }}" alt="{{ $productCategory->feature_image_name }}" style="height:300px;object-fit:contain" />
                                    <h2>${{ number_format($productCategory->price) }}</h2>
                                    <p>{{ $productCategory->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                               
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--features_items-->
            </div>
        </div>
        <div style="float: right;">
            {{ $products->links() }}     
        </div>
    </div>
</section>
@endsection