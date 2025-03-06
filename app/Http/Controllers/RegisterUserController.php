<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        request()->validate([
            'first_name' => ['required', 'string', 'min:1', 'max:255'],
            'last_name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::min(6), 'confirmed'],
            //'password' => ['required', 'string', Password::min(8)->numbers()->mixedCase()->symbols(), 'confirmed'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name must not exceed 255 characters.',
            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name must not exceed 255 characters.',
            'email.required' => 'The email is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email must not exceed 255 characters.',
            'email.unique' => 'The email has already been taken.',
            /*             'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.numbers' => 'The password must contain at least one number.',
            'password.mixedCase' => 'The password must contain both uppercase and lowercase letters.',
            'password.symbols' => 'The password must contain at least one special character.',
            'password.confirmed' => 'The password confirmation does not match.', */
        ]);

        $user = User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
        ]);

        Auth::login($user);

        return redirect("/");
    }
}
