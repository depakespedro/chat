<?php

namespace App\Repositories;

use App\Contracts\MessageContract;
use App\Message;

class MessageRepository implements MessageContract
{
    public function create(\App\User $user, $text)
    {
        try {
            $message = Message::create([
                'user_id' => $user->id,
                'text' => $text,
            ]);

            return $message;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function all($count = 100)
    {
        return Message::orderBy('created_at', 'desc')->take($count)->get();
    }
}