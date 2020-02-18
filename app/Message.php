<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Channel;

class Message extends Model
{
    

    protected $fillable = ['message','channel_id'];

    protected $hidden = [
        'id', 'user_id','created_at','updated_at'
    ];
	/**
	 * A message belong to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
	  return $this->belongsTo(User::class);
	}

	public function channel()
	{
	  return $this->belongsTo(Channel::class);
	}



}
