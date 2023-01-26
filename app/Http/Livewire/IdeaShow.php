<?php

namespace App\Http\Livewire;

use App\Exceptions\DublicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{

    use WithAuthRedirects;

    public $idea;
    public $votesCount;
    public $hasVoted;
    public $user;

    protected $listeners = [
        'statusWasUpdated',
        'ideaWasUpdated',
        'ideaWasMarkedAsSpam',
        'ideaWasMarkedAsNotSpam',
        'commentWasPosted',
        'commentWasDeleted',
    ];

    public function mount(Idea $idea, $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function vote()
    {
        if (! auth()->guest()) {

            return $this->redirectToLogin();
        }

        if ($this->hasVoted) {
            try {
                $this->idea->removeVote(auth()->user());
            } catch (VoteNotFoundException $e) {
                // do nothing
            }
            $this->votesCount--;
            $this->hasVoted = false;

        } else {
            try {

                $this->idea->vote(auth()->user());

            } catch (DublicateVoteException $e) {
                // do nothing
            }
            $this->votesCount++;
            $this->hasVoted = true;

        }

    }

    public function statusWasUpdated()
    {
        $this->idea->refresh();
    }


    public function ideaWasUpdated()
    {
        $this->idea->refresh();
    }
    public function commentWasDeleted()
        {
            $this->idea->refresh();
        }

    public function ideaWasMarkedAsSpam()
    {
        $this->idea->refresh();
    }

    public function ideaWasMarkedAsNotSpam()
    {
        $this->idea->refresh();
    }
    public function commentWasPosted()
    {
        $this->idea->refresh();
    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
