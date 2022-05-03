<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/css/app.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/icon.png') }}">

        <title>Bro Hub - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        </style>
    </head>
    <body class="antialiased">

    @section('navigation')
        <nav class="w-full fixed bg-gray-900 left-0 top-0 p-5">
            <a href="{{ url("/") }}" class="inline-block">
                <img class="h-8" src="{{ asset('images/logo.png') }}" alt="">
            </a>
            <ul class="float-right mr-1.5">
                <li>
                    <a class="rich-link-light" href="{{ url("post/") }}">Posts</a>
                </li>
            </ul>
        </nav>
    @show

    @include('components.messages')

        <div class="pb-8 pt-20 px-4 bg-gray-100 dark:bg-gray-900 flex justify-center flex-col items-center min-h-screen text-center">
            @yield('content')
        </div>

    @if(isset($footer))
        @if($footer)
            <div class="w-full bg-gray-900 text-gray-700 bottom-0 left-0 px-6 py-4 text-center">
                You can either <a href="{{ url("login/")  }}" class="rich-link-light">Log in</a> or <a href="{{ url("register/")  }}" class="rich-link-light">Register</a>
            </div>
        @endif
    @else
        <div class="w-full bg-gray-900 text-gray-700 bottom-0 left-0 px-6 py-4 text-center">
            You can either <a href="{{ url("login/")  }}" class="rich-link-light">Log in</a> or <a href="{{ url("register/")  }}" class="rich-link-light">Register</a>
        </div>
    @endif
    </body>
</html>
