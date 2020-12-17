<div class="col-xl-3 col-sm-6 xl-4">
   	<div class="card">
   		@if ( session()->has('cartsuccess') )
            <div class="alert alert-success text-center">
            	{{ session('cartsuccess') }}
			</div>
		@endif
      	<div class="product-box">
         	<div class="product-img">
            	<img class="img-fluid" src="{{ str_replace('public', 'storage', asset($product->avatar)) }}" alt="">
            	<div class="product-hover">
               		<ul>
                  		<li>
	                     	<button class="btn" wire:click="add_to_cart">
	                     		<i class="icon-shopping-cart"></i>
	                     	</button>
                  		</li>
                  		<li>
                     		<button class="btn" type="button" data-toggle="modal" data-target="#productModal{{$product->id}}">
                     			<i class="icon-eye"></i>
                     		</button>
                  		</li>
               		</ul>
            	</div>
         	</div>
         	<div wire:ignore.self class="modal fade" id="productModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
               		<div class="modal-content">
                  		<div class="modal-header">
                     		<div class="product-box row">
                        		<div class="product-img col-md-6">
                        			<img class="img-fluid" src="{{ $product->avatar }}" alt="">
                        		</div>
                        		<div class="product-details col-md-6 text-left">
                        			@if ( session()->has('carterror') )
			                            <div class="alert alert-danger text-center">
			                            	{{ session('carterror') }}
                        				</div>
                					@endif

                					@if ( session()->has('cartsuccess') )
			                            <div class="alert alert-success text-center">
			                            	{{ session('cartsuccess') }}
                        				</div>
                					@endif
                        			
                           			<h4>{{ $product->name }}</h4>
                       				<div class="product-price">₱{{ number_format($product->original_price, 2, '.', ',') }}
                       				</div>
                       				<div class="product-view">
                          				<h6 class="f-w-600">Product Details</h6>
                          				<p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                       				</div>
                       				<div class="product-qnty">
                          				<h6 class="f-w-600">Quantity</h6>
                      					<fieldset>
                         					<div class="input-group">
                            					<input class="text-center form-control" type="number" wire:model="quantity">
                         					</div>
                      					</fieldset>
                      					<div>
                             				<button class="btn btn-primary" wire:click="add_to_cart" wire:loading.remove>Add to Cart</button>
                             				<button class="btn btn-primary" wire:loading>Adding...</button>
			                            </div>
                       				</div>
                        		</div>
                     		</div>
                 			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 				<span aria-hidden="true">×</span>
                 			</button>
                  		</div>
               		</div>
            	</div>
         	</div>
         	<div class="product-details">
	            <div class="rating">
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            	<i class="fa fa-star"></i>
	            </div>
	            <h4>{{ $product->name }}</h4>
	            <p>Simply dummy text of the printing.</p>
	            <div class="product-price">₱{{ number_format($product->original_price, 2, '.', ',') }}
	            </div>
         	</div>
      	</div>
   	</div>
</div>