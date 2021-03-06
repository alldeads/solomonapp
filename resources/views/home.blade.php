@extends('layouts.dashboard')

@section('title', 'Default')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Home</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">

        @if ( $user->status == "inactive" )
            @if ( !$data['payment'] )
                <div class="col-12 alert alert-warning text-center">
                    Your account is inactive. Please proceed for payment to unlock your rewards. If you paid already, please wait 24-48 hours for account activation.<br>
                    <a href="{{ route('account.payment') }}" class="btn btn-danger mt-2"> Pay Now</a>
                </div>
            @else
                <div class="col-12 alert alert-info text-center">
                    Your payment has been processed and your payment will be posted within 24 hours. If you have any concern about this payment, please send us a message in messenger.</a>
                </div>
            @endif
        @endif
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card o-hidden">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                        <div class="media-body">
                            <span class="m-0">Lifetime Earnings</span>
                            <h4 class="mb-0 counter">₱{{ number_format($user->lifetime_earning, 2, '.', ',') }}</h4>
                            <i class="icon-bg" data-feather="dollar-sign"></i>
                         </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card o-hidden">
                <div class="bg-success b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                        <div class="media-body">
                            <span class="m-0">Direct Selling Bonus</span>
                            <h4 class="mb-0 counter">₱{{ number_format($user->commission, 2, '.', ',') }}</h4>
                            <i class="icon-bg" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card o-hidden">
                <div class="bg-danger b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                        <div class="media-body">
                            <span class="m-0">Personal Points Bonus</span>
                            <h4 class="mb-0 counter">{{ $user->ppb }}</h4>
                            <i class="icon-bg" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card o-hidden">
                <div class="bg-info b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                        <div class="media-body">
                            <span class="m-0">Happy 5 Pass Up Bonus</span>
                            <h4 class="mb-0 counter">{{ $user->hppb }}</h4>
                            <i class="icon-bg" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card o-hidden">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="users"></i></div>
                        <div class="media-body">
                            <span class="m-0">Total Network</span>
                            <h4 class="mb-0 counter">{{ $data['network'] }}</h4>
                            <i class="icon-bg" data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('dashboard/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('dashboard/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('dashboard/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('dashboard/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('dashboard/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('dashboard/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('dashboard/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('dashboard/js/dashboard/default.js')}}"></script>
<script src="{{asset('dashboard/js/notify/index.js')}}"></script>
<script src="{{asset('dashboard/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('dashboard/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('dashboard/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
@endsection


