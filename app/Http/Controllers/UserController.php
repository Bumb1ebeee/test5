<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login');
    }

    public function loginPage() {
        return view('login');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect('/');
        }

        return redirect('/login')->with('error', 'Неверные данные');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function profile(Request $request) {
        $messages = Message::where('user_id', $request->input('user_id'))->get();
        return view('profile', compact( 'messages'));
    }

    public function admin() {
        $messages = Message::where('status','insult')->orderBy('created_at', 'desc')->get();

        return view('admin', compact('messages'));
    }
}
