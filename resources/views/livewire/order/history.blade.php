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
								<th scope="col">Placed On</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
								<tr>
									<th scope="row">{{ $order->reference }}</th>
									<td>{{ $order->total }}</td>
									<td>{{ $order->quantity }}</td>
									<td>{{ $order->status }}</td>
									<td>{{ date('F j, Y', strtotime($order->created_at)) }}</td>
									<td>
										<a href="#"> View</a>
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
