@extends('user.index')
@section('content')





<div class="container-fluid " style="margin-top: -15px;">
	<!--Carousel Wrapper-->
	<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="padding:0px; margin:0px;">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-2" data-slide-to="0" class="active" ></li>

			@if(isset($slidermore))
			@for($i=1; $i<=count($slidermore); $i++)

			<li data-target="#carousel-example-2" data-slide-to="{{ $i }}"></li>

			@endfor
			@endif

			
		</ol>

		<div class="carousel-inner" role="listbox">

			<div class="carousel-item active">
				<div class="view">
					<img class="d-block w-100" src="{{url($slideractive->image)}}"
					alt="First slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					{{-- <h3 class="h3-responsive">Light mask</h3>
					<p>First text</p> --}}
				</div>
			</div>

			@if(isset($slidermore))
			@foreach($slidermore as $sliderview)

			<div class="carousel-item">
				<div class="view">
					<img class="d-block w-100"  src="{{url($sliderview->image)}}"
					alt="Second slide">
					<div class="mask rgba-black-strong"></div>
				</div>
				<div class="carousel-caption">
				{{-- 	<h3 class="h3-responsive">Strong mask</h3>
				<p>Secondary text</p> --}}
			</div>
		</div>

		@endforeach
		@endif

	</div>
</div>
</div>



<!-------------- Shop by Category ------------->
<div class="col-sm-12 col-12 pt-5 pb-5" style="background-color: #f7f7f7;">
	<div class="container-fluid">
		<div class="row mb-3">
			<div class="col-sm-8 col-12 text-md-left text-center" style="padding-top:16px">
				<span class="headingsections" style="font-family: Calibri">Shop by Category's</span>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-sm-12 col-12">
			<div class="row">
				@if(isset($itemshow))
				@foreach($itemshow as $itemview)

				@php
				$productcount = DB::table('productinformation')->where('item_id',$itemview->id)->get();
				@endphp
				<div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">

					<div class="col-sm-12 col-12 collections bg-white p-3" style="min-height: 220px; border: 1px solid #eff6fa;">
						<center>
							<div class="homeproduct">
								<a
								href="{{url('item/'.$itemview->id)}}">

								@if(isset($itemview->image))
								<img src="{{ url($itemview->image) }}"
								class="img-fluid" alt="100x100" style="max-height:120px;">
								@endif

								<br>
								<span style="font-size: 12px; color: #000;">{{$itemview->item_name}}</span><br>
								<span style="font-size: 12px; color: #8e8e8e;">{{ count($productcount)}} Product's</span>
							</a>
						</div>
					</center>
				</div>
				
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
</div>
</div>
<!--------------End Shop by Category------------->







@if(isset($itemname))
@foreach($itemname as $itemnameshow)

@php
$products = DB::table('productinformation')->where('item_id',$itemnameshow->id)->first();
@endphp

@if($products)

<div class="col-sm-12 col-12 bg-light pb-5">
	<div class="container-fluid" style="padding-top:8px;">

		<div class="row">
			<div class="col-sm-10 col-8 text-md-left text-center" >
				<span class="headingsection">{{$itemnameshow->item_name}}</span>
			</div>
			<div class="col-sm-2 col-4  text-center text-md-right" style="margin-top: 8px;">

				<a href="{{url('item/'.$itemnameshow->id)}}" class="viewproducts" style="margin-top:40px;">View All</a>
			</div>
		</div>

		<div class="col-sm-12 col-12 p-0">
			<div class="row" id="showproduct-130">


				@php
				$product = DB::table('productinformation')->where('item_id',$itemnameshow->id)->inRandomOrder()->limit(6)->get();

				@endphp

				@if(isset($product))
				@foreach($product as $Productview)

				@if($itemnameshow->id == $Productview->item_id)


				<div class="col-lg-2 cl-md-4 col-sm-6 col-6 mt-4" >

					<div class="homeproducts">

						@php
						$dis_percentig = $Productview->discount_price / $Productview->sale_price*100;
						@endphp

						@if(isset($Productview->discount_price))
						<span class="mark" style="margin-left: -18px; background-color: #f90;">{{ceil($dis_percentig)}} % OFF</span>
						@else
						<span class="mark1" style="margin-left: -18px;"></span>
						@endif
						<center>
							<a
							href="{{ url('product/'.$Productview->id) }}">
							<img src="{{ url($Productview->image) }}"
							class="img-fluid" style="z-index:1;">
						</a>
					</center>
					<div class="text-center">
						<a
						href="{{ url('product/'.$Productview->id) }}">
						@php
						$content = substr($Productview->product_name,0,20);
						$sale_price = $Productview->sale_price;
						$dis_price = $Productview->discount_price;
						$present_price = $sale_price-$dis_price;
						@endphp

						{!! $content !!}<br>
						
						<span style="font-size: 15px;">
							@if(isset($dis_price))
							<del>{{$Productview->sale_price}}</del> &nbsp;&nbsp;
							@endif

							Tk {{$present_price}}.00
						</span>
					</a>
				</div>
			</div>
		</div>

		@endif

		@endforeach
		@endif


	</div>
