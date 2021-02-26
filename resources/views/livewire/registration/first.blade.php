<form class="needs-validation" style="display: {{ $show }}">

	@include('partials.toasts')

    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">First Name<span class="text-color-danger">*</span></label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror text-color-light text-4" wire:model="input.first_name">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Last Name<span class="text-color-danger">*</span></label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror text-color-light text-4" wire:model="input.last_name">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Email Address<span class="text-color-danger">*</span></label>
            <input type="text" class="form-control @error('email') is-invalid @enderror text-color-light text-4" wire:model="input.email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Phone Number<span class="text-color-danger">*</span></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror text-color-light text-4" wire:model="input.phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Username<span class="text-color-danger">*</span></label>
            <input type="text" wire:model="input.username" class="form-control @error('username') is-invalid @enderror text-color-light text-4">
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label class="text-color-light text-3">Password <span class="text-color-danger">*</span></label>
            <input type="password" wire:model="input.password" class="form-control @error('password') is-invalid @enderror text-color-light text-4">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- @if($errors->any())
        <div class="alert alert-danger mt-2 text-center">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif --}}

    {{-- @if(session()->has('registererror'))
        <div class="alert alert-danger mt-2 text-center">
            {{ session('registererror') }}
        </div>
    @endif --}}

    <div class="form-row mt-2">
        <div class="form-group col">
            <button href="#" wire:click.prevent="submit" class="btn btn-primary-scale-2  btn-modern btn-block text-uppercase text-light rounded-0 font-weight-bold text-3 py-3">
            	Proceed: Select Package
            </button>
        </div>
    </div>
</form>