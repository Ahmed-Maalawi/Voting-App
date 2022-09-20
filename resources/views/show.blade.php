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
        <div class="flex flex-1 px-2 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="mx-4 w-full">
                <h4 class="font-semibold text-xl">
                    <a href="" class="hover:underline">Random Title Click here to go.</a>
                </h4>
                <div class="text-gray-600 mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aut
                    blanditiis cumque iure libero, nam nesciunt nulla porro possimus sit!Lorem ipsum dolor sit amet,
                    consectetur adipisicing
                    elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas
                    voluptate?
                </div>
                <div class="flex justify-between items-center mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">Ahmed</div>
                        <div>&bull;</div>
                        <div>10 hours age</div>
                        <div>&bull;</div>
                        <div>category</div>
                        <div>&bull;</div>
                        <div class="text-gray-600">3 comments</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button
                            class="text-center rounded-full bg-gray-200 uppercase text-xxs font-bold w-28 h-7 px-4 py-2 leading-none">
                            open
                        </button>
                        <button
                            class="hidden   text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
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
    </div> <!-- end idea container-->

    <div class="buttons-container flex items-center justify-between mt-4">
        <div class="flex items-center space-x-2 ml-4">
            <button
                type="button"
                class="h-11 w-36 text-xs bg-blue border-blue font-semibold text-white rounded-xl border hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 flex justify-center items-center">
                <span>Reply</span>
            </button>

            <button
                type="button"
                class="w-36 flex h-11 px-6 py-3 text-xs bg-gray-200 font-semibold rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in flex items-center justify-center">
                <span>Set Status</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="w-5 h-5 -rotate-90 mt-1">
                    <path fill-rule="evenodd"
                          d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                          clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <div class="flex items-center space-x-3">
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
                        <div class="flex items-center space-x-2">
                            <button
                                class="hidden   text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
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
                        <div class="flex items-center space-x-2">
                            <button
                                class="hidden   text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
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
                        <div class="flex items-center space-x-2">
                            <button
                                class="hidden   text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
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
                        <div class="flex items-center space-x-2">
                            <button
                                class="hidden   text-center rounded-full bg-gray-100 hover:bg-gray-200 border text-xxs h-7 leading-none transition duration-150 ease-in px-4 py-2 relative">
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


    </div> <!-- end comments container -->

</x-app-layout>
