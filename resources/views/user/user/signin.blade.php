@extends('user.index')
@section('content')


<style>


	.textfill {
		height: 45px;
		background-color: #fff;
		color: #414141;
		border-radius: 50px;
		transition: 0.9s;
		border: 2px solid #f1f1f1;
		font-size: 15px;
		font-weight: normal;
	}

	.or-seperator {
		margin: 50px 0 15px;
		text-align: center;
		border-top: 1px solid #e0e0e0;

	}
	.or-seperator b {
		padding: 0 10px;
		width: 40px;
		height: 40px;
		font-size: 16px;
		text-align: center;
		line-height: 40px;
		background: #fff;
		display: inline-block;
		border: 1px solid #e0e0e0;
		border-radius: 50%;
		position: relative;
		top: -22px;
		z-index: 1;
	}
	.social-btn .btn {
		color: #fff;
		margin: 10px 0 0 30px;
		font-size: 15px;
		width: 55px;
		height: 55px;
		line-height: 45px;
		border-radius: 50%;
		font-weight: normal;
		text-align: center;
		border: none;
		transition: all 0.4s;
	}	
	.social-btn .btn:first-child {
		margin-left: 0;
	}
	.social-btn .btn:hover {
		opacity: 0.8;
	}
	.social-btn .btn-primary {
		background: #507cc0;
	}
	.social-btn .btn-info {
		background: #64ccf1;
	}
	.social-btn .btn-danger {
		background: #df4930;
	}
	.social-btn .btn i {
		font-size: 20px;
	}

</style>




	<div class="col-sm-12 col-12" style="background-color: #f7f7f7; margin-top: -20px; ">
	<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 pb-5">
		<div class="container-fluid">
			<div class="col-sm-12 col-12 bg-white p-3 loginback">
				<form method="" >
					<h5 style="font-size: 20px; color:#585858;">Sign In your Account</h5><hr>
					<input type="hidden" name="_token" value="gahQH0Lh2yaGr6zJY223JJyA0k73WI5Nit0ch3oq">          
					<div class="row p-2">
						<div class="form-group mform col-sm-12">
							<label>Email/Mobile</label>
							<input type="text" class="form-control textfill" name="email" placeholder="Email/Mobile" required="" >
						</div>

						<div class="form-group mform col-sm-12">
							<label>Password</label>
							<input type="Password" class="form-control textfill" name="password" placeholder="Password" required="" >
						</div>

						<div class="form-group mform col-sm-12">
							<div class="col-md-6">
								<div class="form-check" style="margin-left: 12px;">
									<input class="form-check-input" type="checkbox" name="remember" >

									<label class="form-check-label" for="remember">
										Remember Me
									</label>
								</div>
							</div>
						</div>

					</div>

					<div class="form-group mform col-sm-12">
						<button type="submit" class="btn btn-dark btn-lg btn-block signin-btn" style="border-radius: 0px;">SIGN IN</button>
					</div>
					

					<div class="or-seperator"><b>or</b></div>
					<center>
						<p class="hint-text" style="margin-top: -25px;">Sign in with your social media account</p>
						<div class="social-btn text-center" style="margin-bottom: 20px; margin-top: -15px;">
							<a href="#" class="btn btn-primary btn-lg" title="Facebook"><i class="fab fa-facebook-f"></i></a>
							<a href="#" class="btn btn-info btn-lg" title="Twitter"><i class="fab fa-twitter"></i></a>
							<a href="#" class="btn btn-danger btn-lg" title="Google"><i class="fab fa-google"></i></a>
						</div>
					</center>
				</form>

				<div class="text-center small"><a href="#">Forgot Your password?</a></div>
				<div class="text-center small">Don't have an account? <a href="#">Sign up</a></div>
			</div>
		</div>
	</div>
</div>







@endsection