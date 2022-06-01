@extends('user.index')
@section('content')




<!-------------- Shop by Brands ------------->
<div class="col-sm-12 col-12 pb-5 pt-5" style="margin-top: -16px; background-color: #f7f7f7;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 col-8 text-md-left text-center" >
				<span class="headingsections" style="font-family: Calibri">Shop By Brands</span>
			</div>
			<div class="col-sm-3 col-12 text-md-right text-center subsearch mt-sm-0 mt-2">

				<form>

        <input type="hidden" name="_token">            
        <div class="input-group" style="width: 280px; margin-left: 47px;">
         <input type="text" class="form-control" id="searchbox" placeholder="Serach Brand" name="search"  autocomplete="off" required="" style="border-radius: 0px;">
         <div class="input-group-append">
           <button class="btn" type="submit" style="border-radius: 0px 5px 5px 0px; background: black; color: white;"><i class="fa fa-search"></i></button>
         </div>
       </div>
     </form>


			</div>
			
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-sm-12 col-12">

			<div class="row" style="background:#f4f4f4; margin-top: 30px;">
				@if(isset($brandlist))
				@foreach($brandlist as $brandview)
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
		</div>
	</div>
</div>
</div>
<!----------End Brands --------->




@endsection