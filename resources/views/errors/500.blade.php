@extends('errors.master')

@section('error-code','500')

@section('error-message')
    <div class="big-text">500 | Internal Server Error</div>
    <a href="{{ url("/") }}" class="rich-link py-2">Go back to home</a>
@stop
