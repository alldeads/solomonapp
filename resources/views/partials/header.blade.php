<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
	<div class="header-body border-top-0">
		<div class="header-top">
			<div class="container">
				<div class="header-row py-2">
					<div class="header-column justify-content-start">
						<div class="header-row">
							<nav class="header-nav-top">
								<ul class="nav nav-pills">
									@auth
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					                        @csrf
					                    </form>

					                    <li class="nav-item nav-item-anim-icon">
											<a class="nav-link" href="{{ route('logout') }}"
		                                       onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                        <i class="fas fa-angle-right"></i>{{ __('Logout') }}
		                                    </a>
										</li>
									@else
										<li class="nav-item nav-item-anim-icon">
											<a class="nav-link pl-0" href="{{ route('login')}}"><i class="fas fa-angle-right"></i> Login</a>
										</li>
										<li class="nav-item nav-item-anim-icon">
											<a class="nav-link" href="{{ route('referral', ['username' => 'solomon']) }}"><i class="fas fa-angle-right"></i> Create Account</a>
										</li>
									@endauth
									<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
										<span class="ws-nowrap"><i class="fas fa-phone"></i> (+63) 995-7554-420</span>
									</li>

									<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
										<span class="ws-nowrap"><i class="fas fa-phone"></i> (+63) 915-2709-408</span>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="header-column justify-content-end">
						<div class="header-row">
							<ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">
								<li class="social-icons-facebook"><a href="https://www.facebook.com/Solomon-103519311594709/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="/">
								<img alt="Porto" width="200" data-sticky-width="200" src="{{ asset('images/logo-2.jpg') }}">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
							<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<li class="dropdown">
											<a class="dropdown-item " href="/">
												Home
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item " href="/">
												Beginners Guide
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item " href="/">
												Opportunities
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item " href="/">
												Products
											</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item " href="{{ route('contact') }}">
												Contact Us
											</a>
										</li>
									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
								<i class="fas fa-bars"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>