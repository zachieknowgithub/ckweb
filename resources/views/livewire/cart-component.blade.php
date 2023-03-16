<div id=main>
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	@if(Session::has('success_message'))
									<div class="alert alert-success">
										<Strong>Success | {{Session::get('success_message')}}</Strong>
									</div>
	@endif
								
	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
									<th>Delete</th>
								</tr>
							</thead>

							<tbody>
							@if(Cart::count() > 0)
								@foreach(Cart::content() as $item)
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{ asset('assets/img/products/product-img-')}}{{$item->model->id}}.jpg" alt=""></td>
									<td class="product-name">{{$item->model->name}}</td>
									<td class="product-price">$ {{$item->model->regular_price}}</td>
									<td class="product-quantity">
										<span>{{$item->qty}}</span>
									</td>
									<td class="product-total">$ {{$item->subtotal}}</td>
									<td>
										<div class="cart-buttons">
											<a class="boxed-btn" href="#" wire:click.prevent="destroy('{{$item->rowId}}')">Delete</a>
										</div>
									</td>
								</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
				@else 
									<p> No item in cart yet </p>
				@endif

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>${{Cart::subtotal()}}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Tax: </strong></td>
									<td>${{Cart::tax()}}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>Free shipping</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>${{Cart::total()}}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="{{route('shop.cart')}}" class="boxed-btn">Update Cart</a>
							<a href="#" wire:click.prevent="checkout" class="boxed-btn black">Check Out</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
</div>