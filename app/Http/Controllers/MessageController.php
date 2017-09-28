<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class MessageController extends Controller
{

    public function all()
    {
        return Message::all()->take(500);
    }

    public function store(Request $request, Guard $guard, $text)
    {
        $user = $guard->user();

        message()->create($user, $text);
    }
}
