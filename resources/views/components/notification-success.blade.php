@props([
    'type' => 'success',
    'redirect' => false,
    'messageToDisplay' => ''
])

<div
        x-data="{
            isOpen: false,
            messageToDisplay: '{{ $messageToDisplay }}',
            showNotification(message) {
                this.isOpen = true
                this.messageToDisplay = message
                setTimeout(() => {
                    this.isOpen = false
                }, 5000)
            }
        }"
        x-init="
            @if($redirect)
                $nextTick(() => showNotification(messageToDisplay))
            @else
                window.livewire.on('ideaWasUpdated', message => {
                    showNotification(message)
                })

                window.livewire.on('ideaWasMarkedAsSpam', message => {
                    showNotification(message)
                })

                window.livewire.on('ideaWasMarkedAsNotSpam', message => {
                    showNotification(message)
                })

                window.livewire.on('commentWasPosted', message => {
                    showNotification(message)
                })

                window.livewire.on('commentWasUpdated', message => {
                    showNotification(message)
                })

                window.livewire.on('commentWasDeleted', message => {
                    showNotification(message)
                })

                window.livewire.on('commentWasMarkAsSpam', message => {
                    showNotification(message)
                })

                window.livewire.on('commentWasMarkAsNotSpam', message => {
                    showNotification(message)
                })

                window.livewire.on('statusWasUpdated', message => {
                    showNotification(message)
                })
            @endif
        "
        x-cloak
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-8"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-8"

        @keydown.escape.window="isOpen = false"

        class="fixed bottom-0 right-0 z-30 flex justify-between w-full max-w-xs px-6 py-5 mx-2 my-8 bg-white border shadow-lg sm:max-w-sm rounded-xl hover:shadow-xl sm:mx-6">
        <div class="text-base font-semibold text-left text-gray-500">
            <div class="flex items-center">
                @if ($type == 'success')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 text-green">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                @endif

                @if ($type == 'error')
                    <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 text-red">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                @endif

                <div class="ml-2 text-sm font-semibold text-gray-500 sm:text-base" x-text="messageToDisplay"></div>
            </div>
        </div>


        <button
            @click="isOpen = false"
            class="ml-4 text-xs text-right text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
