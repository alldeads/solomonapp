<form>
	
	@include('partials.toasts')

	<div class="form-row">
		<div class="form-group col-lg-6">
			<label class="required text-light font-weight-bold text-2">Full Name</label>
			<input type="text" maxlength="100" class="text-light form-control" wire:model="input.full_name">
			@error('full_name')
				<span class="error" style="color:red;">{{ $message }}</span> 
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label class="required text-light font-weight-bold text-2">Email Address</label>
			<input type="email" class="form-control text-light" wire:model="input.email">
			@error('email')
				<span class="error" style="color:red;">{{ $message }}</span>
			@enderror
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col">
			<label class="required text-light font-weight-bold text-2">Subject</label>
			<input type="text" maxlength="100" class="text-light form-control" wire:model="input.subject">
			@error('subject')
				<span class="error" style="color:red;">{{ $message }}</span>
			@enderror
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col">
			<label class="required text-light font-weight-bold text-2">Message</label>
			<textarea maxlength="5000" rows="8" class="text-light form-control" wire:model="input.message">
			</textarea>
			@error('message')
				<span class="error" style="color:red;">{{ $message }}</span>
			@enderror
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col">
			<button href="#" wire:click.prevent="create" class="text-light btn btn-primary btn-modern">Submit</button>
		</div>
	</div>
</form>