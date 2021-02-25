@if (session('status'))
    <div class="col-12 alert alert-{{ session('status.type') }} mt-4">
		<strong>{{ session('status.label') }}</strong> {{ session('status.message') }}
	</div>
@endif