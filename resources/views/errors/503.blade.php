@extends('errors::minimal')

@if (app()->isDownForMaintenance())
    @section('title', __('Feline Maintenance Mode'))
    @section('message')
        {!! 'We are on meow-gical transformation. 🐾😺 #CatNapInProgress<br><br>We will be back soon!' !!}
    @endsection
@else
    @section('title', __('Service Unavailable'))
    @section('code', '503')
    @section('message', __('Service Unavailable'))
@endif