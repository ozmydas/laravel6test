<?php

#baca semua file yg ada di direktori kecuali file ini
$dir_handle = opendir(dirname(__FILE__));

while($file = readdir($dir_handle)):
	
	if(in_array($file, ['.', '..', 'helpers.php']))
		continue;

	require_once(dirname(__FILE__)."/".$file);

endwhile;
