<x-modal-confirm
    event-to-open-modal="custom-show-no-marked-modal"
    event-to-close-modal="ideaWasMarkedAsNotSpam"
    modal-title="Reset Spam Counter"
    modal-description="Are you sure you want to mark this idea as not spam? This will reset the spam counter to 0."
    modal-confirm-button-text="Reset Spam Counter"
    wire-click="markedAsNotSpam"
/>
