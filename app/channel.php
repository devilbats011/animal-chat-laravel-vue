<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;

class Channel extends Model
{
    
    // public function User()
    // {
    // 	return $this->hasOne('App\User');
    // } 

	public $incrementing = false;

    public function message()
    {
        return $this->hasMany(Message::class);
    }

}
