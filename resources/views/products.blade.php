@extends('layouts.app')

@section('content')
    
    @livewire('partials.slider-container', ['from' => 2, 'to' => 3])

@endsection