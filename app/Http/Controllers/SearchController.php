<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;

class SearchController extends Controller{
    
    public function index(){
        return view('search.index');
    } // end func


    public function autocomplete(Request $request){
    	$words = $request->get("query");
    	$data = Items::select("name")
                ->where("name","LIKE","%{$words}%")
                ->get();
   
        return response()->json($data);
    } // end func


} // end class