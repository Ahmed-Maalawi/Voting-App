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

    @livewireStyles
</head>
<body class="font-sans bg-gray-background text-gray-900 text-sm bg-gray-100">
<header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
    <a href="/">
        <img src="{{ asset('img/logo.svg') }}" alt="logo">
    </a>
    <div class="flex items-center md:mt-0">
        @if (Route::has('login'))
            <div class="px-6 py-4 ">
                @auth
                    <div class="flex items-center space-x-8 ">

                        <livewire:comment-notificatoins />

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
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
            {{-- <img class="w-10 h-10 rounded-full"
            src="{{ auth()->getAvatar() }}"/> --}}
        </a>
    </div>
</header>
<main class="container max-w-custom flex flex-col md:flex-row">
    <div class="md:w-70 w-full mx-2 md:mr-5 md:mx-auto md:mx-0">
        <div class="border-2 border-blue rounded-xl mt-16 bg-white md:sticky md:top-8 w-full">
            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semibold text-base">Add an idea</h3>

                <p>
                    @auth
                        let us know what you would like and we'll take a look over!
                    @else
                        please login to create idea.
                    @endauth
                </p>

                {{-- @auth --}}
                    @livewire('create-idea')
                {{-- @else --}}

                {{-- @endauth --}}

            </div>
        </div>
    </div>


    <div class="w-full md:w-175 px-2 md:px-0">  <!-- style="max-width: 700px" -->
        <livewire:status-filters />

        <div class="mt-8">
            {{ $slot }}
        </div>
    </div>
</main>


@if( session('success_message'))

    <x-notification-success
        :redirect="true"
        messageToDisplay="{{ (session('success_message')) }}"
    />
@endif


@if( session('error_message'))

<x-notification-success
    :type="error"
    :redirect="true"
    messageToDisplay="{{ (session('error_message')) }}" />
@endif

@livewireScripts
</body>
</html>
