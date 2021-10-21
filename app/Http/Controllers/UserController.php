<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(User $user){
       
        return view('admin.users.profile',['user' => $user]);
    }

    public function read ($id){
        Auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        return back();
    }
}