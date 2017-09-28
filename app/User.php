<?php

namespace App;

use App\Traits\ModelValidate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, ModelValidate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'online',
        'last_updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public static function rules(){
        return [
            'name' => 'required|unique:users,name,|min:3|max:50',
        ];
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function isOnline()
    {
        return $this->online;
    }

    public function onOnline()
    {
        $this->online = true;
        $this->save();
    }

    public function offOnline()
    {
        $this->online = false;
        $this->save();
    }

    public function updatedTimeOnline()
    {
        $this->last_updated_at = Carbon::now();
        $this->save();
    }
}
