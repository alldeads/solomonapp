<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Shipping Details</h5>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="saveAddress">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="inputAddress5">Saved Addresses</label>
                            <select class="form-control @error('first_name') is-invalid @enderror" wire:model="address_id">
                                <option value="0">New Address</option>

                                @foreach($addresses as $address)
                                    <option value="{{ $address->id }}"> 
                                        {{ $address->address }}
                                    </option>
                                @endforeach
                            </select>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="inputEmail4">First Name</label>
                                <input class="form-control @error('first_name') is-invalid @enderror" wire:model="first_name" type="text">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="inputPassword4">Last Name</label>
                                <input class="form-control @error('last_name') is-invalid @enderror" wire:model="last_name" type="text">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="inputEmail5">Phone</label>
                                <input class="form-control @error('phone') is-invalid @enderror" wire:model="phone" type="text">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" wire:model="email" type="text">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress5">Address</label>
                            <input class="form-control @error('address') is-invalid @enderror" wire:model="address" type="text">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputCity">State/Municipality</label>
                            <input class="form-control @error('state') is-invalid @enderror" wire:model="state" type="text">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">City</label>
                            <input class="form-control @error('city') is-invalid @enderror" wire:model="city" type="text">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress6">Zip Code</label>
                            <input class="form-control @error('zip') is-invalid @enderror" wire:model="zip" type="number">
                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress6">Notes</label>

                            <textarea class="form-control @error('notes') is-invalid @enderror" wire:model="notes">
                                
                            </textarea>
                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="checkout-details">
                            <div class="order-box">
                                <div class="title-box">
                                    <div class="checkbox-title">
                                        <h4>Product </h4>
                                        <span>Total</span>
                                    </div>
                                </div>

                                <ul class="qty">
                                    @foreach( $items as $item )
                                        <li>{{ $item->product->name }} × {{ $item->quantity }} <span>₱{{ number_format($item->quantity * $item->product->original_price, 2, '.', ',') }}</span></li>
                                    @endforeach
                                </ul>

                                <ul class="sub-total">
                                    <li>Subtotal 
                                        <span class="count">
                                            ₱{{ number_format($sub_total, 2, '.', ',') }}
                                        </span>
                                    </li>
                                    <li class="shipping-class">Shipping
                                        <div class="shopping-checkout-option">
                                            <label class="d-block" for="chk-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" wire:model="shipping_type" value="1" checked="">Pick-up
                                            </label>
                                            <label class="d-block" for="chk-ani1">
                                                <input class="radio_animated" id="edo-ani" wire:model="shipping_type" type="radio" value="2">Delivery
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="sub-total total">
                                    <li>Total <span class="count">₱{{ number_format($total, 2, '.', ',') }}</span></li>
                                </ul>
                                <div class="animate-chk">
                                    <div class="row">
                                        <div class="col">
                                            {{-- <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="" data-original-title="" title="">Check Payments
                                            </label> --}}

                                            @foreach($payment_options as $payment)
                                                <label class="d-block" for="{{ $payment->abbr }}">
                                                    <input class="radio_animated" id="{{ $payment->abbr }}" type="radio" wire:model="payment_option" value="{{ $payment->id }}">{{ $payment->name }}
                                                </label>
                                            @endforeach
                                            
                                            {{-- <label class="d-block" for="edo-ani2">
                                                <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="" data-original-title="" title="">PayPal<img class="img-paypal" src="{{asset('images/paypal.png')}}" alt="">
                                            </label> --}}
                                        </div>
                                    </div>
                                </div>
                                @if (session()->has('checkoutsuccess'))
                                    <div class="alert alert-success mt-2">
                                        {{ session('checkoutsuccess') }}
                                    </div>
                                @endif

                                @if (session()->has('checkouterror'))
                                    <div class="alert alert-success">
                                        {{ session('checkouterror') }}
                                    </div>
                                @endif

                                @if (!session()->has('checkoutsuccess'))
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">
                                            Place Order
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>