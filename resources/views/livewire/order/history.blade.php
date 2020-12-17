<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5>Order History</h5>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Total</th>
								<th scope="col">Quantity</th>
								<th scope="col">Status</th>
								<th scope="col">Payment</th>
								<th scope="col">Placed On</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
								<tr>
									<th scope="row">{{ $order->reference }}</th>
									<td>₱{{ number_format($order->total, 2, '.', ',') }}</td>
									<td>{{ $order->quantity }}</td>
									@if( $order->status == 'pending' )
										<td>
											<span class="badge badge-danger">
												{{ ucfirst($order->status) }}
											</span>
										</td>
									@elseif($order->status == 'processing') 
										<td>
											<span class="badge badge-warning">
												{{ ucfirst($order->status) }}
											</span>
										</td>
									@elseif($order->status == 'accepted') 
										<td>
											<span class="badge badge-success">
												{{ ucfirst($order->status) }}
											</span>
										</td>
									@else
										<td>
											<span class="badge badge-info">
												{{ ucfirst($order->status) }}
											</span>
										</td>
									@endif
									@if( $order->payment->status == 'pending' )
										<td>
											<span class="badge badge-danger">
												{{ ucfirst($order->payment->status) }}
											</span>
										</td>
									@elseif($order->payment->status == 'processing') 
										<td>
											<span class="badge badge-warning">
												{{ ucfirst($order->payment->status) }}
											</span>
										</td>
									@elseif($order->payment->status == 'received') 
										<td>
											<span class="badge badge-success">
												{{ ucfirst($order->payment->status) }}
											</span>
										</td>
									@else
										<td>
											<span class="badge badge-info">
												{{ ucfirst($order->payment->status) }}
											</span>
										</td>
									@endif
									<td>{{ date('F j, Y', strtotime($order->created_at)) }}</td>
									<td>
										<a href="{{ route('order.single', ['order_number' => $order->reference]) }}"> View</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
