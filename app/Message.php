<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'text',
        'created_at',
        'updated_at',
    ];
}
