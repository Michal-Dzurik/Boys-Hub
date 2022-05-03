<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/css/app.css" rel="stylesheet">

        <title>Error - @yield('error-code')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        </style>
    </head>
    <body class="antialiased">
        <div class="bg-gray-100 dark:bg-gray-900 flex justify-center flex-col items-center min-h-screen text-center">
            @yield('error-message')
        </div>
    </body>
</html>
