<div id="main">
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
							<li>
								<a href ="{{route('shop')}}">All</a>
							</li>
						@foreach ($categories as $category)
                            <li class ="active">
								<a href =" {{ route('shop.category',['slug'=>$category->slug])}}">{{$category->name}} </a>
							</li>
						@endforeach
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
						<p class="product-price"> {{$product -> regular_price}}</p>
						
						<a  class="cart-btn" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							
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
</div>

