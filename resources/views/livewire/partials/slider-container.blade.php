<div class="row justify-content-center p-2">
	<div class="col-xs-12 col-md-12 col-lg-10 m-auto">
        <div class="owl-carousel nav-inside show-nav-hover dots-inside mb-0" data-plugin-options="{'items': 1, 'loop': true, 'autoplay': true, 'autoplayTimeout': 3000, 'autoplayHoverPause': true, 'nav': true, 'dots': false, 'animateOut': 'fadeOut'}">
            @for( $i = $from; $i < $to; $i++ )
                <div>
                    <img src="{{ asset('sliders/'. $i .'.png') }}" data-thumb="{{ asset('sliders/'. $i .'.png') }}" alt="" />
                </div>
            @endfor
        </div>
    </div>
</div>