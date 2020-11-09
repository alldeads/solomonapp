<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Activate Voucher</h5>
						</div>
						@if (session()->has('vouchersuccess'))
                            <div class="alert alert-success mt-2">
                                {{ session('vouchersuccess') }}
                            </div>
                        @endif

                        @if (session()->has('vouchererror'))
                            <div class="alert alert-danger">
                                {{ session('vouchererror') }}
                            </div>
                        @endif
						<div class="card-body">
							<form class="theme-form" wire:submit.prevent="validateVoucher">
								<div class="form-group">
									<label class="col-form-label pt-0" for="exampleInputEmail1">Voucher</label>
									<input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Enter voucher code" wire:model="voucher">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>