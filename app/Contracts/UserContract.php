<?php

namespace App\Contracts;
use App\User;
use Illuminate\Session\Store as Session;

interface UserContract
{
    public function create($name);

    public function login(User $user);

    public function logout(Session $request);

    public function online();
}