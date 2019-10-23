<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactStatus extends Model{
    
    # contact status has many contacts

	public function contacts(){
		return $this->hasMany('App\Contact');
	} // end func

}
