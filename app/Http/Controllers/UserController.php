<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login.get');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('todos.index');
        } else {
            return back();
        }
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        try{
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
            return redirect()->route('login.get');
        }catch(Exception $e){
            return back();
        }
    }
}
