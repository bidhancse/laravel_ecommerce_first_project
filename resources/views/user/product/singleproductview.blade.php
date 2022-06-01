@extends('user.index')
@section('content')

<style type="text/css">
	.carousel-indicators .active {
		background-color: #00797C;
		width: 50px;
		border-radius: 30px;
	}

	.grow img{
		transition: 1.3s ease;
	}

	.grow img:hover{
		-webkit-transform: scale(1.05);
		-ms-transform: scale(1.05);
		transform: scale(1.05);
		transition: 1s ease;

	}



	.headingsection{
		font-weight: 600;
		text-transform: uppercase;
		font-family: 'Titillium web';
	}

	.headingsection:after {
		content: "";
		width: 100px;
		border-top: 1px solid rgba(0,0,0,.1);
		position: absolute;
		top: 37px;
		left: 15px;
		z-index: 10;
		border-top-color: #000;
		border-top-width: 3px;
	}


	.homeproducts{
		background-color: #fff;
		padding: 10px;
		border-radius: 5px;
		box-shadow: rgba(0, 0, 0, 0.05) 0px 2px 5px 0px;
	}

	.homeproducts img{
		transform: scale(0.90);
		transition: 0.6s;
	}

	.homeproducts img:hover{
		transform: scale(0.95);

	}
	.homeproducts a{
		color: #000;
		font-size: 13px;  
		line-height: 20px;
	}
	.homeproducts a:hover{
		text-decoration: none;
		color: #000;
	}

	.homeproducts del{
		color: gray;
		font-size: 12px;
		color:#FF4600;
	}


	.homeproducts span{
		color: #000;
		font-weight: bold;
	}


	.overlay {
		position: absolute;
		transition: .5s;
		left: -20;
		top:-5;
		right: 0;
		z-index:100;

	}

/*.overlay span{
  border:none;
  background:#fd5200;
  color: #fff;
  outline: none;
  z-index:2;
  padding:10px 6px;
  border-radius:15px;
}*/

.bg-light {
	background-color: #eff6fa!important;
}

.viewproducts{
	background-color: black;
	color:white;
	padding: 10px 15px;
	border-radius: 0px;
	
}

.viewproducts:hover{
	text-decoration: none;
	color:white;

}

/*.homeproducts:hover
{
	box-shadow: 0px 0px 5px 2px rgba(112,109,109,0.79);
	-webkit-box-shadow: 0px 0px 5px 2px rgba(112,109,109,0.79);
	-moz-box-shadow: 0px 0px 5px 2px rgba(112,109,109,0.79);
	transition: box-shadow 0.5s ease-in-out;
}*/

.mark {
	background: #ff9900;
	width: auto;
	color: #000;
	font-size: 16px;
	padding: 3px 10px;
	line-height: 14px;
	margin-bottom: 2px;
	border-radius: 0 20px 20px 0;
	flex: 0 0 auto;
	font-family: 'Calibri';
}
* {
	margin: 0;
	padding: 0;
}
*, ::after, ::before {
	box-sizing: border-box;
}

.mark1 {

	width: auto;
	color: #000;
	font-size: 16px;
	padding: 3px 10px;
	line-height: 14px;
	margin-bottom: 2px;
	border-radius: 0 20px 20px 0;
	flex: 0 0 auto;
	font-family: 'Calibri';
}
* {
	margin: 0;
	padding: 0;
}
*, ::after, ::before {
	box-sizing: border-box;
}

.btnshare {
	border: none;
	color: white;
	text-align: center;
	opacity: 1;
	transition: 0.3s;
}

.btnshare:hover {opacity: 0.6}



</style>


<!-- Single Product -->

