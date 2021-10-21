<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('admin.auth.register');
    }

    public function store(RegisterFormRequest $request)
    {
        $validated = $request->validated();
        // return $validated;
        User::create([
            "email" => $validated['email'],
            "password" =>Hash::make($validated['password']),
            "name" => $validated['username']
        ]);

        Auth::attempt($request->safe()->only(['email','password']));
        return redirect()->route('dashboard');
    }
}
