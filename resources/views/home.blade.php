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
    <div class="row second-chart-list third-news-update">
        @if ( auth()->user()->status == "inactive" )
            <div class="col-12 alert alert-warning text-center">
                Your account is inactive. Please proceed for payment to unlock our rewards.<br>
                <a href="{{ route('account.payment') }}" class="btn btn-danger mt-2"> Pay Now</a>
            </div>
        @endif
        <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12" style="display: none;">
            <div class="card o-hidden profile-greeting">
                <div class="card-body">
                    <div class="media">
                        <div class="badge-groups w-100">
                            <div class="badge f-12">
                                <i class="mr-1" data-feather="clock"></i>
                                <span id="txt"></span>
                            </div>
                            <div class="badge f-12">
                                <i class="fa fa-spin fa-cog f-14"></i>
                            </div>
                        </div>
                    </div>
                    <div class="greeting-user text-center">
                        <div class="profile-vector">
                            <img class="img-fluid" src="{{asset('dashboard/images/dashboard/welcome.png')}}" alt="">
                        </div>
                        <h4 class="f-w-600">
                            <span id="greeting">Good Morning</span>
                            <span class="right-circle">
                                <i class="fa fa-check-circle f-14 middle"></i>
                            </span>
                        </h4>
                        <p>
                            <span> You have done 57.6% more sales today. Check your new badge in your profile.</span>
                        </p>
                        <div class="whatsnew-btn">
                            <a class="btn btn-primary">Whats New !</a>
                        </div>
                        <div class="left-icon">
                            <i class="fa fa-bell"> </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
            <div class="card earning-card">
                <div class="card-body p-0">
                    <div class="row m-0">
                        <div class="col-xl-3 earning-content p-0">
                            <div class="row m-0 chart-left">
                                <div class="col-xl-12 p-0 left_side_earning">
                                    <h5>Dashboard</h5>
                                    {{-- <p class="font-roboto">Overview of last month</p> --}}
                                </div>
                                <div class="col-xl-12 p-0 left_side_earning">
                                    <h5>₱{{ number_format($data['this_month']['monthly_gross'], 2, '.', ',') }}</h5>
                                    <p class="font-roboto">This Month Gross</p>
                                </div>
                                <div class="col-xl-12 p-0 left_side_earning">
                                    <h5>₱{{ number_format($data['this_month']['monthly_profit'], 2, '.', ',') }}</h5>
                                    <p class="font-roboto">This Month Profit</p>
                                </div>
                                <div class="col-xl-12 p-0 left_side_earning">
                                    <h5>₱{{ number_format($data['last_month']['monthly_gross'], 2, '.', ',') }}</h5>
                                    <p class="font-roboto">Last Month Gross</p>
                                </div>
                                <div class="col-xl-12 p-0 left_side_earning">
                                    <h5>₱{{ number_format($data['last_month']['monthly_profit'], 2, '.', ',') }}</h5>
                                    <p class="font-roboto">Last Month Profit</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 p-0">
                            <div class="chart-right">
                                <div class="row m-0 p-tb">
                                    <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                                        <div class="inner-top-left">
                                            <ul class="d-flex list-unstyled">
                                                <li class="active">Monthly</li>
                                            </ul>
                                        </div>
                                    </div>
                                     <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                                        <div class="inner-top-right">
                                            <ul class="d-flex list-unstyled justify-content-end">
                                                <li>Online</li>
                                                <li>Store</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card-body p-0">
                                            <div class="current-sale-container">
                                                <div id="chart-currently"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row border-top m-0">
                                <div class="col-xl-4 pl-0 col-md-6 col-sm-6">
                                    <div class="media p-0">
                                        <div class="media-left">
                                            <i class="icofont icofont-cur-dollar"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6>Lifetime Earnings</h6>
                                            <p>₱{{ number_format($user->commission, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="media p-0">
                                        <div class="media-left bg-secondary">
                                            <i class="icofont icofont-heart-alt"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6>Available Rewards</h6>
                                            <p>{{ $rewards }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12 pr-0">
                                    <div class="media p-0">
                                        <div class="media-left">
                                            <i class="icofont icofont-crown"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6>Available Points</h6>
                                            <p>{{ $user->available_points }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 xl-100 chart_data_left box-col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row m-0 chart-main">
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $user->direct_recruits }}</h4>
                                        <span>Recruits </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart1 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $user->product_sold }}</h4>
                                        <span>Sold Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart2 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{ $data['claimed_rewards'] }}</h4>
                                        <span>Claimed Rewards</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media border-none align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart3 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>0</h4>
                                        <span>Vouchers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 xl-50 chart_data_right box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body right-chart-content">
                            <h4>$95,900<span class="new-box">Hot</span></h4>
                            <span>Purchase Order Value</span>
                        </div>
                        <div class="knob-block text-center">
                            <input class="knob1" data-width="10" data-height="70" data-thickness=".3" data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff" data-bgcolor="#eef5fb" value="60">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 xl-50 chart_data_right box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body right-chart-content">
                            <h4>$95,000<span class="new-box">New</span></h4>
                            <span>Product Order Value</span>
                        </div>
                        <div class="knob-block text-center">
                            <input class="knob1" data-width="50" data-height="70" data-thickness=".3" data-fgcolor="#7366ff" data-linecap="round" data-angleoffset="0" value="60">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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


