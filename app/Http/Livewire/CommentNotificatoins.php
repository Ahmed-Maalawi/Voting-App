<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class CommentNotificatoins extends Component
{

    const NOTIFICATION_THRESHOLD = 9;
    public $notifications;
    public $notificationCount;
    public bool $isLoading = true;

    protected $listeners = ['getNotifications'];


    public function mount()
    {
        $this->notifications = collect([]);
        $this->getNotificationCount();
    }
    
    public function getNotificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if ($this->notificationCount > self::NOTIFICATION_THRESHOLD) {
            $this->notificationCount = self::NOTIFICATION_THRESHOLD.'+';
        }
    }

    public function markAllAsRead()
    {
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotificationCount();
        $this->getNotifications();
    }

    public function getNotifications()
    {
        sleep(2);
        $this->notifications = auth()->user()->unreadNotifications()->latest()
            ->take(self::NOTIFICATION_THRESHOLD)->get();

        $this->isLoading = false;
    }

    public function scrollToComment($notification)
    {
        $idea = Idea::find($notification->data['idea_id']);

        if(! $idea) {
            session()->flash('error_message', 'This idea no longer exists!');

            return redirect()->route('idea.index');
        }


        $comment = Comment::find($notification->data['comment_id']);

        if(! $comment) {
            session()->flash('error_message', 'This comment no longer exists!');

            return redirect()->route('idea.index');
        }

        $comments = $idea->comments()->pluck('id');

        $indexOfComment = $comments->search($comment->id);

        $page = ($indexOfComment / $comment->getPerPage()) + 1;
        dd($comments);

        session()->flash('scrollToComment', $comment->id);

        return redirect()->route('idea.show', [
            'idea' => $notification->data['idea_slug'],
            'page' => $page,
        ]);
    }

    public function markAsRead($notificationId)
    {
        if( auth()->guest() ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $notification = DatabaseNotification::findOrFail($notificationId);
        $notification->markAsRead();

        $this->scrollToComment($notification);

    }


    public function render()
    {
        return view('livewire.comment-notificatoins');
    }
}