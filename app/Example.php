<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
	// nama table
    protected $table = "t_example";

    // kolom yg diedit
    protected $fillable = [
    	'name', 'detail'
    ];
}
