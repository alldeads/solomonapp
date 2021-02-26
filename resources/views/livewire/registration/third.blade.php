<form class="needs-validation" style="display: {{ $show }}">

	@include('partials.toasts')

    <div class="form-row">
        <div class="form-group col">
        	<label class="text-color-light text-3">Mode of Payment<span class="text-color-danger">*</span></label>
            <select class="form-control text-color-light text-4 @error('method') is-invalid @enderror" wire:model="input.method">
                <option value="">
                    Choose Payment Method
                </option>

                @foreach( $methods as $method )
                	<option value="{{ $method->id }}">
                        {{ $method->name }}
                    </option>
                @endforeach
            </select>

            @error('method')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Transaction No.<span class="text-color-danger">*</span></label>
            <input type="text" class="form-control @error('reference') is-invalid @enderror text-color-light text-4" wire:model="input.reference">
            @error('reference')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Amount Paid<span class="text-color-danger">*</span></label>
            <input type="number" class="form-control @error('paid_amount') is-invalid @enderror text-color-light text-4" wire:model="input.paid_amount">
            @error('paid_amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <h4>Instructions</h4>

            @if ($this->input['method'] == 3)
                <div class="form-group">
                    <ul style="line-height: 3;">
                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($amount, 2, '.', ',') }} </li>
                        <li> Login to your Gcash account.</li>
                        <li> Please send your money to:</li>
                        <li> Phone Number: 09773287108</li>
                        <li> Full Name: Joanna Eve P.</li>
                    </ul>
                </div>
            @elseif ($this->input['method'] == 6)
                <div class="form-group">
                    <ul style="line-height: 3;">
                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($amount, 2, '.', ',') }} </li>
                        <li> Please send your money to:</li>
                        <li> Account Number: 000808048274</li>
                        <li> Account Name: Dave Scott Wong</li>
                        <li> Account Bank: BDO</li>
                    </ul>
                </div>
            @elseif ($this->input['method'] == 7)
                <div class="form-group">
                    <ul style="line-height: 3;">
                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($amount, 2, '.', ',') }} </li>
                        <li> Please send your money to:</li>
                        <li> Account Number: 2939087195</li>
                        <li> Account Name: Joanna Eve</li>
                        <li> Account Bank: BPI</li>
                    </ul>
                </div>
            @else
                <div class="form-group">
                    <ul style="line-height: 3;">
                        <li style="color: red;"> Amount to be paid: ₱{{ number_format($amount, 2, '.', ',') }} </li>
                        <li> Please use the name to whom you paid for as transaction number:</li>
                        <li> Ex: C/O Juan Dela Cruz</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    
    <div class="form-row mt-2">
        <div class="form-group col">
            <button href="#" wire:click.prevent="submit" class="btn btn-primary-scale-2  btn-modern btn-block text-uppercase text-light rounded-0 font-weight-bold text-3 py-3">
            	Submit
            </button>
            <button href="#" wire:click.prevent="backToPackage" class="btn btn-primary-scale-2  btn-modern btn-block text-uppercase text-light rounded-0 font-weight-bold text-3 py-3">
            	Edit Package
            </button>
        </div>
    </div>
</form>