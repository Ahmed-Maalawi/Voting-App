<form wire:submit.prevent="createIdea" action="" method="POST" class="space-y-4 px-4 py-6 ">
    <div>
        <input wire:model.defer="title" type="text"
               class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none"
               placeholder="Your Idea" required>
        @error('title')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <select wire:model.defer="category" name="category_add" id="category_add"
                class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name}}</option>
            @endforeach
        </select>
        @error('category')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <textarea wire:model.defer="description"
                  name="idea" id="idea" cols="30" rows="4"
                  class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none"
                  placeholder="Describe your idea" required></textarea>
        @error('description')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
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

    <div>
        @if( session('success_message'))
            <div
                x-data="{ isVisible: true }"
                x-init="
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                "
                x-show.transition.duration.1000ms="isVisible"
                class="text-green mt-4"
            >
                {{ session('success_message') }}
            </div>
        @endif
    </div>
</form>