<div class="single_product" style="margin-top: -50px; background-color: #fff;">
	<div class="container">
		<div class="row">
			<!-- Images -->
			<div class="col-lg-2 order-lg-1 order-2">
				<ul class="image_list">
					<li data-image="{{ url($singleproduct->image) }}"><img src="{{ url($singleproduct->image) }}" alt="" style="max-height: 163px;"></li>
					<li data-image="{{ url($singleproduct->image) }}"><img src="{{ url($singleproduct->image) }}" alt=""></li>
					<li data-image="{{ url($singleproduct->image) }}"><img src="{{ url($singleproduct->image) }}" alt=""></li>
				</ul>
			</div>

			<!-- Selected Image -->
			<div class="col-lg-5 order-lg-2 order-1">
				<div class="image_selected">
					<a href="{{ url($singleproduct->image) }}">
						<img src="{{ url($singleproduct->image) }}" alt="" class="img-fluid" style="max-height: 525px;">
					</a>
				</div>
			</div>

			<!-- Description -->
			<div class="col-lg-5 order-3">
				<div class="product_description">
					<div class="product_category">Laptops</div>
					<div class="product_name" style="font-size: 20px;">{{$singleproduct->product_name}}</div>
					<div class="product_text">
						<p>
							{!! $singleproduct->short_details !!}
						</p>
					</div>
					<div class="order_info d-flex flex-row" style="margin-top: -0px;">



						<form method="post" action="{{ url('addtocart/'.$singleproduct->id)}}">
							@csrf
							<div class="form-group ">
								<label ><strong>Quantity :</strong></label>
								<input type="number" class="form-control w-100"
								name="quentity" style="border-radius: 0px; box-shadow: none;   margin-top: -8px; color: gray;" required>
							</div>

							<div class="form-group ">
								<label><strong>Select Size :</strong></label>
								<select class="form-control textfill w-100" style="border-radius: 0px; box-shadow: none; margin-left: -1px;  margin-top: -8px; color: gray;" name="product_size">
									@if(isset($productSize))
									@foreach($productSize as $Sizeshow)
									<option value="{{$Sizeshow}}">{{$Sizeshow}}</option>
									@endforeach
									@endif
								</select>
							</div>

							<div class="form-group ">
								<label><strong>Select color :</strong></label>
								<select class="form-control textfill w-100" style="border-radius: 0px; box-shadow: none; margin-left: -1px;  margin-top: -8px; color: black;color: gray;" name="product_color">
									@if(isset($productColor))
									@foreach($productColor as $Colorshow)
									<option value="{{$Colorshow}}">{{$Colorshow}}</option>
									@endforeach
									@endif
								</select>
							</div>

							<div class="mt-3">
								<span style="font-size: 20px; color: green;">STOCK IN</span>
							</div><br>

							@php
							$sale_price = $singleproduct->sale_price;
							$dis_price = $singleproduct->discount_price;
							$present_price = $sale_price-$dis_price;
							@endphp
							<div>
								@if(isset($dis_price))
								<del style="font-size: 20px; color: red;">{{$singleproduct->sale_price}}</del> &nbsp;&nbsp;
								@endif
							</div>
							<div class="product_price mt-1" style=" color: #4dc247 !important; padding-top: -10px;">BDT : {{$present_price}}.00</div>
							<div class="button_container" style="margin-top: 20px">

								<button type="submit"class="btn" style="background-color: black; color: white; box-shadow: none;">Add to Cart</button>

								
								<a href="#" class="btn" style="background-color: #ff9900; color: white; box-shadow: none;">Buy Now</a>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>

							<div class="mt-3">
								<span style="font-size: 12px; color: gray;">Share With :</span><br>
								<button class="sharer btn btn-sm btnshare" data-sharer="facebook" data-url="" style="background-color: #3b5998; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;"><i class="fa fa-facebook-f"></i>&nbsp; Facebook </button>

								<button class="sharer btn btn-sm btnshare" data-sharer="twitter" data-url="https://www.facebook.com/Bidhan716/" style="background-color: #1da1f2; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;"><i class="fa fa-twitter"></i>&nbsp; Twitter </button>

								<button class="sharer btn btn-sm btnshare" data-sharer="Whatsapp" data-url="https://www.facebook.com/Bidhan716/" style="background-color: #4dc247; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;"><i class="fa fa-whatsapp"></i>&nbsp; Whatsapp </button>


								<button class="btn btn-sm btnshare" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #4dc247; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;">
									<i class="fa fa-plus"></i> &nbsp; More</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: white; width: 20px; font-size: 12px; color: black; border-radius: 0px; box-shadow: none; margin-top: 10px; margin-left: 5px;">
										<a class="dropdown-item" data-sharer="Linkedin" data-url="https://www.facebook.com/Bidhan716/"><i style="background-color: #00468c; padding: 3px; color: white;" class="fa fa-linkedin"></i>&nbsp; Linkedin</a>
										<a class="dropdown-item" data-sharer="viber" data-url="https://www.facebook.com/Bidhan716/"><i style="background-color: #794f99; padding: 3px; color: white;" class="fab fa-viber"></i>&nbsp; Viber</a>
										<a class="dropdown-item" data-sharer="Telegram" data-url="https://www.facebook.com/Bidhan716/"><i style="background-color: #269ed2; padding: 3px; color: white;" class="fa fa-telegram"></i>&nbsp; Telegram</a>
									</div>

								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
