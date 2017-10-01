<?php

namespace App\Repositories;


use App\Contracts\UserContract;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store as Session;


class UserRepository implements UserContract
{
    public function create($name)
    {
        try{
            $user = User::create([
                'name' => $name,
            ]);

            return $user;
        }catch (\Exception $e){
            return false;
        }
    }

    public function login(User $user)
    {
        try{

            if(!$user->isOnline()){
                Auth::login($user);
                $user->onOnline();
                $user->updatedTimeOnline();

                return true;
            }

        }catch (\Exception $e){
            return false;
        }

        return false;
    }

    public function logout(Session $session)
    {
        try {

            $user = Auth::user();

            Auth::guard()->logout();
            $session->invalidate();

            $user->offOnline();
            $user->updatedTimeOnline();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function online()
    {
        return User::where('online', true)->get();
    }
}