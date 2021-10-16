<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials))
            return redirect()->back()->withErrors('Usuário e/ou senha inválidas');

        
        return redirect()->route('dashboard');

    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return redirect('/dashboard');
    }
}
