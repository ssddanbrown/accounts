<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }

    public function attempt(Request $request)
    {
        $validated = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::query()->where('email', '=', $validated['email'])->first();
        if (!$user || !auth()->attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => ['User not found or password is incorrect'],
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();

        return redirect()->route('login.show');
    }
}
