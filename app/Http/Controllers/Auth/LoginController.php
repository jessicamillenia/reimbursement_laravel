<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticate(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('nip', $request->input('nip'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return redirect()->intended('/home');
        } else {
            session(['notif' => 'Your credentials didn\'t match. Please try again.']);
        }

        return back()->withInput();
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        return redirect('/');
    }
}
