<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $fillable = [
        'user_id', 'price', 'payment_method', 'account_info', 'number_chapters', 'number_words', 'last_payment', 'salary'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
