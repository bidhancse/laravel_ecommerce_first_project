@extends('user.index')
@section('content')


<style>
	*{
		padding: 0;
		margin: 0;
	}





	.profile-pic {
		color: transparent;
		transition: all 0.3s ease;
		display: flex;
		justify-content: center;
		align-items: center;
		position: relative;
		transition: all 0.3s ease;
		
	}
	.profile-pic input {
		display: none;

	}
	.profile-pic img {
		position: absolute;
		object-fit: cover;
		width: 150px;
		height: 150px;
		z-index: 0;
		box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
	}
	.profile-pic .-label {
		cursor: pointer;
		height: 150px;
		width: 150px;
	}
	.profile-pic:hover .-label {
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: rgba(0, 0, 0, .4);
		z-index: 10000;
		color: #fafafa;
		transition: background-color 0.3s ease-in-out;
		border-radius: 100px;
		
	}
	.profile-pic span {
		display: inline-flex;
		padding: 0.2em;
		height: 2em;
		font-size: 13px;
		
	}



	.userdashboard{
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
	}

	.userdashboard img{
		border-radius:50%;
		width: 150px;
		height: 150px;
		box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
	}

	.userdashboard strong{
		font-size: 20px;
	}

	.userdashboard li{
		display: block;
		list-style: none;
		padding: 12px 20px;
		transition: 0.3s;
	}

	.userdashboard li a{
		color: #414141;
		font-size: 15px;


	}

	.userdashboard li:hover{
		background: #f8f8f8;
	}


	.userdashboard .active{
		background: #f8f8f8;
		border-left: 4px solid #414141;
	}

	.userdashboard th{
		font-size: 15px;
		width: 10%;
		border: none;

	}


	.userdashboard td{
		font-size: 14px;
		border: none;

	}

	.userdashboard label{
		font-size:25px;
	}


	.userdashboard a{
		color: #fff;
	}

	.userdashboard .dash{
		color: #fff;
		font-weight: bold;
		border-radius: 5px;

	}

	.userdashboard .passreset{
		max-width: 600px;
	}


	.userdashboard .passreset label{
		font-size: 15px;
	}

	.userdashboard .passreset input{

		border-radius: 0px;
		border:none;
		border:1px solid #e8e8e8;
		height: 40px;

	}
	.userdashboard .passreset input:focus{
		box-shadow: none;
		border-color: #e8e8e8;
	}


	.userdashboard .passreset textarea{
		border-radius: 0px;
		border:none;
		border:1px solid #e8e8e8;
	}

	.userdashboard .passreset textarea:focus{
		box-shadow: none;
		border-color: #e8e8e8;
	}

	.dataTables_length label{
		font-size: 15px!important;
	}


	.dataTables_length select{
		padding: 5px 10px;
		border: none;
		border: 1px solid #e1e1e1;
	}


	.dataTables_length select:focus{
		border: 1px solid #e1e1e1;
		outline: none;
	}




	.dataTables_filter label{
		font-size: 15px!important;
	}

	.dataTables_filter input{
		padding: 5px 10px;
		border: none;
		border: 1px solid #e1e1e1;
	}

	.dataTables_filter input:focus{
		border: 1px solid #e1e1e1;
		outline: none;
	}

	table.dataTable tbody th, table.dataTable tbody td {
		padding: 12px 10px!important;
	}

	.orderstatus{
		color: #f1f1f1;
		padding: 3px 12px;
		border-radius: 30px;
		font-size: 13px;
	}



	.invoice{
		background: #fff;
		border-radius: 5px;
		box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
	}


</style>




<div class="col-md-12 mt-4" style="padding-bottom: 10px; ">
	<div class="container-fluid padd">
		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mt-4" >
				<div class="col-md-12 p-0 pt-4 pb-4 userdashboard" style="border-top: 1px solid #ddd;">
					<center>
						<form method="post" class="btn-submit" enctype="multipart/form-data">
							<div class="profile-pic">
								<label class="-label" for="file">
									<span class="glyphicon glyphicon-camera"></span>
									<span>Change Profile</span>
								</label>

								<input id="file" type="file" name="image" onchange="loadFile(event)"/>
								<img src="https://dubai2bd.com/public/guestImage/1713756929387775.gif" id="output">

							</div>
							<button class="btn btn-success btn-sm" id="uploadbutton" type="submit" style="box-shadow: none;">Upate Profile</button><br>
							<strong>{{-- {{ Auth()->user()->name }} --}}</strong><hr>

						</form>
					</center>

					<div class="mt-4" >
						<li class="  "><a href="{{url('userdashboard')}}" style="text-decoration:none;"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a></li>
						<li class=""><a href="{{url('allorder')}}" style="text-decoration:none;"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Order Information</a></li>
						<li class="active"><a href="{{url('updateinformation')}}" style="text-decoration:none;"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Basic Information</a></li>
						<li class=""><a href="{{url('changepassword')}}" style="text-decoration:none;"><i class="fa fa-key" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a></li>
						<li><a href="{{url('allproduct')}}" style="text-decoration:none;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Go To Shopping</a></li>
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" style="text-decoration:none;"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
					</div>

				</div>

			</div>


			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 mt-4">
				<div class="col-md-12 p-4 userdashboard" style="border-top: 1px solid #ddd;">

					<strong><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit Information</strong><br><br>

					<form class="row passreset" id="btn-submit" method="post">
						<input type="hidden" name="_token" value="3Q8S1BDDFg3ZeAq6Xfv5dP6VYRK7rA27H2pF5BJw">

						<div class="form-group col-md-12">
							<label>First Name</label>
							<input type="text" name="first_name" autocomplete="off"  class="form-control" value="{{ Auth()->user()->name }}">
						</div>

						<div class="form-group col-md-12">
							<label>Email</label>
							<input type="email" name="email" autocomplete="off"  class="form-control" value="{{ Auth()->user()->email }}">
						</div>


						<div class="form-group col-md-12">
							<label>Phone Number</label>
							<input type="number" name="phone" autocomplete="off"  class="form-control" value="{{ Auth()->user()->phone }}">
						</div>

						<div class="form-group col-md-12">
							<label>Address</label>
							<textarea rows="3" class="form-control" name="address">{{ Auth()->user()->address }}</textarea>
						</div>


						<div class="col-md-12 mt-2">
							<button type="submit" class="btn btn-dark w-100 p-2 button">Update Information</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div><!------------End Dashboard-------------->







@endsection