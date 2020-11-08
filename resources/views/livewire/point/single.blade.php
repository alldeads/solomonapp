<div class="col-xl-3 col-sm-6 xl-4">
   	<div class="card">
   		@if ( session()->has('itemsuccess') )
            <div class="alert alert-success text-center">
            	{{ session('itemsuccess') }}
			</div>
		@endif

		@if ( session()->has('itemerror') )
            <div class="alert alert-danger text-center">
            	{{ session('itemerror') }}
			</div>
		@endif
      	<div class="product-box">
         	<div class="product-img {{ auth()->user()->available_points < $item->points ? "item-blurred" : "" }}">
            	<img class="img-fluid" src="{{ asset($item->avatar) }}" alt="">

            	@if (auth()->user()->available_points >= $item->points )
	            	<div class="product-hover point-item-hover">
	               		<button class="btn btn-primary" wire:click="redeem_item"> Redeem
		                </button>
	            	</div>
            	@endif
         	</div>
         	<div class="product-details">
	            <div class="rating">
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            </div>
	            <h4>{{ $item->name }}</h4>
	            <p>Simply dummy text of the printing.</p>
	            <div class="product-price">{{ $item->points }}
	            </div>
         	</div>
      	</div>
   	</div>
</div>