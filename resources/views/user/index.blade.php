@php
$setting = DB::table('settinginformation')->first();
$contact = DB::table('contactinformation')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ $setting->title }}</title>
	<link rel="icon" type="image/x-icon" href="{{url($setting->favicon)}}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/plugins/slick-1.8.0/slick.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/product_responsive.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/contact_responsive.css">
	<link href="{{asset('public/frontend')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">


	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/styles/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('public/backend')}}/assets/css/toast.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

</head>

<body >

	<style type="text/css">


/* width */
::-webkit-scrollbar {
	width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
	background: #fff; 
}

/* Handle */
::-webkit-scrollbar-thumb {
	background: #f90; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
	background: #555; 
}




/* Zoom In #1 */
.img_hover figure img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .20s ease-in-out;
	transition: .3s ease-in-out;
}
.img_hover figure:hover img {
	-webkit-transform: scale(1);
	transform: scale(1.3);
}



.card_div
{
	background-color:#FFFFFF;
	padding:0px;
	margin-top:0px;
	position: fixed;
	top:0px;
	right:-100%;
	z-index:1000;
	height:100vh;
	width:350px;
	box-shadow: -5px 0px 5px -1px rgba(0,0,0,0.44);
	-webkit-box-shadow: -5px 0px 5px -1px rgba(0,0,0,0.44);
	-moz-box-shadow: -5px 0px 5px -1px rgba(0,0,0,0.44);
}

.card-header{
	color: #000;
	border-radius:0px;
	border:none;
	font-weight:600;
}

.card-body{
	/*	overflow-x:hidden; 
		overflow-y:scroll;*/
	}
	.card-product-div{
		border-bottom:1px solid lightgray;

	}
	.card-text
	{
		font-size:13px;
	}

	.card-text-1{
		font-size:15px;
	}

	.card-text-1 span{
		color:#E55B48;
	}

	.card-img{
		padding:4px;
	}

	#card_bottom{
		bottom:0;
		position:absolute;
		width: 100%;
	}
	#card_bottom2
	{
		background-color: #ff5500;
	}
	#card_bottom2 a{
		color:white
	}


	.class
	{ animation: animate 1s forwards;
	}
	@keyframes animate 
	{ 0%
		{ right: 0;
		} 100%
		{ right: -100%;
		}
	}
	.class2
	{ animation: animate2 1s forwards;
	}
	@keyframes animate2 
	{ 0%
		{ right: -100%;
		} 100%
		{ right: 0px;
		}
	}

</style>



