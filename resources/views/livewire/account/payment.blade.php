<div class="container-fluid credit-card">
   	<div class="row">
      	<div class="col-12 box-col-12">
         	<div class="card">
            	<div class="card-header py-4">
               		<h5>Payment </h5>
            	</div>
            	<div class="card-body">
               		<div class="row">
                        @if (session()->has('accountpaymenterror'))
                            <div class="col-12 alert alert-danger text-center">
                                {{ session('accountpaymenterror') }}
                            </div>
                        @endif

                        @if (session()->has('accountpaymentsuccess'))
                            <div class="col-12 alert alert-success text-center">
                                {{ session('accountpaymentsuccess') }}
                            </div>
                        @endif
                        <div class="col-md-5 mb-2">
                            <h4>Instructions</h4>

                            @if ($method == 3)
                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($pamount, 2, '.', ',') }} </li>
                                        <li> Login to your Gcash account.</li>
                                        <li> Please send your money to:</li>
                                        <li> Phone Number: 09773287108</li>
                                        <li> Full Name: Joanna Eve P.</li>
                                    </ul>
                                </div>
                            @elseif ($method == 6)
                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($pamount, 2, '.', ',') }} </li>
                                        <li> Please send your money to:</li>
                                        <li> Account Number: 000808048274</li>
                                        <li> Account Name: Dave Scott Wong</li>
                                        <li> Account Bank: BDO</li>
                                    </ul>
                                </div>
                            @elseif ($method == 7)
                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($pamount, 2, '.', ',') }} </li>
                                        <li> Please send your money to:</li>
                                        <li> Account Number: 2939087195</li>
                                        <li> Account Name: Joanna Eve</li>
                                        <li> Account Bank: BPI</li>
                                    </ul>
                                </div>
                            @else
                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($pamount, 2, '.', ',') }} </li>
                                        <li> Please use the name to whom you paid for as transaction number:</li>
                                        <li> Ex: C/O Juan Dela Cruz</li>
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
                           			<input class="form-control @error('amount') is-invalid @enderror" type="number" placeholder="Amount" wire:model="amount">

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

                                <div class="form-group">
                                    <select class="form-control @error('package') is-invalid @enderror" wire:model="package">
                                        <option value="package1">
                                            Package 1
                                        </option>

                                        <option value="package2">
                                            Package 2
                                        </option>

                                        <option value="package3">
                                            Package 3
                                        </option>
                                    </select>

                                    @error('package')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li style="color: red;"> Note: 1pm to 6pm schedule for pick up</li>
                                        <li> <i> for consolacion pick up (coffee conclave)</i></li>
                                        <li> <i> for banilad pick up (the space)</i></li>
                                        <li> <i> for cebu city pick up (cityscape baseline mango or it park coffee bean)</i></li>
                                    </ul>
                                </div>

                                <div class="form-group">
                                    <select class="form-control @error('mode') is-invalid @enderror" wire:model="mode">
                                        <option value="pick-up">
                                            Pick Up
                                        </option>

                                        <option value="delivery">
                                            Delivery Fee (150/package) fixed anywhere in cebu
                                        </option>

                                        <option value="shipping">
                                            Shipping fee (250/package) fixed outside cebu
                                        </option>
                                    </select>

                                    @error('mode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @if ($mode != 'pick-up') 
                                    <div class="form-group">
                                        <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Address" wire:model="address">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif

                                @if (!session()->has('paymentsuccess'))
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary"> Submit</button>
                                    </div>
                                @endif
                     		</form>
                  		</div>

                        @if ($method == 3)
                            <div class="col-md-12 text-center mt-2">
                                <img class="img-fluid" src="{{asset('payments/gcash.png')}}" alt="" width="400">
                            </div>
                        @elseif ($method == 6)
                            <div class="col-md-12 text-center mt-2">
                                <img class="img-fluid" src="{{asset('payments/bdo.png')}}" alt="" width="400">
                            </div>
                        @elseif ($method == 7)
                            <div class="col-md-12 text-center mt-2">
                                <img class="img-fluid" src="{{asset('payments/bpi.png')}}" alt="" width="400">
                            </div>
                        @else
                            <div class="col-md-12 text-center mt-2">
                                <img class="img-fluid" src="{{asset('payments/cash.png')}}" alt="" width="250">
                            </div>
                        @endif
               		</div>
            	</div>
         	</div>
      	</div>
  	</div>
</div>