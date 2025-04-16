<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
        ], [
            'name.required'         => 'Full name is required.',
            'email.required'        => 'Email is required.',
            'email.email'           => 'Please enter a valid email address.',
            'email.unique'          => 'This email is already registered.',
            'password.required'     => 'Password is required.',
            'password.confirmed'    => 'Passwords do not match.',
            'password.min'          => 'Password must be at least 8 characters.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'email_verified_at' => now(),
            ]);


            Auth::login($user);

            return redirect()->intended('/')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login page or home page
        return redirect()->back()->with('success', 'You have been logged out.');
    }

}
