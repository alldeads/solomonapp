@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row py-4">
			<div class="col-lg-6">
				<div class="overflow-hidden mb-1">
					<h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contact</strong> Us</h2>
				</div>
				<div class="overflow-hidden mb-4 pb-3">
					<p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Feel free to ask for details, don't save any questions!</p>
				</div>

				@livewire('contact')

			</div>
			<div class="col-lg-6">
				<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
					<h4 class="mt-2 mb-1">Contact <strong>Information</strong></h4>
					<ul class="list list-icons list-icons-style-2 mt-2">
						<li>
							<i class="fas fa-phone top-6"></i>
							<strong>Phone:</strong> (+63) 995-7554-420
						</li>
						<li>
							<i class="fas fa-phone top-6"></i>
							<strong>Phone:</strong> (+63) 915-2709-408
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

				{{-- <h4 class="pt-5">Get in <strong>Touch</strong></h4>
				<p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
			</div>
		</div>
	</div>
@endsection
