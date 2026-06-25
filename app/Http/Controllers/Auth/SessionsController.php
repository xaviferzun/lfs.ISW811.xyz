<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionsController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view ('auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', Password::defaults()],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/ideas');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/ideas');
    }
}