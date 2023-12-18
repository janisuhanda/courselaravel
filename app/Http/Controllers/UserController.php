<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        // echo "<pre>";
        // print_r($users);
        foreach ($users as $user) {
            echo $user->name;
            echo "<br>";
            echo $user->email;
            echo "<br>";
            echo $user->phone->phone;
            echo "<br>";
        }
    }
}
