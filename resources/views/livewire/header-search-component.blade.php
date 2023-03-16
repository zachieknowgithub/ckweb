<!-- search area -->
<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
                            <form action=" {{route('product.search')}}">
							<input type="text"  name="key" placeholder="What are you searching for?">
							
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->