<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Component;

class CommentMarkAsNotSpam extends Component
{
    public Comment $comment;

    protected $listeners = ['setMarkAsNotSpamComment'];

    public function setMarkAsNotSpamComment(int $commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->emit('markAsNotSpamCommentwasSet');
    }

    public function MarkAsNotSpam()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->comment->spam_reports = 0;
        $this->comment->save();
        $this->emit('commentWasMarkAsNotSpam', 'comment spam counter was reset!');
    }
    public function render()
    {
        return view('livewire.comment-mark-as-not-spam');
    }
}
