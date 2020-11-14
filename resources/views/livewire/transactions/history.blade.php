<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5>Transactions History</h5>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Method</th>
								<th scope="col">Amount</th>
								<th scope="col">Status</th>
								<th scope="col">Requested On</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transactions as $transaction)
								<tr>
									<th scope="row">{{ $transaction->reference }}</th>
									<td>{{ $transaction->method->name }}</td>
									<td>₱{{ number_format($transaction->amount, 2, '.', ',') }}</td>
									@if( $transaction->status == 'pending' )
										<td>
											<span class="badge badge-danger">
												{{ ucfirst($transaction->status) }}
											</span>
										</td>
									@elseif($transaction->status == 'paid') 
										<td>
											<span class="badge badge-success">
												{{ ucfirst($transaction->status) }}
											</span>
										</td>
									@else
										<td>
											<span class="badge badge-info">
												{{ ucfirst($transaction->status) }}
											</span>
										</td>
									@endif
									<td>{{ date('F j, Y', strtotime($transaction->created_at)) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
