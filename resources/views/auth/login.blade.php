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
<div class="content">
            <div class="bkgrimg">
                <form action="{{ route('login')}}" method="post">
                    @csrf
                    <div class="form">
                        <div class="divform">
                            <h3>Login </h3>
                            <div class="content_divform_formitem">
                                <input type="text" placeholder="Email" name="email" :value="old('email')" required autofocus ><br>
                            </div>
                            <div class="content_divform_formitem">
                                <input type="password" name="password"  placeholder="Password" required autocomplete="current-password"><br>
                            </div>
                            <div class="content_divform_formitem">
                                <input class="btn-submit" type="submit" name="login"  value="Login"><br>
                            </div>

                        </div>
                        <div class="content_divform_formhelp">
                            <a href ="{{ route('register')}}" class="content_divform_a">Register </a>
                            <a href ="{{ route('password.request')}}" class ="content_divform_a">Forgot password</a> 
                        </div>
                        <div>
                            <div class="content_divform_seperate">
                                <div class="content_divform_space"></div>
                                <span class="content_divform_span">Or</span>
                                <div class="content_divform_space"></div>
                            </div>
                            <div class="content_divform_social">
                                <button class="content_divform_btnsocial content_divform_flex content_divform_pd">
                                    <div class="content_divform_iconlogo">
                                        <div class="logosocial social_white_bgrfb social_white_fb"></div>
                                        <div class>Facebook</div>
                                    </div>
                                </button>
                                <button class="content_divform_btnsocial content_divform_flex content_divform_pd">
                                    <div class="content_divform_iconlogo">
                                        <div class="logosocial social_white_bgrgg social_white_gg"></div>
                                        <div class>Google</div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
</div>
</x-app-layout>