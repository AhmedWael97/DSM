<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        if(Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function submit_login(Request $request) {
        
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password], $request->rememberme)) {
            $user = User::where('email',$request->email)->first();
            Auth::login($user);
            return redirect()->route('home'); 
        } else {
            return back()->with('error',translate('Invalid E-mail or Password'));
        }
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect('/login');
        } 

        abort(404);
    }
}
