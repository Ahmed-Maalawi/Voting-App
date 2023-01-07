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
            </div>
        </div>
    </div>
</div> <!-- end comment container -->
