<?php

namespace App\Feedbacks;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'text',
    ];
}
