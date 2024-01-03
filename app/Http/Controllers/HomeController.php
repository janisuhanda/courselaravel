<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // echo "home";
        // echo '<br>';
        // echo 'id :'.Auth::id();
        // echo '<br>';
        // echo 'name : '.auth()->user()->name;


        if (Gate::allows('isAdmin'))
        {
            $nama=auth()->user()->name;
            return view('home',compact('nama'));
        }else{
            echo "anda bukan admin";
        }
    }
}
