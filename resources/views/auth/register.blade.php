<x-app-layout>
        <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Watch24h</p>
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
<div class="contentlg">
            <div class="bkgrimg">
                <form action="{{ route('register')}}" method="post">
                    @csrf
                    <div class="form">
                        <div class="divform">	
                            <h3>Register</h3>
							<div class="content_divform_formitem">
								<label for="fn">Email</label>
                                <input type="text" name="email"  placeholder="Email"><br>
                            </div>
                            <div class="content_divform_formitem">
								<label for="userlg">Name</label>
                                <input type="text" placeholder="Name" name="name" ><br>
                            </div>
                            <div class="content_divform_formitem">
							<label for="userpw1">Password</label>
                                <input type="password" name="password"  placeholder="Password"><br>
                            </div>
							<div class="content_divform_formitem">
							<label for="userpw2">Confirm password </label>
                                <input type="password" name="password_confirmation"  placeholder="Confirm password"><br>
                            </div>
                            <div class="content_divform_formitem">
                                <input class="btn-submit" type="submit" name="register"  value="Register"><br>
                            </div>
							<div class="content_divform_formhelp">
								<a href="{{ route('login')}}" class="content_divform_a">Login  </a><br>
							</div>
						</div>
					</div>
				</form>
			</div>
</div>			
</x-app-layout>