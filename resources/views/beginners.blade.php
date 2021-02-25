@extends('layouts.app')

@section('content')
    
    @livewire('partials.slider-container', ['from' => 21, 'to' => 24])

@endsection