<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::min(8), 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            // Default role, position, and section
            'role' => 'user',
            'position' => 'Jemaat',
            'section' => 'Umum',
        ]);

        return redirect()->route('login')->with('success', 'Rejistrasaun susesu! Bele login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Arahkan ke admin panel jika:
            // - role = admin
            // - atau role = majelis dan position = xefe majelis
            if (
                $user->role === 'admin' ||
                ($user->role === 'majelis' && strtolower($user->position) === 'xefe majelis')
            ) {
                return redirect()->intended('/admin');
            }

            // Jika bukan admin atau ketua majelis
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Ita nia kredensial sala.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Ita susesu halo logout.');
    }
}
