@section('css')
    <link rel="stylesheet" href="{{ asset('/css/features-item.css') }}">
@endsection
<div class="recommended_items">
	<h2 class="title text-center">Recommended Product</h2>
	@foreach($productsRecommended as $productsRecommendedItem)
	<div class="col-sm-4">
		<div class="product-image-wrapper shadow">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="{{config('app.base_url') . $productsRecommendedItem->feature_image_path}}" alt="{{$productsRecommendedItem->feature_image_name}}" style="height:300px;object-fit:contain" />
					<h2>${{ $productsRecommendedItem->price }}</h2>
					<p>{{ $productsRecommendedItem->name }}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    <a href="{{ route('product.detail',['id'=> $productsRecommendedItem->id]) }}" class="btn btn-default add-to-cart">More</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<!--/recommended_items-->