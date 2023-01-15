    <div
    class="relative flex mt-4 transition duration-500 ease-in bg-white comment-container rounded-xl hover:border-blue hover:shadow-card"> <!-- is-admin => class -->

    <div class="flex flex-1 px-2 py-6">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar"
                     class="w-14 h-14 rounded-xl">
            </a>
{{--            <div class="mt-1 font-bold text-center uppercase text-blue text-xxs">{{ $comment->user->name }}</div>--}}
        </div>
        <div class="w-full mx-4">
            @admin
                @if($comment->spam_reports > 0)
                    <div class="mt-2 text-red">spam reports: {{ $comment->spam_reports }}</div>
                @endif
            @endadmin
{{--            <h4 class="text-xl font-semibold">--}}
{{--                <a href="" class="hover:underline">{{ $comment->user->name }}</a>--}}
{{--            </h4>--}}
            <div class="mt-2 text-gray-600 line-clamp-3">{{ $comment->body }}</div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                    <div class="font-bold text-blue">{{ $comment->user->name }}</div>
                    <div>&bull;</div>
                    @if($ideaUserId === $comment->user->id)
                        <div class="px-3 py-1 bg-gray-100 border rounded-full">OP</div>
                        <div>&bull;</div>
                    @endif
                    <div class="ml-1">{{ $comment->created_at->diffForHumans() }}</div>
                </div>


                @auth
                    <div class="relative"
                        x-data="{ isOpen : false}"
                    >
                        <button @click="isOpen = !isOpen"
                                class="relative px-4 py-2 leading-none text-center transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 text-xxs h-7">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="text-gray-400 bi bi-three-dots" viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                            </svg>
                        </button>
                        <ul x-cloak x-show="isOpen" @keydown.escape.window="isOpen = false" @click.outside="isOpen = false"
                            class="absolute right-0 z-10 py-3 font-semibold text-left capitalize bg-white w-44 shadow-dialog rounded-xl md:ml-8 top-8 md:top-6 md:left-0">
                            @can('update', $comment)
                                <li>
                                    <a
                                        class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-300" href="#"
                                        @click="
                                            isOpen = false
                                            Livewire.emit('setEditComment', {{ $comment->id }})
                                        "
                                    >
                                        Edit Comment
                                    </a>
                                </li>
                            @endcan

                            @can('delete', $comment)
                                <li>
                                    <a
                                        href="#"
                                        @click="
                                            isOpen = false
                                            Livewire.emit('setDeleteComment', {{ $comment->id }})
                                        "
                                        class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-300"
                                        href="#"
                                    >
                                        Delete Comment
                                    </a>
                                </li>
                            @endcan
                            @auth
                                <li>
                                    <a
                                        href="#"
                                        @click="
                                            isOpen = false
                                            Livewire.emit('setMarkAsSpamComment', {{ $comment->id }})
                                        "
                                        class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-300"
                                        href="#"
                                    >
                                        mark as spam
                                    </a>
                                </li>
                            @endauth

                            @admin
                                <li>
                                    <a
                                        href="#" @click="
                                        isOpen = false
                                        Livewire.emit('setMarkAsNotSpamComment', {{ $comment->id }})
                                        "
                                        class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-300"
                                    >
                                        mark as not spam
                                    </a>
                                </li>
                            @endadmin
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div> <!-- end comment container -->
