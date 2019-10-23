<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller{

    public function create(){
        return view('user.create');
    } // end function


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'password.required' => 'Nama Tidak Boleh Kosong',
        ]);

        $indata = $request->all();
        $indata['password'] = bcrypt($indata['password']);
        $user = User::create($indata);

        return back()
        ->with('success', 'Created Successfully.');
    } // end func


    /** below here for ajax **/

    public function ajaxcreate(){
        return view('user.ajaxcreate');
    } // end function


    public function ajaxstore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
        ]);

        if ($validator->fails()):
            $response = [
                'status' => FALSE,
                'error' => $validator->errors()->all(),
            ];

            return response()->json($response);
        endif;


        $indata = $request->all();
        $indata['password'] = bcrypt($indata['password']);
        $user = User::create($indata);

        if( ! $user):
            $response = [
                'status' => FALSE,
                'data' => $user,
            ];

            return response()->json($response);
        endif;


        $response = [
            'status' => TRUE,
            'data' => $user,
        ];

        return response()->json($response);
    } // end func

}