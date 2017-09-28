<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function register($name)
    {
        $user =  user()->create($name);

        $errors = $user->getErrors();

        if(empty($errors)){
            return $user;
        }

        return $errors;
    }

    public function login(User $user)
    {
        if(user()->login($user)){
            return 'login';
        }else{
            return 'no login';
        }
    }

    public function logout()
    {
        if(user()->logout()){
            return 'logout';
        }else{
            return 'no logout';
        }
    }
}
