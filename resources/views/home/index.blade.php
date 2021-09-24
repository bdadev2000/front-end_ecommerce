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
