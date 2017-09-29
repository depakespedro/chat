<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    public function scopeUser($query, User $user)
    {
        return $query->where('user_id', '=', $user->id);
    }
}
