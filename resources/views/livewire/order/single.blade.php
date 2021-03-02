<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Shipping Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputEmail4">First Name</label>
                            <input class="form-control" value="{{ $address->first_name }}" type="text" readonly="true">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="inputPassword4">Last Name</label>
                            <input class="form-control" value="{{ $address->last_name }}" type="text" readonly="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputEmail5">Phone</label>
                            <input class="form-control" value="{{ $address->phone }}" type="text" readonly="true">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Email Address</label>
                            <input class="form-control" value="{{ $address->email }}" type="text" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress5">Address</label>
                        <input class="form-control" value="{{ $address->address }}" type="text" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="inputCity">State/Municipality</label>
                        <input class="form-control" value="{{ $address->state }}" type="text" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">City</label>
                        <input class="form-control" value="{{ $address->city }}" type="text" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress6">Zip Code</label>
                        <input class="form-control" value="{{ $address->zip }}" type="number" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress6">Notes</label>
                        <textarea readonly="true" class="form-control " value="{{ $address->notes }}"></textarea>
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
                                @foreach( $order_details as $item )
                                    <li>{{ $item->product->name }} × {{ $item->product_quantity }} <span>₱{{ number_format($item->product_quantity * $item->product->original_price, 2, '.', ',') }}</span></li>
                                @endforeach
                            </ul>

                            <ul class="sub-total">
                                <li>Subtotal 
                                    <span class="count">
                                        ₱{{ number_format($order->sub_total, 2, '.', ',') }}
                                    </span>
                                </li>
                                <li>Shipping Fee
                                    <span class="count">
                                        ₱{{ number_format($order->shipping_fee, 2, '.', ',') }}
                                    </span>
                                </li>
                                <li class="shipping-class">Shipping Type
                                    <div class="shopping-checkout-option">
                                        <label class="d-block" for="chk-ani">
                                            {{ ucfirst($order->shipping_type) }}
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <ul class="sub-total total">
                                <li>Total <span class="count">₱{{ number_format($order->total, 2, '.', ',') }}</span></li>
                            </ul>
                            <ul class="sub-total">
                                <li class="shipping-class">Payment Method
                                    <div class="shopping-checkout-option">
                                        <label class="d-block" for="chk-ani">
                                            {{ ucfirst($payment->method->name) }}
                                        </label>
                                    </div>
                                </li>
                                <li class="shipping-class">Payment Status
                                    <div class="shopping-checkout-option">
                                        <label class="d-block" for="chk-ani">
                                            {{ ucfirst($payment->status) }}
                                        </label>
                                    </div>
                                </li>

                                <li class="shipping-class">Order Status
                                    <div class="shopping-checkout-option">
                                        <label class="d-block" for="chk-ani">
                                            {{ ucfirst($order->status) }}
                                        </label>
                                    </div>
                                </li>
                            </ul>

                            @if ($payment->status != "received")
                                @if ($method != "cod")
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">

                                            @if($payment->status == "processing")
                                                <div class="alert alert-success mt-2">
                                                    We are still reviewing your payment.
                                                </div>
                                            @else
                                                <div class="alert alert-success mt-2">
                                                    Your order has been placed. Please proceed for payment!
                                                </div>

                                                <a href="{{ route('order.payment', ['order_number' => $order->reference]) }}" class="btn btn-primary">
                                                    Pay Now
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-success mt-2">
                                        Please prepare the exact amount and double check the products upon receiving.
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>