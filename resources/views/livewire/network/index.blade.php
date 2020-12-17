<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5>Network List</h5>
				</div>
				<div class="form-group">
					<div class="col-12">
						<select class="form-control" wire:model="level">
							<option value="0"> Level 1</option>
							<option value="1"> Level 2</option>
							<option value="2"> Level 3</option>
							<option value="3"> Level 4</option>
							<option value="4"> Level 5</option>
						</select>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Sponsor Name</th>
								<th scope="col">Full Name</th>
								<th scope="col">Username</th>
								<th scope="col">Points</th>
								<th scope="col">Status</th>
								<th scope="col">Date Joined</th>
							</tr>
						</thead>
						<tbody>
							@foreach($list as $user)
								<livewire:network.downline :user="$user" :key="$user->id">
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