</div>
</div>
</div>
@else
@endif

@endforeach
@endif




<!-------------- Shop by Brands ------------->
<div class="col-sm-12 col-12 pb-5 bg-light">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 col-8 text-md-left text-center" >
				<span class="headingsections" style="font-family: Calibri">Shop By Brands</span>
			</div>
			
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-sm-12 col-12">

			<div class="row" style="background:#f4f4f4; margin-top: 30px;">
				@if(isset($brandshow))
				@foreach($brandshow as $brandview)
				<div class="p-2 col-lg-1 col-md-3 col-sm-4 col-4"
				style="background:#fff; border: 3px #f4f4f4  solid; align:center; ">

				<center style="padding:5px;">
					<a
					href="{{ url('brand/'.$brandview->id) }}"><img
					src="{{ url($brandview->image) }}"
					class="img-responsive" alt=""
					style="max-height:40px;"></a>
				</center>
			</div>
			@endforeach
			@endif
			<div class="p-2 col-lg-1 col-md-3 col-sm-4 col-4"
			style="background:#fff; border: 3px #f4f4f4  solid;align:center; ">
			<a href="{{ url('brand_list') }}" style="text-decoration:none">
				<center style="padding:3px;">
					<button class="btn" style="background-color: #000; color: #ff9900; border-radius: 0px;"><strong>More</strong>&nbsp;<i class="fa fa-arrow-right"
						aria-hidden="true" ></i></button>
					</center>
				</a>
			</div>
		</div>
	</div>
</div>
</div>
<!----------End Brands --------->




<!-- Recently Viewed -->

{{-- <div class="viewed">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="viewed_title_container">
					<h3 class="viewed_title">Recently Viewed</h3>
					<div class="viewed_nav_container">
						<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
					</div>
				</div>

				<div class="viewed_slider_container">

					<!-- Recently Viewed Slider -->

					<div class="owl-carousel owl-theme viewed_slider">

						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset('public/frontend')}}/images/view_1.jpg" alt=""></div>
								<div class="viewed_content text-center">
									<div class="viewed_price">$225<span>$300</span></div>
									<div class="viewed_name"><a href="#">Beoplay H7</a></div>
								</div>
								<ul class="item_marks">
									<li class="item_mark item_discount">-25%</li>
									<li class="item_mark item_new">new</li>
								</ul>
							</div>
						</div>

						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset('public/frontend')}}/images/view_2.jpg" alt=""></div>
								<div class="viewed_content text-center">
									<div class="viewed_price">$379</div>
									<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
								</div>
								<ul class="item_marks">
									<li class="item_mark item_discount">-25%</li>
									<li class="item_mark item_new">new</li>
								</ul>
							</div>
						</div>

						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset('public/frontend')}}/images/view_3.jpg" alt=""></div>
								<div class="viewed_content text-center">
									<div class="viewed_price">$225</div>
									<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
								</div>
								<ul class="item_marks">
									<li class="item_mark item_discount">-25%</li>
									<li class="item_mark item_new">new</li>
								</ul>
							</div>
						</div>

						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset('public/frontend')}}/images/view_4.jpg" alt=""></div>
								<div class="viewed_content text-center">
									<div class="viewed_price">$379</div>
									<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
								</div>
								<ul class="item_marks">
									<li class="item_mark item_discount">-25%</li>
									<li class="item_mark item_new">new</li>
								</ul>
							</div>
						</div>

						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset('public/frontend')}}/images/view_5.jpg" alt=""></div>
								<div class="viewed_content text-center">
									<div class="viewed_price">$225<span>$300</span></div>
									<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
								</div>
								<ul class="item_marks">
									<li class="item_mark item_discount">-25%</li>
									<li class="item_mark item_new">new</li>
								</ul>
							</div>
						</div>

						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset('public/frontend')}}/images/view_6.jpg" alt=""></div>
								<div class="viewed_content text-center">
									<div class="viewed_price">$375</div>
									<div class="viewed_name"><a href="#">Speedlink...</a></div>
								</div>
								<ul class="item_marks">
									<li class="item_mark item_discount">-25%</li>
									<li class="item_mark item_new">new</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}









@endsection