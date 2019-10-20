<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function create(){
        return view('user.create');
    }


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
    }

}