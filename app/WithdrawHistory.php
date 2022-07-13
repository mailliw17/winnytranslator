<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawHistory extends Model
{
    protected $fillable = [
        'user_payment_id', 'salary', 'status', 'number_words_wd'
    ];
}
