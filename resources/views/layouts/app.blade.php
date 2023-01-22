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
                        <div
                            class="relative"
                            x-data="{ isOpen: true }"
                            @click="isOpen = !isOpen"
                        >
                            <button type="button" class="text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                    <path d="M5.85 3.5a.75.75 0 00-1.117-1 9.719 9.719 0 00-2.348 4.876.75.75 0 001.479.248A8.219 8.219 0 015.85 3.5zM19.267 2.5a.75.75 0 10-1.118 1 8.22 8.22 0 011.987 4.124.75.75 0 001.48-.248A9.72 9.72 0 0019.266 2.5z" />
                                    <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 005.25 9v.75a8.217 8.217 0 01-2.119 5.52.75.75 0 00.298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 107.48 0 24.583 24.583 0 004.83-1.244.75.75 0 00.298-1.205 8.217 8.217 0 01-2.118-5.52V9A6.75 6.75 0 0012 2.25zM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 004.496 0l.002.1a2.25 2.25 0 11-4.5 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="rounded-full bg-red text-white absolute w-6 h-6 text-xxs flex justify-center items-center -top-1 -right-1 border-2">8</div>
                            </button>

                            <ul
                                x-cloak
                                x-transition:enter.duration.300ms
                                x-transition:leave.duration.300ms
                                x-show="isOpen"
                                @keydown.escape.window="isOpen = false"
                                @click.outside="isOpen = false"
                                class="-right-28 md:-right-12 absolute max-h-128 overflow-y-scroll z-10 w-76 md:w-96 bg-white shadow-dialog rounded-xl py-3 lowercase text-left pb-0"
{{--                                style="right: -64px"--}}
                            >

                                <li>
                                    <a
                                        class="hover:bg-gray-300 transition ease-in duration-150 px-5 py-3 flex text-lowercase" href="#"
                                        @click="
                                            isOpen = false
                                            $dispatch('custom-show-edit-modal')
                                       "
                                    >
                                        <img src="//www.gravatar.com/avatar/c314707cc447ff6b2fc4db41410ff349?466b0407a575024422a8f2274bf8630e?s=200&amp;d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-2.png" alt="avatar" class="w-14 h-14 rounded-xl">
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Ahmed</span>
                                                commented on
                                                <span class="font-semibold">This is my idea</span>:
                                                <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti ex omnis perferendis quod sapiente sequi sunt tenetur veritatis voluptatibus."</span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-4">3 hours ago</div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a
                                        class="hover:bg-gray-300 transition ease-in duration-150 px-5 py-3 flex text-lowercase" href="#"
                                        @click="
                                            isOpen = false
                                            $dispatch('custom-show-edit-modal')
                                       "
                                    >
                                        <img src="//www.gravatar.com/avatar/c314707cc447ff6b2fc4db41410ff349?466b0407a575024422a8f2274bf8630e?s=200&amp;d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-2.png" alt="avatar" class="w-14 h-14 rounded-xl">
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Ahmed</span>
                                                commented on
                                                <span class="font-semibold">This is my idea</span>:
                                                <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti ex omnis perferendis quod sapiente sequi sunt tenetur veritatis voluptatibus."</span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-4">3 hours ago</div>
                                        </div>
                                    </a>
                                </li>


                                <li>
                                    <a
                                        class="hover:bg-gray-300 transition ease-in duration-150 px-5 py-3 flex text-lowercase" href="#"
                                        @click="
                                            isOpen = false
                                            $dispatch('custom-show-edit-modal')
                                       "
                                    >
                                        <img src="//www.gravatar.com/avatar/c314707cc447ff6b2fc4db41410ff349?466b0407a575024422a8f2274bf8630e?s=200&amp;d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-2.png" alt="avatar" class="w-14 h-14 rounded-xl">
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Ahmed</span>
                                                commented on
                                                <span class="font-semibold">This is my idea</span>:
                                                <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti ex omnis perferendis quod sapiente sequi sunt tenetur veritatis voluptatibus."</span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-4">3 hours ago</div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a
                                        class="hover:bg-gray-300 transition ease-in duration-150 px-5 py-3 flex text-lowercase" href="#"
                                        @click="
                                            isOpen = false
                                            $dispatch('custom-show-edit-modal')
                                       "
                                    >
                                        <img src="//www.gravatar.com/avatar/c314707cc447ff6b2fc4db41410ff349?466b0407a575024422a8f2274bf8630e?s=200&amp;d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-2.png" alt="avatar" class="w-14 h-14 rounded-xl">
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Ahmed</span>
                                                commented on
                                                <span class="font-semibold">This is my idea</span>:
                                                <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti ex omnis perferendis quod sapiente sequi sunt tenetur veritatis voluptatibus."</span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-4">3 hours ago</div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a
                                        class="hover:bg-gray-300 transition ease-in duration-150 px-5 py-3 flex text-lowercase" href="#"
                                        @click="
                                            isOpen = false
                                            $dispatch('custom-show-edit-modal')
                                       "
                                    >
                                        <img src="//www.gravatar.com/avatar/c314707cc447ff6b2fc4db41410ff349?466b0407a575024422a8f2274bf8630e?s=200&amp;d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-2.png" alt="avatar" class="w-14 h-14 rounded-xl">
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Ahmed</span>
                                                commented on
                                                <span class="font-semibold">This is my idea</span>:
                                                <span>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti ex omnis perferendis quod sapiente sequi sunt tenetur veritatis voluptatibus."</span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-4">3 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="border-t border-gray-300 text-center capitalize">
                                    <button
                                        class="w-full transition duration-150 hover:bg-gray-100 ease-in px-5 py-3 block font-semibold"
                                    >
                                        mark all as read
                                    </button>
                                </li>
                            </ul>
                        </div>

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

                @auth
                    @livewire('create-idea')
                @else
                    <div class="text-center my-6">
                        <a
                            href="{{ route('login') }}"
                            class="block mx-auto w-1/2 flex h-8 text-xs bg-blue font-semibold rounded-xl border-blue hover:bg-blue-hover transition duration-150 ease-in flex items-center justify-center text-white"
                        >
                            <sapn class="ml-1">Login</sapn>
                        </a>
                        <a href="{{ route('register') }}"
                           class="block mt-4 mx-auto w-1/2 flex h-8 text-xs bg-gray-200 font-semibold rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in flex items-center justify-center">
                            <span class="ml-1">Sing Up</span>
                        </a>
                    </div>
                @endauth

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

@livewireScripts
</body>
</html>
