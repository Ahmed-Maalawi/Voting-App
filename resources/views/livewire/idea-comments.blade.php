    <div>
        @if($comments->isNotEmpty())
            <div class="comments-container relative space-y-6 ml-22 my-8 mt-1 pt-6">

            @foreach($comments as $comment)
                <livewire:idea-comment
                    :key="$comment->id"
                    :comment="$comment"
                    :ideaUserId="$idea->user->id"
                />
           @endforeach
            </div> <!-- end comments container -->

            <div class="my-8 md:ml-22">
                {{ $comments->onEachSide(1)->links() }}
            </div>

        @else
            <div class="mx-auto w-70 mt-12">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="ideas_not_found" class="mx-auto img-fluid" style="mix-blend-mode: luminosity">
                <div class="capitalize text-lg text-bold text-center text-gray-400 mt-6">no comments added until now !!</div>
            </div>
       @endif
</div>
