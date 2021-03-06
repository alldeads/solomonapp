@extends('layouts.app')

@section('content')
        
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-8 m-auto">
                @livewire('partials.slider-container', ['from' => 1, 'to' => 25])
            </div>

            <div class="col-md-4 col-lg-4">
                <div class="divider">
                    <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">Registration</span>
                </div>

                @if (auth()->check() && count(auth()->user()->payments->toArray()) == 0)
                    @livewire('registration.first', ['referral' => $referral, 'show' => 'none'])
                    @livewire('registration.second', ['user' => auth()->user(), 'show' => 'block'])
                @else
                    @livewire('registration.first', ['referral' => $referral])
                    @livewire('registration.second')
                @endif
                @livewire('registration.third')
            </div>
        </div>
    </div>

@endsection
