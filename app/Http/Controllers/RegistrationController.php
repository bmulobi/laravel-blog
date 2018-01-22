<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed'
            ]);

        //$user = User::create(request(['name', 'email', 'password']));

        $user = User::create(
            [
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]
        );

        // sign in options
        // \Auth::login()
        // auth()
        // \Request::input
        // request()->input

        auth()->login($user);

        return redirect()->home(); // same as redirect('/')
    }
}
