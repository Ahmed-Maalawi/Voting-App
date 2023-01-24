<?php

namespace App\Http\Livewire;

use App\Models\User;
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

    public function getNotifications()
    {
        sleep(2);
        $this->notifications = auth()->user()->unreadNotifications()->latest()
            ->take(self::NOTIFICATION_THRESHOLD)->get();

        $this->isLoading = false;
    }
    public function render()
    {
        return view('livewire.comment-notificatoins');
    }
}
