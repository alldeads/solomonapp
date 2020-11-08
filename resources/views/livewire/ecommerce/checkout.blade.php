<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Shipping Details</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <form wire:submit.prevent="saveAddress">
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
                    </form>
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
                                <li>Pink Slim Shirt × 1 <span>$25.10</span></li>
                                <li>SLim Fit Jeans × 1 <span>$555.00</span></li>
                            </ul>

                            <ul class="sub-total">
                                <li>Subtotal 
                                    <span class="count">$380.10
                                    </span>
                                </li>
                                <li class="shipping-class">Shipping
                                    <div class="shopping-checkout-option">
                                        <label class="d-block" for="chk-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" name="shipping_type" checked="">Pick-up
                                        </label>
                                        <label class="d-block" for="chk-ani1">
                                            <input class="radio_animated" id="edo-ani" name="shipping_type" type="radio">Delivery
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <ul class="sub-total total">
                                <li>Total <span class="count">$620.00</span></li>
                            </ul>
                            <div class="animate-chk">
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="edo-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="" data-original-title="" title="">Check Payments
                                        </label>
                                        <label class="d-block" for="edo-ani1">
                                            <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani" data-original-title="" title="">Cash On Delivery
                                        </label>
                                        <label class="d-block" for="edo-ani2">
                                            <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="" data-original-title="" title="">PayPal<img class="img-paypal" src="{{asset('images/paypal.png')}}" alt="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-primary" href="#">Place Order  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>