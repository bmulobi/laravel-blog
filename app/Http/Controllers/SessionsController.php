<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return redirect()->home();
    }
}
