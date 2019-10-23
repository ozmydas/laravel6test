<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSource extends Model{
    
    # contact source has many contacts

	public function contacts(){
		return $this->hasMany('App\Contact');
	} // end func

}
