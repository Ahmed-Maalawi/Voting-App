<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                      d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                      clip-rule="evenodd"/>
            </svg>
            <span class="ml-1 hover:underline">All Ideas</span>
        </a>
    </div>

    <div class="ideas-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 flex-col md:flex-row px-2 py-6">
            <div class="flex-none mx-4">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="md:mx-4 mx-2 w-full">
                <h4 class="font-semibold text-xl md:mt-0 mt-2">
                    <a href="" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3">{{ $idea->description }}</div>
                <div class="flex flex-col md:flex-row  justify-between md:items-center mt-6">
                    <div class="flex  items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block  font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-600">3 comments</div>
                    </div>

                    <div x-data="{isOpen: false}" class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div
                            class="text-center rounded-full bg-gray-200 uppercase text-xxs font-bold w-28 h-7 px-4 py-2 leading-none">
                            open
                        </div>

                        <button @click="isOpen = !isOpen"
                                class="text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-three-dots text-gray-400" viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                            <ul x-cloak x-show="isOpen" @keydown.escape.window="isOpen = false"
                                @click.outside="isOpen = false"
                                class="absolute z-10 w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 capitalize text-left md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                <li><a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                       href="#">mark as spam</a></li>
                                <li><a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                       href="#">Delete post</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea container-->

    <div class="buttons-container flex flex-col md:flex-row items-center justify-between mt-4">
        <div class="flex  items-center space-x-2 ml-4" x-data="{replay_open: false}">
            <button @click="replay_open = !replay_open"
                    type="button"
                    class="h-11 w-36 text-xs bg-blue border-blue font-semibold text-white rounded-xl border hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 flex justify-center items-center">
                <span>Reply</span>
            </button>
            <div class="relative" x-data="{open: false}">
                <button @click="open = !open"
                        type="button"
                        class="w-36 flex h-11 px-6 py-3 text-sm bg-gray-200 font-semibold rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in flex items-center justify-center">
                    <span>Set Status</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="w-5 h-5 -rotate-90 mt-1">
                        <path fill-rule="evenodd"
                              d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>

                <div
                    class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2 hidden">
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
                </div>
                <div @click.away="open = false" x-cloak x-show="open" @keydown.escape.window="open = false"
                     class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form action="" method="POST" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label for="radio-direct" class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="1"
                                           class="bg-gray-200 text-gray-600 border-none">
                                    <span class="ml-2">open</span>
                                </label>
                            </div>
                            <div>
                                <label for="radio-direct" class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="2"
                                           class="bg-gray-200 text-purple border-none">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label for="radio-direct" class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="3"
                                           class="bg-gray-200 text-yellow border-none">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label for="radio-direct" class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="4"
                                           class="bg-gray-200 text-red border-none">
                                    <span class="ml-2">Close</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea name="update_comment" id="update_comment" cols="30" rows="3"
                                      class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                      placeholder="Add an update comment (optional)"></textarea>
                        </div>

                    </form>
                </div>


                <div
                    @click.away="replay_open = false"
                    @keydown.escape.window="replay_open = false"
                    x-cloak=""
                    x-show="replay_open"
                    class="absolute z-10 w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl px-3 py-2 mt-2 right-0">
                    <form action="" method="POST" class="space-x-4 space-y-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="3"
                                      class="border-none py-2 px-4 rounded-xl bg-gray-100 placeholder:text-gray-900 text-xs"
                                      placeholder="go ahead, don't be shy. share your thoughts...."></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-4">
                            <button
                                type="submit"
                                class="w-1/2 h-8 text-xs bg-blue border-blue font-semibold text-white rounded-xl border hover:bg-blue-hover transition duration-150 ease-in">
                                <span>Update Comment</span>
                            </button>

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
                        </div>
                        <div>
                            <label for="" class="inline-flex items-center font-normal">
                                <input name="notify_voters" type="checkbox" checked="" class="bg-gray-200 rounded">
                                <span class="ml-2">notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="flex md:items-center space-x-3 md:mt-0 mt-4 items-start">
            <div class="bg-white border rounded-xl text-center font-semibold px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">votes</div>
            </div>

            <button
                type="button"
                class="text-center flex justify-center items-center w-36 h-11 px-6 py-3 text-xs bg-gray-200 font-semibold uppercase border rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in">
                <span>Vote</span>
            </button>
        </div>
    </div> <!-- end button container -->

    <div class="comments-container relative space-y-6 ml-22 my-8 mt-1 pt-6">
        <div
            class="comment-container relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                             class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="font-semibold text-xl">
                        <a href="" class="hover:underline">User Name</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas
                        voluptate?
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">Ahmed</div>
                            <div class="ml-1">10 hours age</div>
                        </div>
                        <div class="flex items-center space-x-2 hidden">
                            <button
                                class="text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-three-dots text-gray-400" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 capitalize text-left ml-8">
                                    <li><a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                           href="#">mark as spam</a></li>
                                    <li><a class="hover:bg-gray-300 block transition ease-in duration-150 px-5 py-3"
                                           href="#">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->

        <div
            class="comment-container is-admin relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                             class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="font-semibold text-xl">
                        <a href="" class="hover:underline">User Name</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas
                        voluptate?
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">Ahmed</div>
                            <div class="ml-1">10 hours age</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->

        <div
            class="comment-container relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                             class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="font-semibold text-xl">
                        <a href="" class="hover:underline">User Name</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas
                        voluptate?
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">Ahmed</div>
                            <div class="ml-1">10 hours age</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->

        <div
            class="comment-container relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">

            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                             class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="font-semibold text-xl">
                        <a href="" class="hover:underline">User Name</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas
                        voluptate?
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">Ahmed</div>
                            <div class="ml-1">10 hours age</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->


    </div> <!-- end comments container -->

</x-app-layout>
