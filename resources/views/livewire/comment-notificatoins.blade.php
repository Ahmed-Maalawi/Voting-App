<div
    class="relative"
    x-data="{ isOpen: false }"

>
    <button
        type="button"
        class="text-gray-500"
        @click="
            isOpen = !isOpen
            if(isOpen) {
                Livewire.emit('getNotifications')
            }
        "
    >

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
            <path d="M5.85 3.5a.75.75 0 00-1.117-1 9.719 9.719 0 00-2.348 4.876.75.75 0 001.479.248A8.219 8.219 0 015.85 3.5zM19.267 2.5a.75.75 0 10-1.118 1 8.22 8.22 0 011.987 4.124.75.75 0 001.48-.248A9.72 9.72 0 0019.266 2.5z" />
            <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 005.25 9v.75a8.217 8.217 0 01-2.119 5.52.75.75 0 00.298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 107.48 0 24.583 24.583 0 004.83-1.244.75.75 0 00.298-1.205 8.217 8.217 0 01-2.118-5.52V9A6.75 6.75 0 0012 2.25zM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 004.496 0l.002.1a2.25 2.25 0 11-4.5 0z" clip-rule="evenodd" />
        </svg>
        @if ($notificationCount)
            <div class="absolute flex items-center justify-center w-6 h-6 text-white border-2 rounded-full bg-red text-xxs -top-1 -right-1">
                {{ $notificationCount }}
            </div>
        @endif

    </button>

    <ul
        x-cloak
        x-transition:enter.duration.300ms
        x-transition:leave.duration.300ms
        x-show="isOpen"
        @keydown.escape.window="isOpen = false"
        @click.outside="isOpen = false"
        class="absolute z-10 py-3 pb-0 overflow-y-scroll text-left lowercase bg-white -right-28 md:-right-12 max-h-128 w-76 md:w-96 shadow-dialog rounded-xl"
        {{--                                style="right: -64px"--}}
    >
        @if( $notifications->isNotEmpty() && ! $isLoading)
            @foreach($notifications as $notification)
                {{--            <livewire:comment-notification :notification="{{$notification}}" />--}}
                <li>
                    <a
                        href="{{ route('idea.show', $notification->data['idea_slug']) }}"
                        class="flex px-5 py-3 transition duration-150 ease-in hover:bg-gray-300 text-lowercase"
                        @click.prevent="
                            isOpen = false
                            $dispatch('custom-show-edit-modal')
                        "
                        wire:click.prevent="markAsRead('{{ $notification->id }}')"
                    >
                        <img src="{{ $notification->data['user_avatar'] }}" alt="avatar" class="w-14 h-14 rounded-xl">
                        <div class="ml-4">
                            <div>
                                <span class="font-semibold">{{ $notification->data['user_name'] }}</span>
                                commented on
                                <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
                                <span>"{{ $notification->data['comment_body'] }}"</span>
                            </div>
                            <div class="mt-4 text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                </li>
            @endforeach
        @elseif($isLoading)
            @foreach(range(1, 3) as $demo)
                <li class="flex items-center text-center transition ease-in duration-150 px-5 py-3 space-y-2.5 animate-pulse max-w-lg">
                    <div class="w-10 h-10 bg-gray-200 rounded-xl"></div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div class="w-full h-2 bg-gray-200 rounded-full"></div>
                        <div class="w-full h-2 bg-gray-200 rounded-full"></div>
                        <div class="w-1/2 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                </li>
            @endforeach
        @else
            <li class="w-40 py-6 mx-auto">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="ideas_not_found" class="mx-auto img-fluid" style="mix-blend-mode: luminosity">
                <div class="mt-6 text-lg text-center text-gray-400 capitalize text-bold">no notifications were found...</div>
            </li>
        @endif

        @if( $notifications->isNotEmpty() )
            <li class="text-center capitalize border-t border-gray-300">
                <button
                    class="block w-full px-5 py-3 font-semibold transition duration-150 ease-in hover:bg-gray-100"
                    wire:click='markAllAsRead'
                    @click="isOpen = false"
                >
                        mark all as read
                </button>
            </li>
        @endif
    </ul>
</div>
