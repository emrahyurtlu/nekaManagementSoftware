<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $user = User::all()->where('email', '==', $email)->where('password', '==', $password)->first;
        if ($user !== null) {
            Session::put('user', $user);
            return redirect()->to('/products');
        } else {
            return view('auth.login');
        }

    }

    public function logout(Request $request)
    {
        Session::forget('user');
        return redirect()->to('/');
    }
}
