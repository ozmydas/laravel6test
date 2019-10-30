<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Libraries\Excella;

class ExcelController extends Controller{

	public function index(){
		return view('excel.index');
    } // end func


    public function store(Request $request){
    	$file = $request->file('file_excel');

      //Display File Name
    	echo 'File Name: '.$file->getClientOriginalName();
    	echo '<br>';

      //Display File Extension
    	echo 'File Extension: '.$file->getClientOriginalExtension();
    	echo '<br>';

      //Display File Real Path
    	echo 'File Real Path: '.$file->getRealPath();
    	echo '<br>';

      //Display File Size
    	echo 'File Size: '.$file->getSize();
    	echo '<br>';

      //Display File Mime Type
    	echo 'File Mime Type: '.$file->getMimeType();
    	echo '<br/>';

      //Move Uploaded File
    	$file->move(public_path('files'),$file->getClientOriginalName());

    	// $this->proses(public_path('files')."/".$file->getClientOriginalName());

    	$excella = new Excella();
    	$data = $excella->CellToArray(public_path('files')."/".$file->getClientOriginalName());

    	dd($data);
    } // end func

}
