@extends('layouts.app')

@section('content')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col">
				<div class="row">
					<div class="col-md-12 align-self-center p-static order-2 text-center" >
						<div class="overflow-hidden pb-2">
							<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Registration Completed</h2>

							<div class="call-to-action-btn">
								<a href="{{ route('login') }}" class="btn btn-modern text-2 btn-primary">Sign-in Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection