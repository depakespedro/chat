<?php

namespace App\Contracts;

interface MessageContract
{
    public function create(\App\User $user, $text);

    public function all($count = 100);
}