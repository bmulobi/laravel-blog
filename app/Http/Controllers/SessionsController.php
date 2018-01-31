<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }

    public function store()
    {
        // dd(auth()->attempt(request(['email', 'password'])));
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => "Invalid credentials"
            ]);
        }
//
//        return redirect()->home();
//        $pwd = request('password');
//
//        $user = User::where('email', request('email'))->where('password', bcrypt('$pwd'))->first();
//        dd($user);
//        $token = $user->createToken('my token-')->accessToken;
//
//        return $token;

        if (auth()->attempt(request(['email', 'password']))) {
            return User::where('email', request('email'))->first()->createToken('my token-')->accessToken;
        } else {
            return ["error" => "Invalid credentials"];
        }
    }
}
