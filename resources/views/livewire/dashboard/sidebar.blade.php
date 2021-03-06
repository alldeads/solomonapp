<div class="sidebar-wrapper">
    <div class="logo-wrapper">
        <a href="{{route('home')}}">
            <img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="" />
            <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="" />
        </a>
        <div class="back-btn">
            <i class="fa fa-angle-left"></i>
        </div>
        <div class="toggle-sidebar">
            <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
        </div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{route('home')}}">
            <img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt="" />
        </a>
    </div>

    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow">
            <i data-feather="arrow-left"></i>
        </div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="{{route('home')}}">
                        <img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt="" />
                    </a>
                    <div class="mobile-back text-right">
                        <span>Back</span>
                        <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-1">{{ trans('lang.General') }}  </h6>
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title active" href="{{ route('home') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                        </div>
                   </a>
                </li>

                @if ( auth()->user()->status == "active" )

                    <li class="sidebar-list">
                        <label class="badge badge-danger">{{ $this->products }}</label>
                        <a class="sidebar-link sidebar-title active" href="{{ route('product') }}">
                            <i data-feather="shopping-bag"></i>
                            <span>Products</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/products' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-danger">{{ $this->downlines }}</label>
                        <a class="sidebar-link sidebar-title active" href="{{ route('network.index') }}">
                            <i data-feather="users"></i>
                            <span>Network</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/products' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-warning">{{ $points }}</label>
                        <a class="sidebar-link sidebar-title active" href="{{ route('points') }}">
                            <i data-feather="gift"></i>
                            <span>Points System</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="{{ route('vouchers') }}">
                            <i data-feather="box"></i>
                            <span>Vouchers</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="{{ route('referral.invite') }}">
                            <i data-feather="user-plus"></i>
                            <span>Invite Friends</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="{{ route('cart') }}">
                            <i data-feather="shopping-cart"></i>
                            <span>Cart</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/cart' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#">
                            <i data-feather="archive"></i>
                            <span>Activities</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/activities' ? 'down' : 'right' }}"></i>
                            </div>
                        </a>

                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/activities' ? 'block;' : 'none;' }}">
                            <li>
                                <a href="{{route('orders')}}">
                                    Order History
                                </a>
                            </li>
                            <li>
                                <a href="{{route('point.history')}}">
                                    Redeem History
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title active" href="#">
                            <i data-feather="dollar-sign"></i>
                            <span>Cash Transactions</span>
                            <div class="according-menu">
                                <i class="fa fa-angle-{{request()->route()->getPrefix() == '/transactions' ? 'down' : 'right' }}"></i>
                            </div>
                       </a>

                       <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/activities' ? 'block;' : 'none;' }}">
                            <li>
                                <a href="{{ route('transaction.cash') }}">
                                    Cash Out
                                </a>
                            </li>
                            <li>
                                <a href="{{route('transaction.history')}}">
                                    Transactions History
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                        <i data-feather="user"></i>
                        <span>Account</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{request()->route()->getPrefix() == '/profile' ? 'down' : 'right' }}"></i>
                        </div>
                   </a>
                   <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/profile' ? 'block;' : 'none;' }}">
                        <li>
                            <a href="{{ route('profile') }}">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('password') }}">
                                Password
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="log-in"></i>
                        <span>Log-out</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                        </div>
                   </a>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>
