<?php

namespace App;

use App\Traits\ModelValidate;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use ModelValidate;

    protected $fillable = [
        'id',
        'user_id',
        'text',
        'created_at',
        'updated_at',
    ];

    public static function rules(){
        return [
            'text' => 'required|min:1',
        ];
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
