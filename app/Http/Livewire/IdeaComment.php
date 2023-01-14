<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{
    public $comment;
    public $ideaUserId;

    protected $listeners = [
        'commentWasUpdated',
        'commentWasMarkAsSpam'
    ];


    public function commentWasUpdated()
    {
        $this->comment->refresh();
    }

    public function commentWasMarkAsSpam()
    {
        $this->comment->refresh();
    }

    public function mount(Comment $comment, int $ideaUserId)
    {
        $this->comment = $comment;
        $this->ideaUserId = $ideaUserId;
    }
    public function render()
    {
        return view('livewire.idea-comment');
    }
}
