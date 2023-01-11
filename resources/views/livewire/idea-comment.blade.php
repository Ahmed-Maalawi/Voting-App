<div
    class="comment-container relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-500 hover:shadow-card"> <!-- is-admin => class -->

    <div class="flex flex-1 px-2 py-6">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar"
                     class="w-14 h-14 rounded-xl">
            </a>
{{--            <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">{{ $comment->user->name }}</div>--}}
        </div>
        <div class="mx-4 w-full">
{{--            <h4 class="font-semibold text-xl">--}}
{{--                <a href="" class="hover:underline">{{ $comment->user->name }}</a>--}}
{{--            </h4>--}}
            <div class="text-gray-600 mt-2 line-clamp-3">{{ $comment->body }}</div>
            <div class="flex justify-between items-center mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div class="font-bold text-blue">{{ $comment->user->name }}</div>
                    <div>&bull;</div>
                    @if($ideaUserId === $comment->user->id)
                        <div class="rounded-full border bg-gray-100 px-3 py-1">OP</div>
                        <div>&bull;</div>
                    @endif
                    <div class="ml-1">{{ $comment->created_at->diffForHumans() }}</div>
                </div>


                @auth
                    <div class="relative"
                         x-data="{ isOpen : false}"
                    >
                        <button @click="isOpen = !isOpen"
                                class="text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-three-dots text-gray-400" viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                            </svg>
                        </button>
                        <ul x-cloak x-show="isOpen" @keydown.escape.window="isOpen = false" @click.outside="isOpen = false"
                            class="absolute z-10 w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 capitalize text-left md:ml-8 top-8 md:top-6 right-0 md:left-0">
                            @can('update', $comment)
                                <li>
                                    <a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3" href="#"
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
    {{--                                        $dispatch('custom-show-delete-modal')--}}
                                        "
                                        class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                        href="#"
                                    >
                                        Delete Comment
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div> <!-- end comment container -->
