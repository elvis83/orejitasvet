<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisableTime extends Model
{
    protected $fillable = [
		'key', 'value', 'user_id',
	];

	#RELACIÓN
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
