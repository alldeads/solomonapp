<form class="needs-validation" style="display: {{ $show }}">

	@include('partials.toasts')

    <div class="form-row">
        <div class="form-group col">
        	<label class="text-color-light text-3">Package<span class="text-color-danger">*</span></label>
            <select class="form-control text-color-light text-4 @error('package') is-invalid @enderror" wire:model="input.package">
                <option value="starterpack-a">
                    Starter Pack A
                </option>

                <option value="starterpack-b">
                    Starter Pack B
                </option>

                <option value="starterpack-c">
                    Starter Pack C
                </option>

                <option value="starterpack-d">
                    Starter Pack D
                </option>
            </select>

            @error('package')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            @if ($this->input['package'] == "starterpack-a")
                <div class="col-md-12 text-center mt-2">
                    <img class="img-fluid" src="{{asset('packages/package-a.jpg')}}">
                </div>
            @elseif ($this->input['package'] == "starterpack-b")
                <div class="col-md-12 text-center mt-2">
                    <img class="img-fluid" src="{{asset('packages/package-b.jpg')}}">
                </div>
            @elseif ($this->input['package'] == "starterpack-c")
                <div class="col-md-12 text-center mt-2">
                    <img class="img-fluid" src="{{asset('packages/package-c.jpg')}}">
                </div>
            @else
                <div class="col-md-12 text-center mt-2">
                    <img class="img-fluid" src="{{asset('packages/package-d.jpg')}}">
                </div>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Delivery Option<span class="text-color-danger">*</span></label>
            <select class="form-control text-color-light text-4 @error('option') is-invalid @enderror" wire:model="input.option">

            	<option value="">
                    Choose Delivery Option
                </option>

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

            @error('option')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @if($this->input['option'] == "pick-up")
	            <small style="color: red;">Pick Up Locations: 
	            	</br> Consolacion (Coffee Conclave) 
	            	</br> Banilad (The Space) 
	            	</br> Cebu City (CityScape Baseline Mango or IT Park Coffee Bean) 
	            </small>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Address<span class="text-color-danger">*</span></label>
            <input type="text" class="form-control @error('address') is-invalid @enderror text-color-light text-4" wire:model="input.address">
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="form-row mt-2">
        <div class="form-group col">
            <button href="#" wire:click.prevent="submit" class="btn btn-primary-scale-2  btn-modern btn-block text-uppercase text-light rounded-0 font-weight-bold text-3 py-3">
            	Proceed: Payment
            </button>
        </div>
    </div>
</form>