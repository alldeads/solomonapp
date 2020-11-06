@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
            <div class="divider">
                <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">Registration</span>
            </div>
            <form method="POST" action="{{ route('login') }}" class="needs-validation">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label class="text-color-light text-3">Username<span class="text-color-danger">*</span></label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror text-color-light text-4" required>
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
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror text-color-light text-4" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row justify-content-between">
                    <div class="form-group col-md-auto">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group col-md-auto">
                        <a class="text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-2" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <button type="submit" class="btn btn-primary-scale-2  btn-modern btn-block text-uppercase text-light rounded-0 font-weight-bold text-3 py-3">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
