
<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			<!--category-productsr-->
			@foreach($categories as $category)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						@if($category->categoryChildrent->count() > 0)
						<a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->id }}">
							<span class="badge pull-right">
								
									<i class="fa fa-plus"></i>
								
							</span>
							<a href="{{ route('category.product',['slug'=> $category->slug,'id'=>$category->id]) }}">
							{{ $category->name }}
							</a>
						</a>
						@else 
						<a href="{{ route('category.product',['slug'=> $category->slug,'id'=>$category->id]) }}">
						<span class="badge pull-right">
						</span>
						{{ $category->name }}
						</a>
						@endif
					</h4>
				</div>
				
				<div id="{{ $category->id }}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach($category->categoryChildrent as $categoryChildrentItem)
							<li><a href="{{ route('category.product',['slug'=> $categoryChildrentItem->slug,'id'=>$categoryChildrentItem->id]) }}">{{ $categoryChildrentItem->name }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
		<!--/category-products-->
	</div>
</div>