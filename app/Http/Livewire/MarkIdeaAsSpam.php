<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class MarkIdeaAsSpam extends Component
{

    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function markedAsSpam()
    {
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_reports++;
        $this->idea->save();

        $this->emit('ideaWasMarkedAsSpam', 'idea marked as spam successfully!');
    }

    public function render()
    {
        return view('livewire.mark-idea-as-spam');
    }
}
