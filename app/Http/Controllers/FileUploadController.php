<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller{

	public function index(){
        return view('upload.index');
    } // end func


    public function store(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'-'.$request->image->hashName();

        $request->image->move(public_path('images'), $imageName);

        return back()
        ->with('success', 'Uploaded Successfully.')
        ->with('image', $imageName);
    } // end func

}
