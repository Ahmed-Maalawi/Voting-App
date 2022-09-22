<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="">category one</option>
                <option value="">category one</option>
                <option value="">category one</option>
                <option value="">category one</option>
            </select>
        </div>

        <div class="w-full md:w-1/3">
            <select name="other" id="other" class="w-full rounded-xl border-none px-4 py-2">
                <option value="">other one</option>
                <option value="">other one</option>
                <option value="">other one</option>
                <option value="">other one</option>
            </select>
        </div>

        <div class="w-full md:w-2/3 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6 w-4 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                </svg>
            </div>
            <input type="search" placeholder="Find an idea"
                   class="w-full rounded-xl border-none bg-white px-4 py-2 pl-8 placeholder:text-gray-900">
        </div>
    </div>

    <div class="ideas-container space-y-6 my-6">
        @foreach($ideas as $idea)
        <div
            class="ideas-container hover:shadow-card bg-white rounded-xl flex transition ease-in duration-150 cursor-pointer">
            <div class=" hidden md:block border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl px-4 py-2 transition ease-in duration-150">
                        vote
                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                <div class="flex-none mx-2 md:mx-0">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                             class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 mx-2 w-full">
                    <h4 class="font-semibold text-xl mt-2 md:mt-0">
                        <a href="{{ route('idea.show', $idea) }}" class="hover:underline">{{ $idea->title }}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">{{ $idea->description }}</div>
                    <div class="flex flex-col md:flex-row justify-between md:items-center mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold md:space-x-2">
                            <div>{{ $idea->created_at->diffForHumans() }}</div>
                            <div>&bull;</div>
                            <div>category</div>
                            <div>&bull;</div>
                            <div class="text-gray-600">3 comments</div>
                        </div>
                        <div class="flex items-center justify-between space-x-2 mt-4 md:mt-0" x-data="{isOpen: false}">

                            <div class="flex items-center space-x-2 mt-4 md:mt-0">
                                <button
                                    class="text-center rounded-full bg-gray-200 uppercase text-xxs font-bold w-28 h-7 px-4 py-2 leading-none">
                                    open
                                </button>
                                <button
                                    @click="isOpen = !isOpen"
                                    class="text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-three-dots text-gray-400" viewBox="0 0 16 16">
                                        <path
                                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                    <ul x-cloak x-show="isOpen" @keydown.escape.window="isOpen = false"
                                        @click.outside="isOpen = false"
                                        class="absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 capitalize text-left py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                        <li><a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                               href="#">mark as spam</a></li>
                                        <li><a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                               href="#">Delete post</a></li>
                                    </ul>
                                </button>
                            </div>

                            <div class="mt-4 md:mt-0 block md:hidden flex items-center space-x-2 pr-4">
                                <div class="bg-white border rounded-xl text-center font-semibold px-3 py-2">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="font-bold leading-none text-gray-400">votes</div>
                                </div>
                                <button
                                    class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3"
                                >vote
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container-->
        @endforeach
    </div> <!-- end ideas container-->

    {{--    start simple --}}
    <div class="my-8">
        {{ $ideas->links() }}
    </div>
    {{--    end simple --}}

</x-app-layout>
