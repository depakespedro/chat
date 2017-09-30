<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Events\UpdatedUsersOnline;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthUserController extends Controller
{
    public function register($name)
    {
        $user = user()->create($name);
        return $user;
    }

    public function login(User $user)
    {
        if (user()->login($user)) {
            return response('logged', 200);
        } else {
            return response('no logged', 400);
        }
    }

    public function logout()
    {
        if (user()->logout()) {
            return response('logout', 200);
        } else {
            return response('no logout', 400);
        }
    }

    public function event(Request $request)
    {
        $events = $request->get('events');

        $userId = $events[0]['user_id'];
        $event = $events[0]['name'];

        if($event == 'member_removed'){
            $user = User::find($userId);

            user()->logout($user);
        }

        return response('ok', 200);
    }

    public function usersOnline()
    {
        return user()->online();
    }
}
