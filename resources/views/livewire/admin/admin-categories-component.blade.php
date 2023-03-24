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
						<h1>Admin Categories</h1>
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
                 <h1> All Categories</h1>
                 <div class="col-lg-8 offset-lg-2 text-center">
                        <a href="{{route('admin.categories.add')}}" class="boxed-btn">Add a category</a>
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
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td><a href="{{route('admin.categories.edit',['category_id'=>$category->id])}}" class="boxed-btn">Edit</a></td>
                                    <td><a href="#" class="boxed-btn" style="margin-left:20px;" onclick="deleteConfirmation({{$category->id}})">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{$categories -> links()}}
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
                        <button type="button" class="boxed-btn" onclick="deleteCategory()" >Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
        function deleteConfirmation(id)
                    {           
                        @this.set('category_id',id);   
                        $('#deleteConfirmation').modal('show');
                    }

        function closeConfirmation()
        {
            $('#deleteConfirmation').modal('hide');
        }

        function deleteCategory()
            {
                @this.call('deleteCategory');
                $('#deleteConfirmation').modal('hide');
            }
</script>




