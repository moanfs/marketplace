<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Login extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function attmpLogin(Request $request)
    {
        $role = $request->input('role');
        $validate = $request->validate([
            'role' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->put('isLoggedIn', true);
            $user = Auth::user();
            $selectedRole = $request->input('role');

            // Ambil peran pengguna dari database
            $userRole = $user->roles()->first();

            // Jika role yang dipilih tidak sesuai dengan peran pengguna
            if ($userRole && $selectedRole != $userRole->name) {
                Auth::logout(); // Logout pengguna
                return redirect('/login')->withErrors(['message' => 'Peran yang dipilih tidak sesuai dengan akun.']);
            }
            // Jika role sesuai, arahkan pengguna ke halaman yang sesuai
            if ($selectedRole == 'merchant') {
                return redirect('/merchant');
            } else {
                return redirect('/');
            }
        } else {
            $request->session()->flash('selectedRole', $request->input('role'));
            return redirect('/login')->withErrors(['message' => 'Email atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
