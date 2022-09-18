<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>laracast Voting App</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-background text-gray-900 text-sm bg-gray-100">
<header class="flex items-center justify-between px-8 py-4">
    <a href="#">
        <img src="{{ asset('img/logo.svg') }}" alt="logo">
    </a>
    <div class="flex items-center">
        @if (Route::has('login'))
            <div class="px-6 py-4 ">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <a href="#">
            <img class="w-10 h-10 rounded-full"
                 src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"/>
        </a>
    </div>
</header>
<main class="container mx-auto max-w-custom flex">
    <div class="w-70 mr-5">
        addd idea form here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequatur corporis
        esse eum expedita facere molestias odit praesentium, quas repudiandae! Ad eum quaerat quas repudiandae? Autem
        corporis eligendi eveniet laboriosam magnam modi necessitatibus pariatur rerum voluptates! Deleniti error
        pariatur sit.
    </div>
    <div class="w-175" style="max-width: 700px">
        <nav class="flex item-center justify-between text-xs">
            <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                <li><a href="" class="border-b-4 pb-3 border-blue">All Ideas (78)</a></li>
                <li><a href="" class="text-gray-400 hover:border-blue transition duration-150 ease-in border-b-4 pb-3">Considering
                        (6)</a></li>
                <li><a href="" class="text-gray-400 hover:border-blue transition duration-150 ease-in border-b-4 pb-3">In
                        Progress (78)</a></li>
            </ul>

            <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                <li><a href="" class="border-b-4 pb-3 border-blue">Implemented (78)</a></li>
                <li><a href="" class="text-gray-400 hover:border-blue transition duration-150 ease-in border-b-4 pb-3">Closed
                        (78)</a></li>
                {{--                    <li><a href="" class="text-gray-400 hover:border-blue transition duration-150 ease-in border-b-4 pb-3">All Ideas (78)</a></li>--}}
            </ul>
        </nav>

        <div class="mt-8">
            {{ $slot }}
        </div>
    </div>
</main>
</body>
</html>
