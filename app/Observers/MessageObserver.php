<?php

namespace App\Observers;

use App\Message;
use App\Traits\ModelObserverManager;

class MessageObserver
{
    use ModelObserverManager;

    public function saved(Message $message)
    {
        $this->setModel($message);
        $this->updatedTimeOnlineUser();
    }

    protected function updatedTimeOnlineUser()
    {
        $this->model->user->updatedTimeOnline();
    }
}