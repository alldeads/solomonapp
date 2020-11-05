@extends('layouts.app')

@section('content')
	<div role="main" class="main">
		<div class="slider-container rev_slider_wrapper" style="height: 800px;">
			<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
				<ul>
					<li data-transition="fade" class="slide-overlay slide-overlay-level-7">
						<img src="{{ asset('images/slider.jpg') }}"  
							alt=""
							data-bgposition="center center" 
							data-bgfit="cover" 
							data-bgrepeat="no-repeat" 
							class="rev-slidebg">

						<div class="tp-caption"
							data-x="center" data-hoffset="['-150','-150','-150','-240']"
							data-y="center" data-voffset="['-110','-110','-110','-135']"
							data-start="1000"
							data-transform_in="x:[-300%];opacity:0;s:500;"
							data-transform_idle="opacity:0.2;s:500;">
							<img src="{{ asset('images/slide-title-border.png') }}" alt="">
						</div>

						<div class="tp-caption text-color-light font-weight-normal"
							data-x="center"
							data-y="center" data-voffset="['-110','-110','-110','-135']"
							data-start="700"
							data-fontsize="['22','22','22','40']"
							data-lineheight="['25','25','25','45']"
							data-transform_in="y:[-50%];opacity:0;s:500;">GET TO MEET SIMPLY</div>

						<div class="tp-caption"
							data-x="center" data-hoffset="['150','150','150','240']"
							data-y="center" data-voffset="['-110','-110','-110','-135']"
							data-start="1000"
							data-transform_in="x:[300%];opacity:0;s:500;"
							data-transform_idle="opacity:0.2;s:500;">
							<img src="{{ asset('images/slide-title-border.png') }}" alt="">
						</div>

						<h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
							data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
							data-x="center"
							data-y="center" data-voffset="['-60','-60','-60','-85']"
							data-fontsize="['50','50','50','90']"
							data-lineheight="['55','55','55','95']">THE BEST DROP SHIPPING</h1>

						<div class="tp-caption font-weight-light text-center"
							data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
							data-x="center"
							data-y="center" data-voffset="['0','0','0','-25']"
							data-fontsize="['18','18','18','50']"
							data-lineheight="['29','29','29','40']"
							style="color: #b5b5b5;">Trusted by over <strong class="text-color-light">30,000</strong> satisfied users, Solomon App is a huge sucess in the of<br>one of the world's largest MarketPlace.</div>
		
						<a class="tp-caption btn btn-light-2 btn-outline btn-rounded font-weight-semibold"
							data-frames='[{"delay":4500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
							data-hash
							data-hash-offset="85"
							href="#main"
							data-x="center" data-hoffset="0"
							data-y="center" data-voffset="['100','100','100','75']"
							data-whitespace="nowrap"	
							data-fontsize="['15','15','15','33']"	
							data-paddingtop="['15','15','15','40']"
							data-paddingright="['45','45','45','110']"
							data-paddingbottom="['15','15','15','40']"				 
							data-paddingleft="['45','45','45','110']">GET STARTED NOW!</a>
						
					</li>
					<li data-transition="fade" class="slide-overlay slide-overlay-level-7">
						<img src="{{ asset('images/slider.jpg') }}"  
							alt=""
							data-bgposition="center center" 
							data-bgfit="cover" 
							data-bgrepeat="no-repeat" 
							class="rev-slidebg">

						<div class="tp-caption"
							data-x="center" data-hoffset="['-115','-115','-115','-185']"
							data-y="center" data-voffset="['-110','-110','-110','-135']"
							data-start="1000"
							data-transform_in="x:[-300%];opacity:0;s:500;"
							data-transform_idle="opacity:0.2;s:500;">
							<img src="{{ asset('images/slide-title-border.png') }}" alt="">
						</div>

						<div class="tp-caption text-color-light font-weight-normal"
							data-x="center"
							data-y="center" data-voffset="['-110','-110','-110','-135']"
							data-start="700"
							data-fontsize="['22','22','22','40']"
							data-lineheight="['25','25','25','45']"
							data-transform_in="y:[-50%];opacity:0;s:500;">WE ARE DESIGN</div>

						<div class="tp-caption"
							data-x="center" data-hoffset="['115','115','115','185']"
							data-y="center" data-voffset="['-110','-110','-110','-135']"
							data-start="1000"
							data-transform_in="x:[300%];opacity:0;s:500;"
							data-transform_idle="opacity:0.2;s:500;">
							<img src="{{ asset('images/slide-title-border.png') }}" alt="">
						</div>

						<div class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
							data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
							data-x="center"
							data-y="center" data-voffset="['-60','-60','-60','-85']"
							data-fontsize="['50','50','50','90']"
							data-lineheight="['55','55','55','95']">SPECIALISTS</div>

						<div class="tp-caption font-weight-light text-center"
							data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
							data-x="center"
							data-y="center" data-voffset="['-10','-10','-10','-25']"
							data-fontsize="['18','18','18','50']"
							data-lineheight="['29','29','29','40']"
							style="color: #b5b5b5;">Designers thinking outside the box, learn more about us.</div>
		
						<a class="tp-caption btn btn-light-2 btn-outline btn-rounded font-weight-semibold"
							data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
							data-hash
							data-hash-offset="85"
							href="#main"
							data-x="center" data-hoffset="0"
							data-y="center" data-voffset="['70','70','70','45']"
							data-whitespace="nowrap"	
							data-fontsize="['15','15','15','33']"	
							data-paddingtop="['15','15','15','40']"
							data-paddingright="['45','45','45','110']"
							data-paddingbottom="['15','15','15','40']"				 
							data-paddingleft="['45','45','45','110']">GET STARTED NOW!</a>
						
					</li>
				</ul>
			</div>
		</div>

		<div class="home-intro" id="home-intro">
			<div class="container">

				<div class="row align-items-center">
					<div class="col-lg-8">
						<p>
							The fastest way to grow your business with the leader in <span class="highlighted-word">Technology</span>
							<span>Check out our options and features included.</span>
						</p>
					</div>
					<div class="col-lg-4">
						<div class="get-started text-left text-lg-right">
							<a href="#" class="btn btn-primary btn-lg text-3 font-weight-semibold px-4 py-3">Get Started Now</a>
							<div class="learn-more">or <a href="index.html">learn more.</a></div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="container">
			<div class="row text-center pt-3">
				<div class="col-md-10 mx-md-auto">
					<h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeInUpShorter">
						<span>Solomon is </span>
						<span class="word-rotator-words bg-primary">
							<b class="is-visible">incredibly</b>
							<b>especially</b>
							<b>extremely</b>
						</span>
						<span> beautiful and fully responsive.</span>
					</h1>
					<p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
					</p>
				</div>
			</div>

		</div>

		<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
			<div class="home-concept mt-5">
				<div class="container">
					<div class="row text-center">
						<span class="sun"></span>
						<span class="cloud"></span>
						<div class="col-lg-2 ml-lg-auto">
							<div class="process-image">
								<img src="{{ asset('images/home-concept-item-1.png') }}" alt="" />
								<strong>Direct Selling</strong>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="process-image process-image-on-middle">
								<img src="{{ asset('images/home-concept-item-2.png') }}" alt="" />
								<strong>Personal Points</strong>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="process-image">
								<img src="{{ asset('images/home-concept-item-3.png') }}" alt="" />
								<strong>Partner Points</strong>
							</div>
						</div>
						<div class="col-lg-4 ml-lg-auto">
							<div class="project-image">
								<div id="fcSlideshow" class="fc-slideshow">
									<ul class="fc-slides">
										<li>
											<a href="portfolio-single-wide-slider.html">
												<img class="img-responsive" src="{{ asset('images/project-home-1.jpg') }}" alt="" />
											</a>
										</li>
										<li><a href="portfolio-single-wide-slider.html"><img class="img-responsive" src="{{ asset('images/project-home-2.jpg') }}" alt="" /></a></li>
										<li><a href="portfolio-single-wide-slider.html"><img class="img-responsive" src="{{ asset('images/project-home-3.jpg') }}" alt="" /></a></li>
									</ul>
								</div>
								<strong class="our-work">Our Work</strong>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="container my-5 py-3" id="main">
			<div class="row pt-4">
				<div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
					<div class="feature-box feature-box-style-2">
						<div class="feature-box-icon">
							<i class="icon-user-following icons"></i>
						</div>
						<div class="feature-box-info">
							<h4 class="font-weight-bold mb-2">Customer Support</h4>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 appear-animation" data-appear-animation="fadeIn">
					<div class="feature-box feature-box-style-2">
						<div class="feature-box-icon">
							<i class="icon-present icons"></i>
						</div>
						<div class="feature-box-info">
							<h4 class="font-weight-bold mb-2">Rewards</h4>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
					<div class="feature-box feature-box-style-2">
						<div class="feature-box-icon">
							<i class="icon-paypal icons"></i>
						</div>
						<div class="feature-box-info">
							<h4 class="font-weight-bold mb-2">Supported Payments</h4>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection