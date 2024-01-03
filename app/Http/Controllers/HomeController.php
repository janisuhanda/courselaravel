<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        echo "home";
        echo '<br>';
        echo 'id :'.Auth::id();
        echo '<br>';
        echo 'name : '.auth()->user()->name;
    }
}
