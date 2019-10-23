<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model{
    
    # account belong to user
	# account has many contact

	public function user(){
		return $this->belongsTo('App\User');
	} // end func

	public function contacts(){
		return $this->hasMany('App\Contact');
	} // end func

}
