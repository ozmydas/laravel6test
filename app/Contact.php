<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{

	protected $fillable = [
		'title', 'first_name', 'last_name', 'email', 'phone', 'address', 'date',
	];
    

	# contact belong to source, status, account, and user
	# contact has many activities

	public function source(){
		return $this->belongsTo('App\ContactSource');
	} // end func

	public function status(){
		return $this->belongsTo('App\ContactStatus');
	} // end func

	public function account(){
		return $this->belongsTo('App\Account');
	} // end func

	public function user(){
		return $this->belongsTo('App\User');
	} // end func


	public function activities(){
		return $this->hasMany('App\Activity');
	} // end func

}
