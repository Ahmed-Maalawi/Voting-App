<div>
    <div class="filters flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="All Category">All Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-full md:w-1/3">
            <select wire:model="filter" name="other_filter" id="other_filter" class="w-full rounded-xl border-none px-4 py-2">
                <option value="No Filter" selected>No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                    <option value="Spam Ideas">Spam Ideas</option>
                    <option value="Spam Comments">Spam Comments</option>
                @endadmin
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
            <input wire:model="search" type="search" placeholder="Find an idea"
                   class="w-full rounded-xl border-none bg-white px-4 py-2 pl-8 placeholder:text-gray-900">
        </div>
    </div>

    <div class="ideas-container space-y-6 my-6">
        @forelse($ideas as $idea)
            <livewire:idea-index
                :key="$idea->id"
                :idea="$idea"
                :votesCount_="$idea->votes->count()"
            />
        @empty
            <div class="mx-auto w-70 mt-12">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="ideas_not_found" class="mx-auto img-fluid" style="mix-blend-mode: luminosity">
               <div class="capitalize text-lg text-bold text-center text-gray-400 mt-6">no ideas were found...</div>
            </div>
        @endforelse
    </div> <!-- end ideas container-->

    {{--    start simple --}}
    <div class="my-8">
{{--        {{ $ideas->appends(request()->query())->links() }}--}}
        {{ $ideas->links() }}
    </div>

    {{--    end simple --}}

</div>
