<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    protected $fillable=[
    'user_id', 'emot', 'text', 'emot_text'
    ];
}