@extends('errors.master')

@section('error-code','404')

@section('error-message')
    <div class="big-text">403 | You don't have privileges to do this</div>
    <a href="{{ url("/") }}" class="rich-link py-2">Go back to home</a>
@stop
