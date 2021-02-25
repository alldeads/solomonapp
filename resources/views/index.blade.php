@extends('layouts.app')

@section('content')
	
	@livewire('partials.slider-container', ['from' => 0, 'to' => 2])

@endsection