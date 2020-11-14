<div class="container-fluid">
	<div class="email-right-aside bookmark-tabcontent contacts-tabs">
       	<div class="card email-body radius-left">
         	<div class="pl-0">
             	<div class="tab-content">
                	<div class="tab-pane fade active show" id="pills-personal">
	                   	<div class="card mb-0">
	                      	<div class="card-header d-flex">
	                         	<h5>Commissions</h5>
	                         	<span class="f-14 pull-right mt-0 badge badge-warning text-dark">₱{{ number_format($this->commission, 2, '.', ',') }}</span>
	                      	</div>

	                      	<div class="card-body">
	                      		<div class="alert alert-warning text-center">
	                                Cash out will be released next week, Friday.
	                            </div>

	                            @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

	                            @if (session()->has('cashouterror'))
		                            <div class="alert alert-danger text-center mt-2">
		                                {{ session('cashouterror') }}
		                            </div>
		                        @endif

		                        @if (session()->has('cashoutsuccess'))
		                            <div class="alert alert-info text-center mt-2">
		                                {{ session('cashoutsuccess') }}
		                            </div>
		                        @endif

								<form class="theme-form" wire:submit.prevent="submit_cash_out">
									<div class="form-group">
										<label class="col-form-label pt-0" for="exampleInputEmail1">Method</label>
										
										<select class="form-control @error('option') is-invalid @enderror" wire:model="option">
											@foreach($methods as $method)
												<option value="{{ $method->id }}">
													{{ $method->name }}
												</option>
											@endforeach
										</select>

										@error('option')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
									</div>

									<div class="form-group">
										<label class="col-form-label pt-0" for="amount">Amount</label>
										<input class="form-control @error('amount') is-invalid @enderror" type="number" placeholder="Enter amount to cash out" wire:model="amount">

										@error('amount')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
									</div>

									
									@if ( $option != 4 )
										<div class="form-group">
											<label class="col-form-label pt-0" for="full_name">Full Name</label>
											<input class="form-control @error('full_name') is-invalid @enderror" type="text" placeholder="Enter Full Name" wire:model="full_name">

											@error('full_name')
				                                <span class="invalid-feedback" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
				                            @enderror
										</div>
									@endif
									
									
									@if ( $option == 4 )
										<div class="form-group">
											<label class="col-form-label pt-0" for="bank">Bank</label>

											<select class="form-control @error('bank') is-invalid @enderror" wire:model="bank">
												<option value="bdo">
													Banco De Oro (BDO)
												</option>
												<option value="bpi">
													Bank of the Philippines (BPI)
												</option>
												<option value="eastwest">
													EastWest Bank
												</option>
												<option value="metrobank">
													Metrobank
												</option>
											</select>

											@error('bank')
				                                <span class="invalid-feedback" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
				                            @enderror
										</div>

										<div class="form-group">
											<label class="col-form-label pt-0" for="account_name">Account Name</label>

											<input class="form-control @error('account_name') is-invalid @enderror" type="text" placeholder="Enter Account Name" wire:model="account_name">

											@error('account_name')
				                                <span class="invalid-feedback" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
				                            @enderror
										</div>

										<div class="form-group">
											<label class="col-form-label pt-0" for="account_number">Account Number</label>

											<input class="form-control @error('account_number') is-invalid @enderror" type="text" placeholder="Enter Account Number" wire:model="account_number">

											@error('account_number')
				                                <span class="invalid-feedback" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
				                            @enderror
										</div>
									@endif

									<div class="form-group">
										<label class="col-form-label pt-0" for="phone_number">Phone Number</label>

										<input class="form-control  @error('phone_number') is-invalid @enderror" type="number" placeholder="Enter Phone Number" wire:model="phone_number">

										@error('phone_number')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
									</div>

									<div class="form-group">
										<button class="btn btn-primary">Cash Out</button>
									</div>
								</form>
							</div>
	                    </div>
                  	</div>
              	</div>
          	</div>
      	</div>
    </div>
</div>