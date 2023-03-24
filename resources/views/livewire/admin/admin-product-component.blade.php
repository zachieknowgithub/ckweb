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
						<h1>Admin Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="product-section mt-150 mb-150">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 offset-lg-2 text-center">
                 <div class="section-title">	
                 <h1> All Products</h1>
                 <div class="col-lg-8 offset-lg-2 text-center">
                        <a href="{{route('admin.products.add')}}" class="boxed-btn">Add a product</a>
                 </div>
                </div>
                <div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{asset('assets/img/products')}}/{{$product->image}}" alt="{{$product->name}}" width="40"/></td>
                                    <td>{{$product->stock_status}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td><a href="{{route('admin.products.edit',['product_id'=>$product->id])}}" class="boxed-btn">Edit</a></td>
                                    <td><a href="#" onclick="deleteConfirmation({{$product->id}})"class="boxed-btn" style="margin-left:20px;" >Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{$products -> links()}}
                </div>
         </div>
         </div>
</div>
</div>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <h4> Do you want to delete this category?</h4>
                        <button type="button" class="boxed-btn" onclick="closeConfirmation()">Cancel</button>
                        <button type="button" class="boxed-btn" onclick="deleteProduct()" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
        function deleteConfirmation(id)
                    {           
                        @this.set('product_id',id);   
                        $('#deleteConfirmation').modal('show');
                    }

        function closeConfirmation()
        {
            $('#deleteConfirmation').modal('hide');
        }

        function deleteProduct()
            {
                @this.call('deleteProduct');
                $('#deleteConfirmation').modal('hide');
            }
</script>