</div>




<div class="col-sm-12 col-12 " style="margin-top: -60px; background-color: #fff;">

	<div class="container">



		<ul class="nav nav-tabs" id="myTab" role="tablist">

			<li class="nav-item">

				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#Description" role="tab"
				aria-controls="home" aria-selected="true">Description</a>

			</li>

			<li class="nav-item">

				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#Condition" role="tab"
				aria-controls="profile" aria-selected="false">Condition</a>

			</li>



		</ul>





		<div class="tab-content" id="myTabContent">



			<div class="tab-pane fade show active mt-3" id="Description" role="tabpanel" aria-labelledby="home-tab">

				<p>
					{!! $singleproduct->full_details !!}
				</p>

			</div>
			<div class="tab-pane fade mt-3" id="Condition" role="tabpanel" aria-labelledby="profile-tab">
			</div>
		</div>
	</div>
</div>
<!----------End Tabs----------->



<div class="col-sm-12 col-12 mt-5 mb-5" style="background-color: #fff;">

	<div class="container-fluid">

		<span class="headingsection">Related <span class="text-infos">Products</span></span>
		<hr>
		<div class="col-sm-12 col-12">
			<div class="row">
				@if(isset($reletedproduct))
				@foreach($reletedproduct as $reletedProductview)

				<div class="col-lg-2 col-md-3 col-sm-6 col-6 mt-4">
					<div class="homeproducts border">

						@php
						$dis_percentig = $reletedProductview->discount_price / $reletedProductview->sale_price*100;
						@endphp

						@if(isset($reletedProductview->discount_price))
						<span class="mark" style="margin-left: -18px; background-color: #f90;">{{ceil($dis_percentig)}} % OFF</span>
						@else
						<span class="mark1" style="margin-left: -18px;"></span>
						@endif
						
						<center>
							<a href="{{url('product/'.$reletedProductview->id)}}">
								<img src="{{ url($reletedProductview->image) }}" class="img-fluid"></a>
							</center>
							<div>
								<center>
									<a
									href="{{url('product/'.$reletedProductview->id)}}">
									@php
									$content = substr($reletedProductview->product_name,0,20);
									$sale_price = $reletedProductview->sale_price;
									$dis_price = $reletedProductview->discount_price;
									$present_price = $sale_price-$dis_price;
									@endphp
									{!! $content !!}<br>
								</a>
								<span style="font-size: 15px;">
									@if(isset($dis_price))
									<del>{{$reletedProductview->sale_price}}</del> &nbsp;&nbsp;
									@endif

									Tk {{$present_price}}.00
								</span>
							</center>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>

		</div>

	</div>

</div>



<script src="{{asset('public/frontend')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('public/frontend')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('public/frontend')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('public/frontend')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('public/frontend')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('public/frontend')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('public/frontend')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('public/frontend')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('public/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('public/frontend')}}/plugins/easing/easing.js"></script>
<script src="{{asset('public/frontend')}}/js/product_custom.js"></script>



@endsection