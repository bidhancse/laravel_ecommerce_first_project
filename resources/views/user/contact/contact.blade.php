@extends('user.index')
@section('content')




<!-- Contact Info -->

<div class="contact_info" style="background-color: #fff; margin-top: -16px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

					<!-- Contact Item -->
					<div class="contact_info_item d-flex flex-row align-items-center justify-content-start" style="background-color: #fff;">
						<div class="contact_info_image"><i class="fas fa-mobile-alt" style="font-size: 30px; color: #ff9900;"></i></div>
						<div class="contact_info_content">
							<div class="contact_info_title">Phone</div>
							<div class="contact_info_text">{{$contactinfo->phone}}</div>
						</div>
					</div>

					<!-- Contact Item -->
					<div class="contact_info_item d-flex flex-row align-items-center justify-content-start" style="background-color: #fff;">
						<div class="contact_info_image"><i class="far fa-envelope" style="font-size: 30px; color: #ff9900;"></i></div>
						<div class="contact_info_content">
							<div class="contact_info_title">Email</div>
							<div class="contact_info_text">{{$contactinfo->email}}</div>
						</div>
					</div>

					<!-- Contact Item -->
					<div class="contact_info_item d-flex flex-row align-items-center justify-content-start" style="background-color: #fff;">
						<div class="contact_info_image"><i class="fas fa-map-marker-alt" style="font-size: 30px; color: #ff9900;"></i></div>
						<div class="contact_info_content">
							<div class="contact_info_title">Address</div>
							<div class="contact_info_text">AVENEU-5, ROAD-5, HOUSE-353,
							MIRPUR DOHS, DHAKA.</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Contact Form -->

<div class="contact_form" style="background-color: #fff;">
	<div class="container pb-5">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_form_container">
					<form method="POST" action="{{url('customermsg')}}" id="contact_form">
						@csrf
						<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							<input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required." name="name">

							<input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required." name="email">

							<input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number" name="phone">
						</div>
						<div class="contact_form_text">
							<textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
						</div>
						<div class="contact_form_button">
							<button type="submit" class="button contact_submit_button" style="border-radius: 50px; background-color: black; box-shadow: none;">Send Message</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>



@endsection