<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Excella{
	
	public function CellToArray($file){
		$reader = new Xlsx();
    	
    	$reader->setReadDataOnly(true);
    	$spreadsheet = $reader->load($file);
    	$worksheet = $spreadsheet->getActiveSheet();
    	$rows = $worksheet->toArray();
    	
    	$isi = [];
    	$i = 0;
    	foreach ($rows as $key => $value):
    		$row = $key + 1;

    		foreach ($value as $key => $value):
    			$col = AlphaByNum($key++);

    			$isi[$row][$col] = empty($value) ? "" : $value;

    		endforeach;
    	endforeach;

    	return $isi;
	} // end func

}