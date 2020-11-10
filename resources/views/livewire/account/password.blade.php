<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Change Password</h5>
						</div>
						@if (session()->has('passwordsuccess'))
                            <div class="alert alert-success mt-2 text-center">
                                {{ session('passwordsuccess') }}
                            </div>
                        @endif

                        @if (session()->has('passworderror'))
                            <div class="alert alert-danger text-center">
                                {{ session('passworderror') }}
                            </div>
                        @endif
						<div class="card-body">
							<form class="theme-form" wire:submit.prevent="change_password">
								<div class="form-group">
									<label class="col-form-label pt-0" for="old_password">Old Password</label>
									<input class="form-control @error('old_password') is-invalid @enderror" type="password"placeholder="Enter your old password" wire:model="old_password">

									@error('old_password')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<label class="col-form-label pt-0" for="new_password">New Password</label>
									<input class="form-control @error('new_password') is-invalid @enderror" type="password"  placeholder="Enter your new password" wire:model="new_password">

									@error('new_password')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>