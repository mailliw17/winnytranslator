<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'phone', 'role', 'password'
    ];

    public function userpayment()
    {
        return $this->hasOne('App\UserPayment');
    }

    public function chapter()
    {
        return $this->hasMany('DocumentChapter');
    }
}
