<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\UserTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
{
    if (Auth::check()) {
        return redirect('/welcome');
    }

    return view('login');
}
   public function showRegister()
{
    if (Auth::check()) {
        return redirect('/welcome');
    }

    return view('register');
}
    
public function register(Request $request)
{
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // สร้างตาราง users หากยังไม่มี
    UserTable::ensureExists();

    // ตรวจสอบอีเมลซ้ำหลังจากแน่ใจว่ามีตารางแล้ว
    if (User::where('email', $data['email'])->exists()) {
        return back()
            ->withErrors(['email' => 'อีเมลนี้มีผู้ใช้งานแล้ว'])
            ->withInput($request->only('name', 'email'));
    }

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('index');
}


    
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect('/welcome');
    }

    return back()
        ->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ])
        ->onlyInput('email');
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/welcome');
    }
}