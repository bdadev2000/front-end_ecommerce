<div class="category-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $key => $categoryItem)

            <li class="{{ $key == 0 ? 'active' : '' }}">
                <a href="#categoryItem{{$categoryItem->id}}" data-toggle="tab">{{ $categoryItem->name }}</a>
            </li>

            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categories as $keyCategoryItemProduct => $categoryItemProduct)
        <div class="tab-pane fade {{ $keyCategoryItemProduct == 0 ? 'active in' : '' }}" id="categoryItem{{$categoryItemProduct->id }}">
            @foreach($categoryItemProduct->products as $productsItem)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{config('app.base_url'). $productsItem->feature_image_path }}" alt="{{ $productsItem->feature_image_name }}" />
                                <h2>{{ $productsItem->price }}</h2>
                                <p>{{ $productsItem->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
<!--/category-tab-->