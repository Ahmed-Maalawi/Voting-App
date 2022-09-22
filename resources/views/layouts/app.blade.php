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
    <a href="#">
        <img src="{{ asset('img/logo.svg') }}" alt="logo">
    </a>
    <div class="flex items-center md:mt-0">
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
<main class="container max-w-custom flex flex-col md:flex-row">
    <div class="md:w-70 w-full mx-2 md:mr-5 md:mx-auto md:mx-0">
        <div class="border-2 border-blue rounded-xl mt-16 bg-white md:sticky md:top-8 w-full">
            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semibold text-base">Add an idea</h3>
                <p class="text-xs mt-4">let us know what you would like and we'll take a look over!</p>
                <form action="" method="POST" class="space-y-4 px-4 py-6 ">
                    <div>
                        <input type="text"
                               class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none"
                               placeholder="Your Idea">
                    </div>
                    <div>
                        <select name="category_add" id="category_add"
                                class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none">
                            <option value="">category one</option>
                            <option value="">category one</option>
                            <option value="">category one</option>
                            <option value="">category one</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="idea" id="idea" cols="30" rows="4"
                                  class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none"
                                  placeholder="Describe your idea"></textarea>
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        <button
                            type="button"
                            class="w-1/2 flex h-8 text-xs bg-gray-200 font-semibold rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in flex items-center justify-center">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-5 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"/>
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>

                        <button
                            type="submit"
                            class="w-1/2 h-8 text-xs bg-blue border-blue font-semibold text-white rounded-xl border hover:bg-blue-hover transition duration-150 ease-in">
                            <span>Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-full md:w-175 px-2 md:px-0">  <!-- style="max-width: 700px" -->
        <nav class="flex item-center justify-between text-xs flex-col md:flex-row space-y-6 md:space-y-0 mt-6 md:mt-0">
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
            </ul>
        </nav>

        <div class="mt-8">
            {{ $slot }}
        </div>
    </div>
</main>
@livewireScripts
</body>
</html>
