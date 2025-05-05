<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Exception;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            // Validate incoming request
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            // Attempt to log in the user
               // Attempt login
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $request->session()->regenerate(); // Prevent session fixation

            return redirect()->intended('/dashboard')->with('success', 'Login successful.');
        }

        // Invalid credentials
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
        
        } catch (ValidationException $e) {
            // Handle validation failure (invalid input)
            Log::error('Login validation error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Validation failed.',
                'message' => $e->getMessage(),
            ], 422);
        } catch (Exception $e) {
            // Handle general errors (unexpected issues)
            Log::error('Login error: ' . $e->getMessage());
            return response()->json([
                'error' => 'An unexpected error occurred. Please try again later.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return response()->json([
                'message' => 'Logged out successfully.',
            ], 200);
        } catch (Exception $e) {
            Log::error('Logout error: ' . $e->getMessage());
            return response()->json([
                'error' => 'An error occurred during logout.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
