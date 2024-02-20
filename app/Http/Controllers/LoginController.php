<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function index()
    {
        $data = User::orderBy('id_user', 'asc')
        ->where('role', 'user')
        ->paginate(5);
        return view('user.index', compact('data'));
    }
    public function change_password()
    {
        return view('user.password');
    }
    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with('error', 'Tidak sama');
        }

        User::where('id_user', auth()->user()->id_user)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->to('/')->with('status', 'success');
    }
   
    
}
