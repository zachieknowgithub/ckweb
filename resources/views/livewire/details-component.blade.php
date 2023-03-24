<div id="main">
<!-- breadcrumb-section -->
       <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Watch 24h</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
    	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{asset('assets/img/products')}}/{{$product->image}}" alt="{{$product->name}}">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$product->name}}</h3>
						<p class="single-product-pricing"><span>${{$product->regular_price}}</span> </p>
						<p>{{$product->short_description}}</p>

							<a href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>About	: </strong>{{$product->description}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
			
				
				@foreach( $rproducts as $rproduct)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{route('product.details',[$product->slug])}}"><img src="{{asset('assets/img/products')}}/{{$rproduct->image}}" alt="{{ $rproduct->name}}"></a>
						</div>
						<h3>{{ $rproduct->name}}</h3>
						<p class="product-price">$ {{$rproduct->regular_price}} </p>
						<a href="#" wire:click.prevent="store({{$rproduct->id}},'{{$rproduct->name}}',{{$rproduct->regular_price}})" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
	<!-- end more products -->
