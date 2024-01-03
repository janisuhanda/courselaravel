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
            echo $user->phone->phone ?? '' ;
            echo "<br>";
            echo "Role :";
            echo "<br>";
            foreach ($user->roles()->get() as $role) {
            echo $role->name;
            echo "<br>";
            }
            echo $user->roles()->get()[0]->name;
            echo "<hr>";
        }
    }
}
