@extends('layout.master')

@section('title')
    Home Page
@endsection

@section('content')
	@include('components.header')
	
	@include('home.home-components.slider')
	<section>
		<div class="container">
			<div class="row">
				@include('components.siderbar')
				
				<div class="col-sm-9 padding-right">

					@include('home.home-components.features-item')
					
					@include('home.home-components.category-tab')
					
					@include('home.home-components.recommended_item')
					
				</div>
			</div>
		</div>
	</section>
	
	@include('components.footer')
	
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script>
	function addTocart(event){
		event.preventDefault();
		let urlCart = $(this).data('url');
		$.ajax({
			type:"GET",
			url:urlCart,
			dataType:'json',
			success:function(data){

			},
			error:function(){

			},
		})
	}
	$(function(){
		$(".add-to-cart").on('click',addTocart);
   });
</script>
@endsection