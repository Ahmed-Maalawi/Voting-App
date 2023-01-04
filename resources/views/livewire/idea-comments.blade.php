    <div>
        @if($comments->isNotEmpty())
            <div class="comments-container relative space-y-6 ml-22 my-8 mt-1 pt-6">

            @foreach($comments as $comment)
                <livewire:idea-comment
                    :key="$comment->id"
                    :comment="$comment"
                />
            @endforeach


            {{--    <div--}}
            {{--        class="comment-container is-admin relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">--}}

            {{--        <div class="flex flex-1 px-2 py-6">--}}
            {{--            <div class="flex-none">--}}
            {{--                <a href="#">--}}
            {{--                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"--}}
            {{--                         class="w-14 h-14 rounded-xl">--}}
            {{--                </a>--}}
            {{--                <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>--}}
            {{--            </div>--}}
            {{--            <div class="mx-4 w-full">--}}
            {{--                <h4 class="font-semibold text-xl">--}}
            {{--                    <a href="" class="hover:underline">User Name</a>--}}
            {{--                </h4>--}}
            {{--                <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing--}}
            {{--                    elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas--}}
            {{--                    voluptate?--}}
            {{--                </div>--}}
            {{--                <div class="flex justify-between items-center mt-6">--}}
            {{--                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">--}}
            {{--                        <div class="font-bold text-blue">Ahmed</div>--}}
            {{--                        <div class="ml-1">10 hours age</div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div> <!-- end comment container -->--}}

            {{--    <div--}}
            {{--        class="comment-container relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">--}}

            {{--        <div class="flex flex-1 px-2 py-6">--}}
            {{--            <div class="flex-none">--}}
            {{--                <a href="#">--}}
            {{--                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"--}}
            {{--                         class="w-14 h-14 rounded-xl">--}}
            {{--                </a>--}}
            {{--                <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>--}}
            {{--            </div>--}}
            {{--            <div class="mx-4 w-full">--}}
            {{--                <h4 class="font-semibold text-xl">--}}
            {{--                    <a href="" class="hover:underline">User Name</a>--}}
            {{--                </h4>--}}
            {{--                <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing--}}
            {{--                    elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas--}}
            {{--                    voluptate?--}}
            {{--                </div>--}}
            {{--                <div class="flex justify-between items-center mt-6">--}}
            {{--                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">--}}
            {{--                        <div class="font-bold text-blue">Ahmed</div>--}}
            {{--                        <div class="ml-1">10 hours age</div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div> <!-- end comment container -->--}}

            {{--    <div--}}
            {{--        class="comment-container relative bg-white rounded-xl flex mt-4 hover:border-blue transition ease-in duration-150 hover:shadow-card">--}}

            {{--        <div class="flex flex-1 px-2 py-6">--}}
            {{--            <div class="flex-none">--}}
            {{--                <a href="#">--}}
            {{--                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"--}}
            {{--                         class="w-14 h-14 rounded-xl">--}}
            {{--                </a>--}}
            {{--                <div class="text-center text-blue text-xxs uppercase mt-1 font-bold">Ahmed</div>--}}
            {{--            </div>--}}
            {{--            <div class="mx-4 w-full">--}}
            {{--                <h4 class="font-semibold text-xl">--}}
            {{--                    <a href="" class="hover:underline">User Name</a>--}}
            {{--                </h4>--}}
            {{--                <div class="text-gray-600 mt-3 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing--}}
            {{--                    elit. Atque autem expedita neque omnis ratione unde! Cupiditate delectus placeat voluptas--}}
            {{--                    voluptate?--}}
            {{--                </div>--}}
            {{--                <div class="flex justify-between items-center mt-6">--}}
            {{--                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">--}}
            {{--                        <div class="font-bold text-blue">Ahmed</div>--}}
            {{--                        <div class="ml-1">10 hours age</div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div> <!-- end comment container -->--}}


        </div> <!-- end comments container -->
    @else
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('img/no-ideas.svg') }}" alt="ideas_not_found" class="mx-auto img-fluid" style="mix-blend-mode: luminosity">
                <div class="capitalize text-lg text-bold text-center text-gray-400 mt-6">no comments added until now !!</div>
            </div>
    @endif
</div>
