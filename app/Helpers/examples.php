<?php
  
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
} // end func
   
function productImagePath($image_name){
    return public_path('images/products/'.$image_name);
} // end func

function versi(){
	$laravel = app();
    return $laravel::VERSION;
} // end func