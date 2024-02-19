<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function login_action(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == 'admin'){
                return redirect()->intended('/dashboard');
            }elseif (auth()->user()->role == 'staff'){
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/');
            }
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }
    public function create()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $credentials = $this->validate($request, [
            'name' => 'required',
            'nik' => 'required|unique:users',
            'username' => 'required|unique:users',
            'alamat' => 'required',
            'telfon' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        User::create($credentials);
        return redirect()->to('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
