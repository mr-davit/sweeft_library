<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (
        Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], (bool)$request->has('remember'))
        )
        { return redirect(route('home'));}

        return back()->withErrors(['email'=>"Your credentials does not match our records"]);
    }

    public function logout (){

    }
}
