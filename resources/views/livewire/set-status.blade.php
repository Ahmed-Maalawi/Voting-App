<div
    class="relative"
    x-data="{open: false}"
    x-init="window.livewire.on('statusWasUpdated', () => {open = false})"
    >

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


    <div @click.away="open = false" x-cloak x-show="open" @keydown.escape.window="open = false"
         class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        <form wire:submit.prevent="setStatus" method="POST" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                {{-- @foreach ( as )

                @endforeach --}}
                <div>
                    <label for="radio-direct" class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" value="1"
                               class="bg-gray-200 text-gray-600 border-none">
                        <span class="ml-2">open</span>
                    </label>
                </div>
                <div>
                    <label for="radio-direct" class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" value="2"
                               class="bg-gray-200 text-purple border-none">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label for="radio-direct" class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" value="3"
                               class="bg-gray-200 text-yellow border-none">
                        <span class="ml-2">In Progress</span>
                    </label>
                </div>
                <div>
                    <label for="radio-direct" class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" value="4"
                               class="bg-gray-200 text-yellow border-none">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label for="radio-direct" class="inline-flex items-center">
                        <input wire:model="status" type="radio" name="radio-direct" value="5"
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

            <div class="block text-left font-semibold text-sm mt-2">
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
