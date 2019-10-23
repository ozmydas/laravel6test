<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityStatus extends Model{
    
	# activity status has many activities

	public function activities(){
		return $this->hasMany('App\Activity');
	} // end func

}
