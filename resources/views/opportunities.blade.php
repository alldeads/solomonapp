@extends('layouts.app')

@section('content')
    
    @livewire('partials.slider-container', ['from' => 7, 'to' => 21])

@endsection