<div class="super_container">

	<!-- Header -->


	<header class="header">
		<!-------top header------>
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend')}}/images/phone.png" alt=""></div>{{ $setting->phone }}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend')}}/images/mail.png" alt=""></div><a href="mailto:{{ $setting->email }}" style="text-decoration: none;">{{ $setting->email }}</a></div>
						<div class="top_bar_content ml-auto">
							Hotline : 096428875461 ( 9:00 AM to 9:00 PM )
							<div class="top_bar_user">
								<div class="user_icon">
									<img src="{{asset('public/frontend')}}/images/user.svg" alt="">
								</div>
								@if(Auth::check())
								<div>
									<a href="{{url('userdashboard')}}" style="text-decoration: none;">{{ Auth()->user()->name }}</a>
								</div>
								@else
								<div>
									<a class="orders" data-toggle="modal" data-target="#staticBackdrop" href="">Register</a>
								</div>
								
								<div>
									<a class="orders" data-toggle="modal" data-target="#staticBackdrop" href="">Sign in</a>
								</div>
								@endif





							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div>
			<div class="header_main">
				<div class="container">
					<div class="row" >

						<!-- Logo -->
						<div class="col-lg-3 col-sm-3 col-3 order-1">
							<div class="logo_container">
								<div class="logo"><a href="{{'/eshop'}}"><img src="{{ url($setting->image)}}" class="img-fluid"></a></div>
							</div>
						</div>

						<!-- Search -->
						<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
							<div class="header_search">
								<div class="header_search_content">
									<div class="header_search_form_container">

										<form action="{{url('serachproduct')}}" class="header_search_form clearfix" method="get">
											@csrf
											<input type="search" name="searchdata" required="required" class="header_search_input" placeholder="Search for products...">
											<button type="submit" class="header_search_button trans_300" value="Submit" style="background: black;"><img src="{{asset('public/frontend')}}/images/search.png" alt="" ></button>
										</form>

									</div>
								</div>
							</div>
						</div>

						<!-- Wishlist -->
						<div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
							<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist d-flex flex-row align-items-center justify-content-end">
									<div class="wishlist_icon"><img src="{{asset('public/frontend')}}/images/heart.png" alt=""></div>
									<div class="wishlist_content">
										<div class="wishlist_text"><a href="#">Wishlist</a></div>
										<div class="wishlist_count">115</div>
									</div>
								</div>

								<!-- Cart -->
								<div class="cart">
									<div class="cart_container d-flex flex-row align-items-center justify-content-end">
										<div class="cart_icon">
											<img src="{{asset('public/frontend')}}/images/cart.png" alt="">
											<div class="cart_count"><span>10</span></div>
										</div>
										<div class="cart_content">
											<div class="cart_text"><a href="#">Cart</a></div>
											<div class="cart_price">$85</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			<!-- Main Navigation bar -->
			{{-- <div class="container-fluid" > --}}
				<nav class="main_nav" style="position:sticky; top:0px; z-index:600;">
					<div class="container">
						<div class="row">
							<div class="col">

								<div class="main_nav_content d-flex flex-row">

									<!-- Categories Menu -->

									<div class="cat_menu_container" style="background-color: #f90;">
										<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
											<div class="cat_burger"><span></span><span></span><span></span></div>
											<div class="cat_menu_text" style="color: black;"><strong>categories</strong></div>
										</div>

										<ul class="cat_menu">


											@php
											$item=DB::table('iteminformation')->orderBy('id','ASC')->where('status',1)->get();
											$category=DB::table('categoryinformation')->where('status',1)->get();
											$sub_category=DB::table('subcategoryinformation')->where('status',1)->get();
											@endphp

											@if(isset($item))
											@foreach($item as $itemview)

											<li class="hassubs"><a href="{{url('item/'.$itemview->id)}}" style="text-decoration: none;">{{$itemview->item_name}} <i class="fas fa-chevron-right"></i></a>

												<ul>
													@if(isset($category))
													@foreach($category as $categoryview)
													@if($itemview->id == $categoryview->item_id)

													<li class="hassubs"><a href="{{url('category/'.$categoryview->id)}}" style="text-decoration: none;">{{$categoryview->category_name}}<i class="fas fa-chevron-right"></i></a>

														<ul>
															@if(isset($sub_category))
															@foreach($sub_category as $sub_ct)
															@if($categoryview->id == $sub_ct->category_id)
															<li><a href="{{url('subcategory/'.$sub_ct->id)}}" style="text-decoration: none;">{{$sub_ct->subcategory_name}}</a></li>
															@endif
															@endforeach
															@endif
														</ul>



													</li>
													@endif
													@endforeach
													@endif													
												</ul>
											</li>

											@endforeach
											@endif
										</ul>
									</div>

									<!-- Main Nav Menu -->

									<div class="main_nav_menu ml-auto">
										<ul class="standard_dropdown main_nav_dropdown">
											<li><a href="{{url('/')}}" style="text-decoration: none;">Home<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="{{url('allproduct')}}" style="text-decoration: none;">All Product<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="{{url('aboutus')}}" style="text-decoration: none;">About<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="{{url('contactus')}}" style="text-decoration: none;">Contact<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</div>

									<!-- Menu Trigger -->

									<div class="menu_trigger_container ml-auto">
										<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
											<div class="menu_burger">
												<div class="menu_trigger_text" style="color: black;">menu</div>
												<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</nav>

			{{-- 			</div> --}}



			<div class="page_menu">
				<div class="container">
					<div class="row">
						<div class="col">

							<div class="page_menu_content">

								<div class="page_menu_search">
									<form action="#">
										<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
									</form>
								</div>
								<ul class="page_menu_nav">
									<li class="page_menu_item has-children">
										<a href="#">Currency<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item">
										<a href="#">Home<i class="fa fa-angle-down"></i></a>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
											<li class="page_menu_item has-children">
												<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
												<ul class="page_menu_selection">
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item"><a href="{{url('allproduct')}}">All Product<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
								</ul>

								<div class="menu_contact">
									<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>{{ $setting->phone }}</div>
									<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</header>





		@yield('content')


		<div class="col-sm-12 col-12 pb-5 pt-5" style="background-color: #fff;">
			<div class="container-fluid">
				<div class="row">

					<!-- Char. Item -->
					<div class="col-lg-2 col-md-6 char_col">

						<div class="char_item d-flex flex-row align-items-center justify-content-start">
							<div class="char_icon"><i class="fa fa-truck" style="font-size:24px; margin-left: -20px;"></i></div>
							<div class="char_content" style="margin-left: -5px;">
								<div class="char_title">Express Shipping</div>
								<div class="char_subtitle">Fast reliable delivery
								</div>
							</div>
						</div>
					</div>

					<!-- Char. Item -->
					<div class="col-lg-2 col-md-6 char_col ">

						<div class="char_item d-flex flex-row align-items-center justify-content-start">
							<div class="char_icon"><i class="fa fa-phone" style="font-size: 24px; margin-left: -20px;"></i></div>
							<div class="char_content" style="margin-left: -5px;">
								<div class="char_title">
								Support 24/7</div>
								<div class="char_subtitle">Feel free to Call Us</div>
							</div>
						</div>
					</div>

					<!-- Char. Item -->
					<div class="col-lg-2 col-md-6 char_col ">

						<div class="char_item d-flex flex-row align-items-center justify-content-start">
							<div class="char_icon"><i class="fa fa-cart-plus" style="font-size: 24px; margin-left: -20px;"></i></div>
							<div class="char_content" style="margin-left: -5px;">
								<div class="char_title">Affordable Prices</div>
								<div class="char_subtitle">Product Prices for Max Savings</div>
							</div>
						</div>
					</div>

					<!-- Char. Item -->
					<div class="col-lg-2 col-md-6 char_col ">

						<div class="char_item d-flex flex-row align-items-center justify-content-start">
							<div class="char_icon"><i class="fa fa-credit-card" style="font-size: 24px; margin-left: -20px;"></i></div>
							<div class="char_content" style="margin-left: -5px;">
								<div class="char_title">Secure Payment</div>
								<div class="char_subtitle">100% Secure Payment</div>
							</div>
						</div>
					</div>
					<!-- Char. Item -->
					<div class="col-lg-2 col-md-6 char_col ">

						<div class="char_item d-flex flex-row align-items-center justify-content-start">
							<div class="char_icon"><i class="fa fa-gift" style="font-size: 24px; margin-left: -20px;"></i></div>
							<div class="char_content" style="margin-left: -5px;">
								<div class="char_title">Surprise Gifts</div>
								<div class="char_subtitle">Refer a Friend</div>
							</div>
						</div>
					</div>

					<!-- Char. Item -->
					<div class="col-lg-2 col-md-6 char_col ">

						<div class="char_item d-flex flex-row align-items-center justify-content-start">
							<div class="char_icon"><i class="fa fa-rocket" style="font-size: 24px; margin-left: -20px;"></i></div>
							<div class="char_content" style="margin-left: -5px;">
								<div class="char_title">Cash on Delivery</div>
								<div class="char_subtitle">Dedicated Support</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer" style="background: #111723; ">
			<div class="col-sm-12 col-12">
				<div class="container-fluid" >
					<div class="row">

						<div class="col-lg-3 footer_col">
							<div class="footer_column footer_contact">
								<div class="logo_container">
									<div class="logo"><a href="#"><img src="{{ url($setting->image)}}" class="img-fluid" style="max-height: 100px; margin-left: -11px;"></a></div>
								</div>
								<div class="footer_title">Got Question? Call Us 24/7</div>
								<div class="footer_contact_text">

									<p>{!! $contact->details!!}</p>
								</div>

							</div>
						</div>

						<div class="col-lg-2 offset-lg-2" >
							<div class="footer_column" >
								<div class="footer_title">Menu</div>
								<ul class="footer_list">
									<li><a href="{{url('aboutus')}}">About us</a></li>
									<li><a href="#">Career</a></li>
									<li><a href="{{url('FAQ')}}">FAQ</a></li>
									<li><a href="{{url('how-to-buy')}}">Purchasing Guide</a></li>
									<li><a href="{{url('termcondition')}}">Term & Condition</a></li>
									<li><a href="{{url('privacypolicy')}}">Privacy Policy</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-2 ">
							<div class="footer_column">
								<div class="footer_title">Customer Care</div>
								<ul class="footer_list">
									<li><a href="#">My Account</a></li>
									<li><a href="#">Order Tracking</a></li>
									<li><a href="#">Wish List</a></li>
									<li><a href="#">Customer Services</a></li>
									<li><a href="#">Returns / Exchange</a></li>
									<li><a href="#">FAQs</a></li>
									<li><a href="#">Product Support</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-2">
							<div class="footer_title">Find Us</div>
							<div class="mapouter">
								<div class="gmap_canvas pt-3">

									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.4840842828166!2d90.36892971481703!3d23.83693818454676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1a6ee7a7339%3A0x7a8f026abc0c0c4f!2sSkill%20Based%20Information%20Technology%20-%20SBIT!5e0!3m2!1sen!2sbd!4v1644415108100!5m2!1sen!2sbd" width="300" height="300" id="gmap_canvas" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
									<style>
										.mapouter {
											position: relative;
											text-align: right;
											height: 207px;
											width: 227px;
										}

									</style><a href="https://www.embedgooglemap.net/">embed map on website</a>
									<style>
										.gmap_canvas {
											overflow: hidden;
											background: none !important;
											height: 207px;
											width: 227px;
										}

									</style>
								</div>
							</div>

							<div class="footer_social">
								<ul>
									<li><a href="{{ url($setting->facebook)}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="{{ url($setting->twitter)}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
									<li><a href="{{ url($setting->youtube)}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
									<li><a href="{{ url($setting->instagram)}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
				<div class="row justify-content-center" style="margin-top: 10px;">
					<div class="col-md-10">
						<img src="{{asset('public/frontend')}}/images/payment.png" class="img-fluid">
					</div>
				</div>
			</div>

		</footer>

		<!-- Copyright -->

	</div>

	<div style="background: black; height: 57px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 mt-3">
					<center>
						<p style="color: white;">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script>
							eshop.com All rights reserved
						</p>
					</center>
				</div>
			</div>
		</div>
	</div>









	<!DOCTYPE html>
	<html>
	<head>
		<title>Modal</title>
	</head>
	<body>
		<style>
			.mform label{
				color: #414141;
				font-weight: normal;
				font-size: 15px;
			}

			.textfill{
				height: 50px;
				background-color: #fff;
				color: #414141;
				border-radius: 0px;
				transition: 0.9s;
				border:2px solid #f1f1f1;
				font-size: 15px;
				font-weight: normal;
			}

			.textfill:focus{
				box-shadow: none;
				border:2px solid #414141;
			}

			.textfill2{
				background-color: #fff;
				border-radius: 0px;
				border:2px solid #f1f1f1;
				font-size: 15px;
				color: #414141;
				transition: 0.9s;
			}

			.textfill2:focus{
				box-shadow: none;
				border:2px solid #585858;
			}

			.list-group .headlist{
				background: #585858;
				color: #fff;
				font-size: 22px;
				border-radius: 0px;
				border:none;
				line-height: 35px;
				text-transform: uppercase;
			}

			.loginback{
				box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.10) !important;
			}

			.logbutton{
				background-color: #dc3545;
				color: #fff;
				padding: 10px;
				border-radius: 0px;
				width: 50%;
				font-weight: bold;
				cursor: pointer;
				border:none;
			}

			.logbutton:focus{
				background-color: #dc3545;
				color: #fff;
				box-shadow: none;
				border:none;
			}

			.loginback h5{
				font-size: 20px;
				font-weight: bold;
				color: #585858;
			}

			.loginback a{
				text-decoration: none;
				color: gray;
				font-size: 13px;
				transition: 0.5s;
			}



			.loginback a:hover{
				text-decoration: none;
				color: #dc3545;
			}

			.nav .nav-link{
				font-size: 14px;
				color: #414141;
				transition: 0.4s;
				padding: 15px 30px;
				background: #fff;
				border: 1px solid #f1f1f1;
				border-radius: 0px;
				text-transform: uppercase;
			}

			.nav .nav-link:focus{
				color: #fff;
			}

			.nav .nav-link.active {
				color: #fff;
				background: #343a40;
			}
		</style>
		<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Login/Register</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">

						<div class="col-lg-12 col-12 mt-4">
							<div class="container-fluid">
								<ul class="nav nav-pills nav-justified " id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#Sellers" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#Buyers" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="Sellers" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="col-lg-12 col-md-12 col-sm-10 col-12 pt-4 pb-5">
									<div class="container-fluid">
										<div class="col-sm-12 col-12 p-4 bg-white loginback">
											<h5 class="text-uppercase">Login your Account</h5><hr>
											<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
												@csrf
												<div class="row p-2">
													<div class="form-group mform col-sm-12">
														<label>Email/Mobile</label>
														<input id="email" type="email" class="form-control textfill @error('email') is-invalid @enderror" name="email" placeholder="Email/Mobile" value="{{ old('email') }}" required autocomplete="email" autofocus>
														@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
													<div class="form-group mform col-sm-12">
														<label>Password</label>
														<input type="password" id="password" class="form-control textfill @error('password') is-invalid @enderror" name="password" placeholder="Password" required="" >
														<i class="far fa-eye" id="togglePassword" style="cursor: pointer;margin-top:12px;"></i>
														@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
													<div class="form-group mform col-sm-12">
														<div class="col-md-6 offset-md-4">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" name="remember" > 
																<label class="form-check-label" for="remember">Remember Me </label>
															</div>
														</div>
													</div>
													<div class="form-group mform col-sm-12"> 
														<a href="forgot_password.html" style="text-align:right">Forgot Account ?</a>
													</div>
													<div class="form-group mform col-sm-12">
														<center>
															<input type="submit" id="btn" value="LOGIN" class="form-control logbutton w-50" style="background:#0a0a0a;">
														</center>
													</div>
												</div>
											</form>

										</div>
									</div>
								</div>
							</div>



							<div class="tab-pane fade" id="Buyers" role="tabpanel" aria-labelledby="pills-profile-tab">
								<div class="col-lg-12 col-12 pt-4 pb-5">
									<div class="container-fluid">
										<div class="col-sm-12 col-12 p-4 bg-white loginback">
											<h5 class="text-uppercase">User Registation</h5><hr>
											<form method="post" action="{{ url('register') }}" enctype="multipart/form-data" > 
												@csrf
												<div class="row p-2">
													<div class="form-group mform col-sm-12">
														<label>Name</label>
														<input type="text" class="form-control textfill" name="name" placeholder="Name" required="" value="">
													</div>
													<div class="form-group mform col-sm-12">
														<label>Email</label>
														<input type="email" class="form-control textfill" name="email" placeholder="Email"  value="">
													</div>
													<div class="form-group mform col-sm-12">
														<label>Phone</label>
														<input type="text" class="form-control textfill" name="phone" id="phone" placeholder="Mobile" value="" required="">
													</div>
													<div class="form-group mform col-sm-12">
														<label>Password</label>
														<input type="Password" class="form-control textfill" name="password" id="password" placeholder="Password" required="" value="" onkeyup="checkpassword()">
														<span id="p_sms"></span></div>

														<div class="form-group mform col-sm-12">
															<label>Address</label>
															<textarea class="form-control textfill2" rows="3" placeholder="Address" name="address" required=""></textarea>
														</div>

														<div class="form-group mform col-sm-12">
															<input type="submit" id="submit" value="SIGN UP" class="d-block form-control logbutton w-50" style="background:#0a0a0a;couser:pointer">
														</div>

													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>

			</div>

		</body>
		</html>


		<!-----Cart Start----------->

		<center>
			<div class="addtocart" id="cat_box">
				<a id="myBtns">
					<i class="fa fa-cart-plus" style="font-size: 30px;"></i>
					<br>
					<span style="color: #fff;"><span id="cartqunt">{{Cart::count()}}</span> ITEMS</span>
					<br>
					<span><span id="cartamount"></span>{{Cart::subtotal()}} TK</span>
				</a>
			</div>
		</center>

		<!-----card defult hide div----------->
		<div  id="cat_div"  class="card_div" >


			<div class="card-header bg-light" >
				<div class="row">
					<div class="col-sm-4 col-4">
						<span style="My Cart">My Cart</span>
					</div>
					<div class="col-sm-4 col-4 ">
						<a href="{{url('allclear')}}" class="btn btn-danger btn-sm" style="padding:0px; font-family:monospace;">All Clear</a>
					</div>
					<div class="col-sm-4 col-4">
						<span id="cat_view" class="fa fa-close float-right"></span>
					</div>



				</div>
			</div>


			@php
			$cart =Cart::content();
			@endphp

			<!------ product show -------->
			<div class="card-body p-0" id="cardbody" >
				<div id="cartshow">

					@if(isset($cart))
					@foreach($cart as $cartview)

					<div class="col-sm-12 col-12 mt-2 p-0 card-product-div">
						<div class="row">

							<div class="col-sm-3 col-3">
								<center>
									<img src="{{url($cartview->options->image) }}" class="img-fluid card-img"/>
								</center>
							</div>

							<div class="col-sm-7 col-7">
								<span class="card-text">{{$cartview->name}}</span><br>
								<span class="card-text-1">{{$cartview->price}} &nbsp;* {{$cartview->qty}}

									@php
									$price = $cartview->price;
									$qty = $cartview->qty;
									$total = $price * $qty;
									@endphp
									<span>=&nbsp;{{$total}}.00 TK</span> </span>

								</div>

								<div class="col-sm-2 col-2">
									<span>
										<a href="{{url('remove/'.$cartview->rowId)}}">

											<svg width="16" height="16" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="trash">
												<polyline fill="none" stroke="#E55B48" points="6.5 3 6.5 1.5 13.5 1.5 13.5 3"></polyline>
												<polyline fill="none" stroke="#E55B48" points="4.5 4 4.5 18.5 15.5 18.5 15.5 4"></polyline>
												<rect x="8" y="7" width="1" height="9"  stroke="#E55B48"></rect>
												<rect x="11" y="7" width="1" height="9" stroke="#E55B48" ></rect>
												<rect x="2" y="3" width="16" height="1" stroke="#E55B48" ></rect>
											</svg>
										</a>
									</span>
								</div>

							</div>
						</div>

						@endforeach
						@endif

					</div>
				</div>


				<div class="col-sm-12 col-12 p-0 card-fotter" id="card_bottom">

					<div class="card-footer bg-dark mt-2">
						<div class="col-sm-12 col-12">
							<center>
								<span class="total">TOTAL =&nbsp;<span id="cartprice">{{Cart::subtotal()}}</span> TK</span>
							</center>
						</div>
					</div>

					<div class="card-footer"  id="card_bottom2">
						<div class="col-sm-12 col-12">
							<center>
								@if(Auth::check())
								<a href="{{ url('checkout')}}" class="orders">
								CHECKOUT</a>
								@else
								<a class="orders" data-toggle="modal" data-target="#staticBackdrop">CHECKOUT</a>
								@endif
							</center>
						</div>
					</div>

				</div>		
			</div>

			<!-----Cart End----------->


			<script type="text/javascript">
				cart = document.querySelector("#cat_box");
				cartPlus = document.querySelector("#cat_div");
				cartvi = document.querySelector("#cat_view");

				cart.addEventListener('click', function(){
					cart.classList.add('class');
					cart.classList.remove('class2');
					cartPlus.classList.add('class2');
					cartPlus.classList.remove('class');
				})
				cartvi.addEventListener('click', function(){
					cart.classList.add('class2');
					cart.classList.remove('class');
					cartPlus.classList.add('class');
					cartPlus.classList.remove('class2');
				})
			</script>


			<script src="{{asset('public/frontend')}}/js/jquery-3.3.1.min.js"></script>
			<script src="{{asset('public/frontend')}}/styles/bootstrap4/popper.js"></script>
			<script src="{{asset('public/frontend')}}/styles/bootstrap4/bootstrap.min.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/greensock/TweenMax.min.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/greensock/TimelineMax.min.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/greensock/animation.gsap.min.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/slick-1.8.0/slick.js"></script>
			<script src="{{asset('public/frontend')}}/plugins/easing/easing.js"></script>
			<script src="{{asset('public/frontend')}}/js/custom.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
			<script src="{{asset('public/frontend')}}/js/contact_custom.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

			<script>
				$(document).ready(function() {
					$('#example').DataTable();
				} );
			</script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
			<script>
				@if (Session::has('messege'))

				var type="{{ Session::get('alert-type', 'info') }}"

				switch(type){

					case 'info':
					toastr.options.positionClass = 'toast-top-right';
					toastr.info("{{ Session::get('messege') }}");

					break;

					case 'success':
					toastr.options.positionClass = 'toast-top-right';
					toastr.success("{{ Session::get('messege') }}");

					break;

					case 'warning':
					toastr.options.positionClass = 'toast-top-right';
					toastr.warning("{{ Session::get('messege') }}");

					break;

					case 'error':
					toastr.options.positionClass = 'toast-top-right';
					toastr.error("{{ Session::get('messege') }}");

					break;

				}

				@endif

			</script>



		</body>

		</html>