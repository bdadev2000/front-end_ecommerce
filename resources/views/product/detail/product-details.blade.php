@extends('layout.master')

@section('title')
   Product Detail
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/product-detail.css') }}">
@endsection

@section('content')
	@include('components.header')
	
	<section>
		<div class="container">
			<div class="row">
				@include('components.siderbar')		
				<div class="col-sm-9 padding-right">
					<div class="product-details">
						<div class="col-sm-5">
							<div class="view-product">
								<div class="shadow">
									<img class="product_img" src="{{ config('app.base_url').$product->feature_image_path}}" alt="{{$product->feature_image_name}}" />
								</div>
							</div>
							<div class="row card-product-detail">
								@foreach($product->productImage as $item)
									<div class="card-detail">
										<img src="{{ config('app.base_url'). $item->image_path }}" alt="" style="width: 100%;">
									</div>
								@endforeach
							</div>
						</div>
						<div class="col-sm-5">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{ $product->name }}</h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>${{ number_format($product->price) }}</span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b>	
								@foreach($categortBrand as $category)
									@if($category['id'] == $product['category_id'])
										{{ $category['name'] }}
									@endif
								@endforeach
								</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
@endsection
