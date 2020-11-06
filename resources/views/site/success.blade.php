@extends('layouts.app')

@section('content')
<section class="call-to-action with-borders with-button-arrow mb-5 justify-content-center">
	<div class="col-sm-12 col-lg-4">
		<div class="card border-width-3 border-radius-0 border-color-success" style="border-color: #f5d601 !important;">
			<div class="card-body text-center">
				<p class="text-color-light font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success mr-1" style="color: #f5d601 !important;"></i> Registration Completed.</p>
			</div>
		</div>
	</div>
</section>
<section class="call-to-action with-borders mb-5 appear-animation" data-appear-animation="fadeIn">
	<div class="col-sm-9 col-lg-9">
		<div class="call-to-action-content">
			<h3>Solomon App is <strong class="font-weight-extra-bold">everything</strong> you need to earn <strong class="font-weight-extra-bold">more!</strong></h3>
			<p class="mb-0">The <strong class="font-weight-extra-bold">Best</strong> Dropshipping in the Philippines.</p>
		</div>
	</div>
	<div class="col-sm-3 col-lg-3">
		<div class="call-to-action-btn">
			<a href="{{ route('login') }}" class="btn btn-modern text-2 btn-primary">Sign-in Now</a>
		</div>
	</div>
</section>
@endsection