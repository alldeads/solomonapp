<div class="container-fluid product-wrapper">
   	<div class="product-grid">
      	<div class="feature-products">
         	<div class="row">
            	<div class="col-md-6 products-total">
               		<div class="square-product-setting d-inline-block">
               			<a class="icon-grid grid-layout-view" href="#" data-original-title="" title="">
               				<i data-feather="grid"></i>
               			</a>
               		</div>
               		<div class="square-product-setting d-inline-block">
               			<a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title="">
               				<i data-feather="list"></i>
               			</a>
               		</div>
               		<div class="grid-options d-inline-block">
                  		<ul>
                     		<li>
                     			<a class="product-2-layout-view" href="#" data-original-title="" title="">
                     				<span class="line-grid line-grid-1 bg-primary"></span>
                     				<span class="line-grid line-grid-2 bg-primary"></span>
                     			</a>
                     		</li>
                     		<li>
                     			<a class="product-3-layout-view" href="#" data-original-title="" title="">
                     				<span class="line-grid line-grid-3 bg-primary"></span>
                     				<span class="line-grid line-grid-4 bg-primary"></span>
                     				<span class="line-grid line-grid-5 bg-primary"></span>
                     			</a>
                     		</li>
                     		<li>
                     			<a class="product-4-layout-view" href="#" data-original-title="" title="">
                     				<span class="line-grid line-grid-6 bg-primary"></span>
                     				<span class="line-grid line-grid-7 bg-primary"></span>
                     				<span class="line-grid line-grid-8 bg-primary"></span>
                     				<span class="line-grid line-grid-9 bg-primary"></span>
                     			</a>
                     		</li>
                     		<li>
                     			<a class="product-6-layout-view" href="#" data-original-title="" title="">
                     				<span class="line-grid line-grid-10 bg-primary"></span>
                     				<span class="line-grid line-grid-11 bg-primary"></span>
                     				<span class="line-grid line-grid-12 bg-primary"></span>
                     				<span class="line-grid line-grid-13 bg-primary"></span>
                     				<span class="line-grid line-grid-14 bg-primary"></span>
                     				<span class="line-grid line-grid-15 bg-primary"></span>
                     			</a>
                     		</li>
                  		</ul>
               		</div>
            	</div>
         	</div>
    	</div>
    	<div class="product-wrapper-grid mt-3">
        	<div class="row">
        		@foreach($products as $product)
        			<livewire:ecommerce.single :product="$product" :key="$product->id">
        		@endforeach
         	</div>
      	</div>
   	</div>
</div>