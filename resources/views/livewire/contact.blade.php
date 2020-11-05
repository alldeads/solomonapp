<div>
	<div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div>

	<div class="container">

		<div class="row py-4">
			<div class="col-lg-6">

				<div class="overflow-hidden mb-1">
					<h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contact</strong> Us</h2>
				</div>
				<div class="overflow-hidden mb-4 pb-3">
					<p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Feel free to ask for details, don't save any questions!</p>
				</div>

				<form method="POST" action="{{ route('contact') }}">
					@csrf
					@if (session()->has('success'))
			            <div class="contact-form-success alert alert-success mt-4">
							<strong>Success!</strong> Your message has been sent to us.
						</div>
			        @endif

			        @if (session()->has('error'))
				        <div class="contact-form-error alert alert-danger mt-4">
							<strong>Error!</strong> There was an error sending your message.
							<span class="mail-error-message text-1 d-block"></span>
						</div>
			        @endif

					<div class="form-row">
						<div class="form-group col-lg-6">
							<label class="required text-light font-weight-bold text-2">Full Name</label>
							<input type="text" maxlength="100" class="text-light form-control" required name="full_name">
							@error('full_name')
								<span class="error" style="color:red;">{{ $message }}</span> 
							@enderror
						</div>
						<div class="form-group col-lg-6">
							<label class="required text-light font-weight-bold text-2">Email Address</label>
							<input type="email" class="form-control text-light"required name="email">
							@error('email')
								<span class="error" style="color:red;">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label class="required text-light font-weight-bold text-2">Subject</label>
							<input type="text" value=""maxlength="100" class="text-light form-control" name="subject" required>
						</div>
						@error('subject')
							<span class="error" style="color:red;">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label class="required text-light font-weight-bold text-2">Message</label>
							<textarea maxlength="5000" rows="8" class="text-light form-control" name="message" required></textarea>
							@error('message')
								<span class="error" style="color:red;">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<button type="submit" class="text-light btn btn-primary btn-modern" >Submit</button>
						</div>
					</div>
				</form>

			</div>
			<div class="col-lg-6">

				<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
					<h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
					<ul class="list list-icons list-icons-style-2 mt-2">
						<li>
							<i class="fas fa-map-marker-alt top-6"></i> 
							<strong>Address:</strong> 1234 Street Name, City Name, United States
						</li>
						<li>
							<i class="fas fa-phone top-6"></i>
							<strong>Phone:</strong> (123) 456-789
						</li>
						<li>
							<i class="fas fa-envelope top-6"></i>
							<strong>Email:</strong> contact@solomonapp.com
						</li>
					</ul>
				</div>

				<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
					<h4 class="pt-5">Business <strong>Hours</strong></h4>
					<ul class="list list-icons list-light mt-2">
						<li><i class="far fa-clock top-6"></i> Monday - Friday - 9am to 5pm</li>
						<li><i class="far fa-clock top-6"></i> Saturday - 9am to 2pm</li>
						<li><i class="far fa-clock top-6"></i> Sunday - Closed</li>
					</ul>
				</div>

				<h4 class="pt-5">Get in <strong>Touch</strong></h4>
				<p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

			</div>

		</div>

	</div>
</div>
