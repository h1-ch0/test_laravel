<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginUserController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        $request->validate([
            'email'=>'required|email',
            'password' => 'required|min:8, string'

        ]);
        if (Auth::guard('web')->attempt(['email'=>$email, 'password' => $password])){
            return redirect()->intended(route('posts.index'));
        } elseif(!User::where('email', $email)->first()){
            return back()->withError([
                'email' => "Unidentified email",
            ]);
        }
            else {
            return back()->withError([
                // 'email' => "Unidentified email",
                'password' => "Unidentified password"
            ]);
        }
        
    }

        public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate(); //session_destroy();
        $request->session()->regenerateToken(); //csrf토큰 재생성
        return to_route('posts.index');
    }
}