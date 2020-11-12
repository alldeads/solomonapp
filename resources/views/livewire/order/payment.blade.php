<div class="container-fluid credit-card">
   	<div class="row">
      	<div class="col-12 box-col-12">
         	<div class="card">
            	<div class="card-header py-4">
               		<h5>Payment </h5>
            	</div>
            	<div class="card-body">
               		<div class="row">
                        @if (session()->has('paymenterror'))
                            <div class="col-12 alert alert-danger text-center">
                                {{ session('paymenterror') }}
                            </div>
                        @endif

                        @if (session()->has('paymentsuccess'))
                            <div class="col-12 alert alert-success text-center">
                                {{ session('paymentsuccess') }}
                            </div>
                        @endif
                        <div class="col-md-5 mb-2">
                            <h4>Instructions</h4>

                            @if ($method == 4)
                                <div class="form-group">
                                    <small>Mobile</small>
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($payment->amount, 2, '.', ',') }} </li>
                                        <li> Login to your bank mobile app.</li>
                                        <li> Choose Send Money</li>
                                        <li> Account Number: 000808048274</li>
                                        <li> Account Name: Dave Scott Wong</li>
                                        <li> Account Bank: BDO</li>
                                    </ul>
                                </div>
                            @else
                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($payment->amount, 2, '.', ',') }} </li>
                                        <li> Please go to the nearest BDO bank branch.</li>
                                        <li> Fill out the deposit slip.</li>
                                        <li> Account Number: 000808048274</li>
                                        <li> Account Name: Dave Scott Wong</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                  		<div class="col-md-7">
                     		<form class="theme-form mega-form" wire:submit.prevent="submit_payment">
                                <div class="form-group">
                                    <select class="form-control @error('method') is-invalid @enderror" wire:model="method">
                                        @foreach($options as $option)
                                            <option value="{{ $option->id }}">
                                                {{ $option->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('method')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                        		<div class="form-group">
                           			<input class="form-control @error('transaction') is-invalid @enderror" type="text" placeholder="Transaction Number" wire:model="transaction">

                                    @error('transaction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        		</div>
                        		<div class="form-group">
                           			<input class="form-control @error('amount') is-invalid @enderror" type="text" placeholder="Amount" wire:model="amount">

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        		</div>
                        		<div class="form-group">
                           			<input class="form-control @error('date_paid') is-invalid @enderror" wire:model="date_paid" type="date">

                                    @error('date_paid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        		</div>

                                @if (!session()->has('paymentsuccess'))
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary"> Submit</button>
                                    </div>
                                @endif
                     		</form>
                  		</div>

                  		<div class="col-md-12 text-center mt-2">
                  			<img class="img-fluid" src="{{asset('images/card.png')}}" alt="">
                  		</div>
               		</div>
            	</div>
         	</div>
      	</div>
  	</div>
</div>