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
		bottom: 6px;
		left: 15px;
		z-index: 10;
		border-top-color: #000;
		border-top-width: 3px;
	}

	.headingsections{
		font-weight: 600;
		text-transform: uppercase;
		font-family: 'Titillium web';
	}

	.headingsections:after {
		content: "";
		width: 100px;
		border-top: 1px solid rgba(0,0,0,.1);
		position: absolute;
		bottom: -3px;
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


</style>


<div class="col-sm-12 col-12 mt-4 mb-4">
	<div class="container-fluid">
		<div class="col-sm-12 col-12 p-0">
			<div class="row" id="showproduct-130">

				@if(isset($allproduct))
				@foreach($allproduct as $allproductview)

				<div class="col-lg-2 cl-md-4 col-sm-6 col-6 mt-4" >
					<div class="homeproducts border">
						@php
						$dis_percentig = $allproductview->discount_price / $allproductview->sale_price*100;
						@endphp

						@if(isset($allproductview->discount_price))
						<span class="mark" style="margin-left: -18px; background-color: #f90;">{{ceil($dis_percentig)}} % OFF</span>
						@else
						<span class="mark1" style="margin-left: -18px;"></span>
						@endif
						<center>
							<a href="{{url('product/'.$allproductview->id)}}"><img src="{{ url($allproductview->image) }}" class="img-fluid" style="z-index:1; "></a>
						</center>
						<div>
							<a href="{{url('product/'.$allproductview->id)}}"><center>
								@php
								$content = substr($allproductview->product_name,0,20);
								$sale_price = $allproductview->sale_price;
								$dis_price = $allproductview->discount_price;
								$present_price = $sale_price-$dis_price;
								@endphp
								{!! $content !!}<br>
								
								<span style="font-size: 15px;">
									@if(isset($dis_price))
									<del>{{$allproductview->sale_price}}</del> &nbsp;&nbsp;
									@endif

									Tk {{$present_price}}.00
								</span>
							</div>
						</div>
					</div>
					@endforeach
					@endif

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-12 mt-5" >
					<nav>
						<center>
							<ul class="pagination" style="color: black;">
							{{ $allproduct->links() }}
						</ul>
						</center>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>





@endsection