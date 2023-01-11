<div
    x-cloak
    x-data="{ open: false }"
    x-show="open"
    x-transition:enter="transition ease-in duration-350"
    @keydown.escape.window="open = false"
{{--    @custom-show-edit-comment-modal.window="open = true"--}}
    x-init="
        window.livewire.on('commentWasUpdated', () => {
            open = false
        })

        window.Livewire.on('editCommentWasSet', () => {
            open = true
            $nextTick(() => $refs.body.focus())
        })
    "
    class="relative z-10"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
>

    <div
        x-show.transition.opacity="open"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        aria-hidden="true"
    >
    </div>

    <div
        x-transition:enter="transition ease-in duration-350"
        x-transition:leave.duration.400ms
        x-show="open"
        class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 sm:mb-24">

            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button
                        @click="open = false"
                        class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-center text-lg font-medium text-gray-900">Edit Comment</h3>
                    <form wire:submit.prevent="updateComment" action="#" method="POST" class="space-y-4 px-2 py-4">
                        <div>
                            <textarea wire:model.defer="body" x-ref="body" name="comment" id="comment_id" cols="30" rows="4"
                                      class="w-full bg-gray-100 text-sm rounded-xl placeholder-gray-900 px-4 py-2 border-none"
                                      placeholder="Edit your comment"></textarea>
                            @error('body')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button"
                                    class="w-1/2 flex h-8 text-xs bg-gray-200 font-semibold rounded-xl border-gray-200 hover:bg-gray-400 transition duration-150 ease-in flex items-center justify-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>

                            <button type="submit"
                                    class="w-1/2 h-8 text-xs bg-blue border-blue font-semibold text-white rounded-xl border hover:bg-blue-hover transition duration-150 ease-in">
                                <span>Update</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
