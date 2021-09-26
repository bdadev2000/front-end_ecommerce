<div class="recommended_items">
	<h2 class="title text-center">Recommended Product</h2>
	@foreach($productsRecommended as $productsRecommendedItem)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="{{config('app.base_url') . $productsRecommendedItem->feature_image_path}}" alt="{{$productsRecommendedItem->feature_image_name}}" style="height:300px;object-fit:contain" />
					<h2>{{ $productsRecommendedItem->price }}</h2>
					<p>{{ $productsRecommendedItem->name }}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach
</div>
<!--/recommended_items-->