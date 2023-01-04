<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class MarkIdeaNotSpam extends Component
{

    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function markedAsNotSpam()
    {

        if(auth()->guest() || ! auth()->user()->isAdmin())
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_reports = 0;
        $this->idea->save();

        $this->emit('ideaWasMarkedAsNotSpam', 'Spam Counter was reset!');
    }

    public function render()
    {
        return view('livewire.mark-idea-not-spam');
    }
}
