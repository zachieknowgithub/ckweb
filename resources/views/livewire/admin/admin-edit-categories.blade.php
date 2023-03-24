<div id="main">

<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Watch24h, hello {{ Auth::user() ->name}}!</p>
						<h1>Edit Categories</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="product-section mt-150 mb-150">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 offset-lg-2 text-center">
                 <h2> Edit Categories</h2>
                 </div>
                 <div class="col-lg-8 offset-lg-2 text-center">
                    <a href="{{route('admin.categories')}}" class="boxed-btn">All categories</a>
                 </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                    <form wire:submit.prevent="updateCategory">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control"  placeholder="Category name" wire:model="name" wire:keysup="generatingSlug"/>
                            @error('name')
                            <p>{{message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control"  placeholder="Category slug" wire:model="slug"/>
                            @error('slug')
                            <p>{{message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <button type="submit" class="boxed-btn">Edit</button>
                        </div>
                    </form>
             
                </div>
             </div>
         </div>
</div>

<style>
            nav svg{
                height: 20px;;
            }
            nav .hidden{
                display: block;
            }
</style>

