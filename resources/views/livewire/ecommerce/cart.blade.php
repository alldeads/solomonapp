<div class="container-fluid">
   	<div class="row">
      	<div class="col-sm-12">
         	<div class="card">
            	<div class="card-header">
               		<h5>Cart</h5>
            	</div>
            	<div class="card-body">
               		<div class="row">
                  		<div class="order-history table-responsive wishlist">
                     		<table class="table table-bordered">
                        		<thead>
                           			<tr>
										<th>Product</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Action</th>
										<th>Total</th>
                           			</tr>
                        		</thead>
                        		<tbody>
                           			@foreach($carts as $cart)
                        				@livewire('ecommerce.item', ['item' => $cart], key($cart->id))
                        			@endforeach
                           			<tr>
                              			<td class="text-right" colspan="5">
                              				<a class="btn btn-secondary cart-btn-transform" href="{{ route('product') }}">continue shopping</a>
                              			</td>
                              			<td>
                              				<a class="btn btn-success cart-btn-transform" href="">check out
                              				</a>
                              			</td>
                           			</tr>
                        		</tbody>
                     		</table>
                  		</div>
					</div>
            	</div>
            </div>
      	</div>
   	</div>
</div>
