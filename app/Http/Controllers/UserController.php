<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class UserController extends Controller
{
    // public function showUser()
    // {
    //     $user= Auth::user();
    //     return view('user.show-detail', compact('user'));
    // }
    //
    // public function createEdit($id = NULL)
    // {
    //     if($id= auth()->user()->id)
    //     {
    //         $data = User::where('id', $id)->first();
    //         /* echo "<pre>";
    //         print_r($data);
    //         die; */
    //         return view('user.edit', compact('data'));
    //     }
    //     else
    //     {
    //         return view('auth.register');
    //     }
    // }
}
