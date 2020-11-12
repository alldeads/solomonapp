<div class="container-fluid credit-card">
   	<div class="row">
      	<div class="col-12 box-col-12">
         	<div class="card">
            	<div class="card-header py-4">
               		<h5>Payment </h5>
            	</div>
            	<div class="card-body">
               		<div class="row">
                        {{-- <div class="col-12 alert alert-warning">
                            
                        </div> --}}
                        <div class="col-md-5 mb-2">
                            <h4>Instructions</h4>

                            @if ($method == 4)
                                <div class="form-group">
                                    <small>Mobile</small>
                                    <ul style="line-height: 3;">
                                        <li> Login to your bank mobile app.</li>
                                        <li> Choose Send Money</li>
                                        <li> Account Number: 000808048274</li>
                                        <li> Account Name: Dave Scott Wong</li>
                                        <li> Account Bank: BDO</li>
                                    </ul>
                                </div>
                            @else
                                <div class="form-group">
                                    <ul style="line-height: 3;">
                                        <li> Please go to the nearest BDO bank branch.</li>
                                        <li> Fill out the deposit slip.</li>
                                        <li> Account Number: 000808048274</li>
                                        <li> Account Name: Dave Scott Wong</li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                  		<div class="col-md-7">
                     		<form class="theme-form mega-form">
                                <div class="form-group">
                                    <select class="form-control" wire:model="method">
                                        @foreach($options as $option)
                                            <option value="{{ $option->id }}">
                                                {{ $option->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                        		<div class="form-group">
                           			<input class="form-control" type="text" placeholder="Transaction Number">
                        		</div>
                        		<div class="form-group">
                           			<input class="form-control" type="text" placeholder="Amount">
                        		</div>
                        		<div class="form-group">
                           			<input class="form-control" type="date">
                        		</div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"> Submit</button>
                                </div>
                     		</form>
                  		</div>

                  		<div class="col-md-12 text-center mt-2">
                  			<img class="img-fluid" src="{{asset('images/card.png')}}" alt="">
                  		</div>
               		</div>
            	</div>
         	</div>
      	</div>
  	</div>
</div>