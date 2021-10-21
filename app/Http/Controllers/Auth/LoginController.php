<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }
    public function index()
    {
        return view('admin.auth.login');      
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function authenticate(Request $request){
      
        $credintials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // dd($request);
        if(Auth::attempt($request->only(['email','password']),$request->remember)){
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        };
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
}
