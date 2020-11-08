<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5>Redeem History</h5>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Item Name</th>
								<th scope="col">Points</th>
								<th scope="col">Status</th>
								<th scope="col">Redeemed On</th>
							</tr>
						</thead>
						<tbody>
							@foreach($items as $item)
								<tr>
									<th scope="row">{{ $item->reference }}</th>
									<td>{{ $item->item_name }}</td>
									<td>{{ $item->item_points }}</td>
									<td>{{ ucfirst($item->status) }}</td>
									<td>{{ date('F j, Y', strtotime($item->created_at)) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
