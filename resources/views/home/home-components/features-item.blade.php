@section('css')
    <link rel="stylesheet" href="{{ asset('/css/features-item.css') }}">
@endsection
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($products as $productItem)
    <div class="col-sm-4">
        <div class="product-image-wrapper shadow">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{config('app.base_url') . $productItem->feature_image_path}}" alt="{{$productItem->feature_image_name}}" style="height:300px; object-fit:contain;"/>
                    <h2>${{ number_format($productItem->price) }}</h2>
                    <p>{{ $productItem->name }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    <a href="{{ route('product.detail',['id'=> $productItem->id]) }}" class="btn btn-default add-to-cart">More</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--features_items-->