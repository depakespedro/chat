<?php

namespace App\Observers;

use App\Events\MessageCreated;
use App\Message;
use App\Traits\ModelObserverManager;
use Illuminate\Support\Facades\Log;

class MessageObserver
{
    use ModelObserverManager;

    public function saved(Message $message)
    {
        $this->setModel($message);
        $this->updatedTimeOnlineUser();
        $this->fireEventEssageCreated();
    }

    protected function updatedTimeOnlineUser()
    {
        $this->model->user->updatedTimeOnline();
    }

    public function fireEventEssageCreated()
    {
        $message = $this->getModel();
        event(new MessageCreated($message));
    }
}