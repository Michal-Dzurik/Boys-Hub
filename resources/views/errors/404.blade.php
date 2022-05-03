@extends('errors.master')

@section('error-code','404')

@section('error-message')
    <div class="big-text">404 | Page Not Found</div>
    <a href="{{ url("/") }}" class="rich-link py-2">Go back to home</a>
@stop
