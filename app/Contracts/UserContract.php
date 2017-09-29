<?php

namespace App\Contracts;
use App\User;

interface UserContract
{
    public function create($name);

    public function login(User $user);

    public function logout(User $user = null);
}