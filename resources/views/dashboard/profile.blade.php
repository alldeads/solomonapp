@extends('layouts.dashboard')
@section('title', 'Profile')

@section('breadcrumb-title')
<h3>Profile</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-sm-12 col-xl-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>User Information</h5>
						</div>
						<div class="card-body">
							<form class="theme-form mega-form" method="POST" action="{{ route('profile') }}">
								@csrf
								<h6>Account Information</h6>
								<div class="form-group">
									<label class="col-form-label">First Name</label>
									<input class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') ?? $user->first_name}}" name="first_name" type="text" placeholder="First Name">
									@error('first_name')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Last Name</label>
									<input class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') ?? $user->last_name}}" name="last_name" type="text" placeholder="Last Name">
									@error('last_name')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Email Address</label>
									<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') ?? $user->email}}" placeholder="Enter email">
									@error('email')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Contact Number</label>
									<input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $user->email}}" type="number" placeholder="Enter contact number">
									@error('phone')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Referral Link</label>
									<input class="form-control" value="{{ $user->referral_link }}" type="text" disabled>
								</div>
								<hr class="mt-4 mb-4">
								<h6>Company Information</h6>
								<div class="form-group">
									<label class="col-form-label">Company Name</label>
									<input class="form-control @error('company') is-invalid @enderror" value="{{ old('company') ?? $user->company}}" name="company" type="text" placeholder="Company Name">
									@error('company')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Position</label>
									<input class="form-control @error('position') is-invalid @enderror" value="{{ old('position') ?? $user->position}}" type="text" placeholder="Position" name="position">
									@error('position')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>

								<div class="form-group">
									<button class="btn btn-primary">Save changes</button>
									<button class="btn btn-secondary">Reset</button>
								</div>
							</form>
							<hr class="mt-4 mb-4">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection