<div class="idea-and-buttons container">

    <div class="ideas-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 flex-col md:flex-row px-2 py-6">
            <div class="flex-none mx-4">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
            </div>
        <div class="md:mx-4 mx-2 w-full">
                <h4 class="font-semibold text-xl md:mt-0 mt-2">{{ $idea->title }}</h4>
                @admin
                    @if ($idea->spam_reports > 0)
                        <div class="text-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
                    @endif
                @endadmin
                <div class="text-gray-600 mt-3">{{ $idea->description }}</div>
                <div class="flex flex-col md:flex-row  justify-between md:items-center mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block  font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-600">{{ $idea->comments->count() }} comments</div>
                    </div>

                    <div x-data="{isOpen: false}" class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="text-center rounded-full uppercase text-xxs font-bold w-28 h-7 px-4 py-2 leading-none {{ 'status-'.Str::kebab($idea->status->name) }}"> <!-- $idea->status->classes -->
                            {{ $idea->status->name }}
                        </div>

                        @auth
                            <div class="relative">
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

{{--                                    @admin--}}
                                        @can('update', $idea)
                                            <li>
                                                <a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3" href="#"
                                                   @click="
                                                    isOpen = false
                                                    $dispatch('custom-show-edit-modal')"
                                                >
                                                    Edit Idea
                                                </a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a
                                                href="#"
                                                @click="
                                                    isOpen = false
                                                    $dispatch('custom-show-delete-modal')
                                                "
                                                class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3" href="#">
                                                Delete Idea
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3" href="#" @click="
                                                isOpen = false
                                                $dispatch('custom-show-marked-modal')
                                            ">mark as spam
                                            </a>
                                        </li>
                                    @admin
                                        <li>
                                            <a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                                href="#"
                                                @click="
                                                isOpen = false
                                                $dispatch('custom-show-no-marked-modal')
                                                "
                                            >mark as no spam
                                            </a>
                                        </li>
                                   @endadmin
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea container-->


    <div class="buttons-container flex flex-col md:flex-row items-center justify-between mt-4">
        <div class="flex flex-col md:flex-row items-center space-x-2 ml-4" x-data="{replay_open: false}">
            <livewire:add-comment :idea="$idea" />
            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin
        </div>

        <div class="flex md:items-center space-x-3 md:mt-0 mt-4 items-start">
            <div class="bg-white border rounded-xl text-center font-semibold px-3 py-2">
                <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">votes</div>
            </div>

            @if($hasVoted)
                <button
                    wire:click.prevent="vote"
                    type="button"
                    class="text-center text-white flex justify-center items-center w-36 h-11 px-6 py-3 text-xs font-semibold uppercase border border-blue bg-blue hover:bg-blue-hover rounded-xl transition duration-150 ease-in"
                >
                    <span>Voted</span>
                </button>
            @else
                <button
                    wire:click.prevent="vote"
                    type="button"
                    class="text-center flex justify-center items-center w-36 h-11 px-6 py-3 text-xs bg-gray-200 font-semibold uppercase border rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in"
                >
                    <span>Vote</span>
                </button>
            @endif
        </div>
    </div> <!-- end button container -->
</div> <!-- end ideas and button containers -->
