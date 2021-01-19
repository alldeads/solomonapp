@extends('layouts.app')

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-12 m-auto">
            <div class="owl-carousel nav-inside show-nav-hover dots-inside mb-0" data-plugin-options="{'items': 1, 'loop': true, 'autoplay': true, 'autoplayTimeout': 3000, 'autoplayHoverPause': true, 'nav': true, 'dots': true, 'animateOut': 'fadeOut'}">

                @for( $i = 7; $i < 21; $i++ )
                    <div>
                        <img src="{{ asset('sliders/'. $i .'.png') }}" data-thumb="{{ asset('sliders/'. $i .'.png') }}" alt="" />
                    </div>
                @endfor
            </div>
        </div>
	</div>

@endsection