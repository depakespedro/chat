<?php

namespace App\Repositories;


use App\Contracts\UserContract;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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

    public function logout()
    {
        try{
            $user = Auth::user();

            if(is_null($user)){
                return false;
            }

            Auth::logout($user);
            $user->offOnline();
            $user->updatedTimeOnline();

            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}