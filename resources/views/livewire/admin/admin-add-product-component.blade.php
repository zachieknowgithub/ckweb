
<div id="main">
    <style>
            nav svg{
                height: 20px;;
            }
            nav .hidden{
                display: block;
            }
        </style>
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Watch24h, hello {{ Auth::user() ->name}}!</p>
						<h1>Add Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="product-section mt-150 mb-150">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 offset-lg-2 text-center">
                 <h2> Add Products</h2>
                 </div>
                 <div class="col-lg-8 offset-lg-2 text-center">
                    <a href="{{route('admin.products')}}" class="boxed-btn">All Products</a>
                 </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                    <form wire:submit.prevent="addProduct">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Category name" wire:model="name" wire:keysup="generatingSlug"/>
                            @error('name')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="slug">Slug</label>
                            <input class="form-control" type="text" name="slug" placeholder="Category slug" wire:model="slug"/>
                            @error('slug')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="short_description">Short Description</label>
                            <textarea name="short_description" class="form-control"  placeholder="Enter product's short description" wire:model="short_description"></textarea>
                            @error('short_description')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control"  placeholder="Enter product's description" wire:model="description"></textarea>
                            @error('description')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="regular_price">Regular Price</label>
                            <input type="text" name="regular_price" class="form-control"  placeholder="Enter product's regular price" wire:model="regular_price"/>
                            @error('regular_price')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="sale_price">Sale Price</label>
                            <input type="text" name="sale_price" class="form-control"  placeholder="Enter product's sale price" wire:model="sale_price"/>
                            @error('sale_price')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="SKU">SKU</label>
                            <input type="text" name="SKU" class="form-control"  placeholder="Enter product's SKU" wire:model="SKU"/>
                            @error('SKU')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="stock_status">Stock</label>
                           <select name="stock_status" class="form-control"  wire:model="stock_status">
                                <option value="instock">Instock</option>
                                <option value="outofstock">Out of stock</option>
                           </select>
                            @error('stock_status')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="featured">Featured</label>
                           <select name="featured" class="form-control"  wire:model="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                           </select>
                            @error('featured')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" class="form-control"  placeholder="Enter product's quantity" wire:model="quantity"/>
                            @error('quantity')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control"  wire:model="image"/>
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" width="120" />
                            @endif
                            @error('image')
                            <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for=" category_id">Category</label>
                           <select name="category_id" class="form-control"  wire:model="category_id">
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                           </select>
                            @error('category_id')
                            <p>{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <button type="submit" class="boxed-btn">Add</button>
                        </div>


                    </form>
             
                </div>
             </div>
         </div>
</div>
