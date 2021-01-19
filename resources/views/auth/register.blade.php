@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        {{-- <div class="col-12">
            <div class="blog-posts single-post">
                <article class="post post-large blog-single-post border-0 m-0 p-0">
                    <div class="post-image ml-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/45830194?color=ffffff&title=0&byline=0&portrait=0&badge=0" width="640" height="360" allowfullscreen></iframe>
                        </div>
                    </div>
                </article>
            </div>
        </div> --}}

        <div class="col-12">
            <div class="owl-carousel nav-inside show-nav-hover dots-inside mb-0" data-plugin-options="{'items': 1, 'loop': true, 'autoplay': true, 'autoplayTimeout': 3000, 'autoplayHoverPause': true, 'nav': true, 'dots': true, 'animateOut': 'fadeOut'}">

                @for( $i = 1; $i < 26; $i++ )
                    <div>
                        <img src="{{ asset('sliders/'. $i .'.png') }}" data-thumb="{{ asset('sliders/'. $i .'.png') }}" alt="" />
                    </div>
                @endfor
            </div>
        </div>

        <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
            <div class="divider">
                <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">Registration</span>
            </div>
            <form method="POST" action="{{ route('referral', ['username' => $referral->username]) }}" class="needs-validation">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label class="text-color-light text-3">Sponsor Name<span class="text-color-danger">*</span></label>
                        <input type="text" name="first_name" value="{{ $referral->full_name }}" class="form-control text-color-light text-4" readonly="true">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="text-color-light text-3">First Name<span class="text-color-danger">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror text-color-light text-4" required>
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
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror text-color-light text-4" required>
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
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror text-color-light text-4" required>
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
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror text-color-light text-4" required>
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
                <div class="form-row">
                    <div class="form-group col">
                        <label class="text-color-light text-3">Confirm Password<span class="text-color-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control text-color-light text-4" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <button type="submit" class="btn btn-primary-scale-2  btn-modern btn-block text-uppercase text-light rounded-0 font-weight-bold text-3 py-3">Sign-up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
