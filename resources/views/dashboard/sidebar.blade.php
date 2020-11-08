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
                    <label class="badge badge-success">5</label>
                    <a class="sidebar-link sidebar-title active" href="{{ route('home') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                        </div>
                   </a>
                </li>

                <li class="sidebar-list">
                    <label class="badge badge-danger">5</label>
                    <a class="sidebar-link sidebar-title active" href="{{ route('home') }}">
                        <i data-feather="shopping-bag"></i>
                        <span>Products</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                        </div>
                   </a>
                </li>

                <li class="sidebar-list">
                    <label class="badge badge-warning">5</label>
                    <a class="sidebar-link sidebar-title active" href="{{ route('home') }}">
                        <i data-feather="gift"></i>
                        <span>Points System</span>
                        <div class="according-menu">
                            <i class="fa fa-angle-{{request()->route()->getPrefix() == '/home' ? 'down' : 'right' }}"></i>
                        </div>
                   </a>
                </li>

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
                            <a href="{{route('profile')}}">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="#">
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
