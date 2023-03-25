<div id="main">
   <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Watch24h</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form wire:submit.prevent="placeOrder" >
						        		<p><input type="text" placeholder="First Name" wire::model="firstname"></p>
										@error('firstname') <span class="text-danger"> {{$message}} </span> @enderror
										<p><input type="text" placeholder="Last Name" wire::model="lastname"></p>
										@error('lastname') <span class="text-danger"> {{$message}} </span> @enderror
						        		<p><input type="text" placeholder="Mobile number" wire::model="mobile"></p>
										@error('mobile') <span class="text-danger"> {{$message}} </span> @enderror
										<p><input type="email" placeholder="Email" wire::model="email"></p>
										@error('email') <span class="text-danger"> {{$message}} </span> @enderror
						        		<p><input type="text" placeholder="Address" wire::model="address"></p>
										@error('address') <span class="text-danger"> {{$message}} </span> @enderror
						        		<p><input type="tel" placeholder="City" wire::model="city"></p>
										@error('city') <span class="text-danger"> {{$message}} </span> @enderror
										<p><input type="tel" placeholder="Province" wire::model="province"></p>
										@error('province') <span class="text-danger"> {{$message}} </span> @enderror
										<p><input type="tel" placeholder="Country" wire::model="country"></p>
										@error('country') <span class="text-danger"> {{$message}} </span> @enderror
										<p><input type="tel" placeholder="Zip code" wire::model="zipcode"></p>
										@error('zipcode') <span class="text-danger"> {{$message}} </span> @enderror
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						        	Payment method
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
									<Label>
						        	<input name="payment-method" value="cod" type="radio" wire:model="paymentmode">
									@error('paymentmode') <span class="text-danger"> {{$message}} </span> @enderror
									 Cash on delivery 
						        </div>
								</Label>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Total</td>
								</tr>
								@foreach(Cart::content() as $item)
								<tr>
									<td>{{$item->model->name}}</td>
									<td>${{$item->model->regular_price}}</td>
								</tr>
								@endforeach
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>${{Cart::subtotal()}}</td>
								</tr>
								<tr>
									<td>Tax: </td>
									<td>${{Cart::tax()}}</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>Free Shipping</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>${{Cart::total()}}</td>
								</tr>
							</tbody>
						</table>
						<a href="#" class="boxed-btn">Place Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
</div>

