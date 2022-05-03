@extends('pages.master')

@section('errors',$errors)

@section('content')
    <div class="w-max-xl rounded-lg text-gray-300 overflow-hidden h-400 flex justify-center mx-4">
        <div class="inline-block w-full relative hidden lg:block">
            <img class="h-full w-full object-cover" src="{{ asset("images/bros2.jpg") }}" alt="">
            <div class="overlay flex flex-col justify-center items-center py-12">
                <h4 class="text-4xl font-semibold">Login to <span class="underline">Boys Hub</span></h4>
                <p class="max-w-md text-gray-400 mt-2.5 leading-snug">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae debitis dicta dolore dolorem ex ipsa ipsum obcaecati perspiciatis, porro provident reprehenderit rerum voluptate! Commodi id molestias soluta tempore ullam?</p>
            </div>
        </div>
        <div class="inline-block bg-gray-800 py-8 px-12 h-full flex flex-col justify-center">
            <h2 class="text-2xl mb-4 font-bold">Login</h2>
            <form autocomplete="off" action="" method="POST">
                {{ csrf_field() }}
                <input class="input" type="email" name="email" id="email" placeholder="Email">
                <input class="input" type="password" name="password" id="password" placeholder="Password">

                <button type="submit" class="button mt-4">Login</button>
            </form>
        </div>

    </div>
@stop

@section('title','About me')




