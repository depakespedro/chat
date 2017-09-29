<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthUserController extends Controller
{
    public function login($name)
    {
        $user = User::where('name', '=', $name)->first();

        if (is_null($user)) {
            $user = user()->create($name);
        }

        if (user()->login($user)) {
            return 'login';
        } else {
            return 'no login';
        }
    }

    public function logout()
    {
        if (user()->logout()) {
            return 'logout';
        } else {
            return 'no logout';
        }
    }

    public function event(Request $request)
    {

        $events = $request->get('events');

        $userId = $events[0]['user_id'];

        $user = User::find($userId);

        user()->logout($user);

        return response('ok', 200);
    }
}
