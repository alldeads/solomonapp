<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-sm-12 col-xl-12">
			@if (session()->has('message'))
				<div class="alert alert-success inverse alert-dismissible fade show" role="alert">
	                <i class="icon-thumb-up alert-center"></i>
	               	<p><b> Well done! </b> {{ session('message') }}</p>
	                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	            </div>
            @endif
            @if (session()->has('error'))
				<div class="alert alert-danger inverse alert-dismissible fade show" role="alert">
	                <i class="icon-thumb-down alert-center"></i>
	               	<p><b> Something went wrong! </b> {{ session('error') }}</p>
	                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	            </div>
            @endif
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>User Information</h5>
						</div>
						<div class="card-body">
							<form class="theme-form mega-form" wire:submit.prevent="saveProfile" >
								@csrf
								<h6>Account Information</h6>
								<div class="form-group">
									<label class="col-form-label">First Name</label>
									<input class="form-control @error('first_name') is-invalid @enderror" wire:model="first_name" type="text" placeholder="First Name">
									@error('first_name')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Last Name</label>
									<input class="form-control @error('last_name') is-invalid @enderror" wire:model="last_name" type="text" placeholder="Last Name">
									@error('last_name')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Email Address</label>
									<input class="form-control @error('email') is-invalid @enderror" type="text" wire:model="email" placeholder="Enter email">
									@error('email')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Username</label>
									<input class="form-control @error('username') is-invalid @enderror" type="text" wire:model="username" placeholder="Enter username">
									@error('username')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Contact Number</label>
									<input class="form-control @error('phone') is-invalid @enderror" wire:model="phone" type="text" placeholder="Enter contact number">
									@error('phone')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								@if ( auth()->user()->status == "active" )
									<div class="form-group">
										<label class="col-form-label">Referral Link</label>
										<input class="form-control" wire:model="referral" type="text" disabled>
									</div>
								@endif
								<hr class="mt-4 mb-4">
								<h6>Company Information</h6>
								<div class="form-group">
									<label class="col-form-label">Company Name</label>
									<input class="form-control @error('company') is-invalid @enderror" wire:model="company" type="text" placeholder="Company Name">
									@error('company')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label">Position</label>
									<input class="form-control @error('position') is-invalid @enderror" type="text" placeholder="Position" wire:model="position">
									@error('position')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>

								<div class="form-group">
									<button wire:loading.remove class="btn btn-primary">Save changes</button>
									<button wire:loading class="btn btn-primary">Saving</button>
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