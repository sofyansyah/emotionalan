<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emoticon extends Model
{
    protected $fillable=[
    'post_id', 'emoticons', 'details'
    ];
}