<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper">
            <div class="logo-wrapper">
                <a href="{{route('home')}}">
                    <img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt="" />
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="sliders"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper pl-0"> </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <i data-feather="bell"> </i>
                        <span class="badge badge-pill badge-secondary">4 </span>
                    </div>
                     <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <i data-feather="bell"></i>
                            <h6 class="f-18 mb-0">Notitications</h6>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle-o mr-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span>
                            </p>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="#">Check all notification</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="cart-nav onhover-dropdown">
                    <div class="cart-box">
                        <i data-feather="shopping-cart"></i>
                        <span class="badge badge-pill badge-primary">2</span>
                    </div>
                    <ul class="cart-dropdown onhover-show-div">
                        <li>
                            <h6 class="mb-0 f-20">Shoping Bag</h6>
                            <i data-feather="shopping-cart"></i>
                        </li>
                    </ul>
                </li>
        
                <li class="maximize">
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">     <i data-feather="maximize"></i>
                    </a>
                </li>
                <li class="profile-nav onhover-dropdown p-0 mr-0">
                    <div class="media profile-media">
                        <img class="b-r-10" src="{{asset('/images/profile.jpg')}}" alt="" />
                        <div class="media-body">
                            <span>{{ auth()->user()->first_name }}</span>
                            <p class="mb-0 font-roboto">Admin 
                                <i class="middle fa fa-angle-down"></i>
                            </p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('profile') }}"><i data-feather="user"></i>
                                <span>Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"> </i>
                                <span>Log out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>