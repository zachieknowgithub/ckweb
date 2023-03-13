
   <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Watch 24h</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
						
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">G-Shock</li>
                            <li data-filter=".berry">Hải Triều</li>
                            <li data-filter=".lemon">Casio</li>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
			@foreach($products as $product)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{route('product.details',[$product->slug])}}"><img src="{{ asset('assets/img/products/product-img-') }}{{$product->id}}.jpg" alt=" {{$product ->name}}"></a>
						</div>
						<h3>{{$product->name}}</h3>
						<p class="product-price"> {{$product -> price}}</p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
			@endforeach

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						{{$products->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
