@extends('layout.master')

@section('title')
Shopping Cart
@endsection

@section('content')


<div class="cart_wrapper">
<section id="cart_items">
	<div class="container carts" data-url="{{ route('deleteCart') }}">
			<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed update_cart_url" data-url="{{ route('updateCart') }}">
				<thead>
					<tr class="cart_menu">
						<td>#</td>
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td style="padding-left:120px">Action</td>
					</tr>
				</thead>
				<tbody>
					@php
						$total = 0;
					@endphp

					@foreach($carts as $id => $cartItem)

					@php 
						$total += $cartItem['price'] * $cartItem['quantity'];
					@endphp
					<tr style="border-top:2px solid #e6e4df";>
						<td>
							{{ $id }}
						</td>
						<td class="cart_product">
							<a href="#"><img src="{{ config('app.base_url') . $cartItem['image'] }}" alt="" style="width:100px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $cartItem['name'] }}</a></h4>
						</td>
						<td class="cart_price">
							<p>${{ number_format($cartItem['price']) }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cartItem['quantity'] }}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">${{ number_format($cartItem['price'] * $cartItem['quantity']) }}</p>
						</td>
						<td class="cart_total">
							<a data-id="{{ $id }}" class="btn btn-default update cart_update" href="">Update</a>
							<a data-id="{{ $id }}" class="btn btn-default update cart_deleted" href="">Delete</a>
						</td>
					</tr>
					@endforeach
				
				</tbody>
			</table>
		</div>
		
		
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>${{ number_format($total) }}</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>${{ number_format($total +2) }}</span></li>
					</ul>
					<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section>

</div>


@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script>
	function updateCart(event){
		event.preventDefault();
		let urlUpdateCart = $(".update_cart_url").data("url");
		let id = $(this).data("id");
		let quantity = $(this).parents("tr").find("input.cart_quantity_input").val();
		$.ajax({
			type:"GET",
			url:urlUpdateCart,
			data:{id:id,quantity:quantity},
			success:function(data){
				if(data.code === 200){
					$('.cart_wrapper').html(data.cart_component);
					alert("Updated success");
				}
			},
			error:function(){

			},
		});
	};
	function deleteCart(event){
		event.preventDefault();
		let id = $(this).data("id");
		let urlDelete = $(".carts").data("url");
		$.ajax({
			type:"GET",
			url:urlDelete,
			data:{id:id,},
			success:function(data){
				if(data.code === 200){
					$('.cart_wrapper').html(data.cart_component);
					alert("Deleted success");
				}
			},
			error:function(){

			},
		});
	};
	$(function(){
		$(".cart_update").on('click',updateCart);
		$(".cart_deleted").on('click',deleteCart);
   });
</script>
@endsection