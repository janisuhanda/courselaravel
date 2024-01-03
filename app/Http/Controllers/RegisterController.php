<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' =>'required|min:5|max:20'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password)
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }
}
