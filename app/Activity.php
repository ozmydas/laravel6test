<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model{

    #activity belongs to a status, a contacts, and a user

	public function status(){
		return $this->belongsTo('App\ActivityStatus');
	} // end func

	public function contact(){
		return $this->belongsTo('App\Contact');
	} // end func

	public function user(){
		return $this->belongsTo('App\User');
	} // end func

}
