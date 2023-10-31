<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function forgot_password()
    {
        return view('forgot-password');
    }

    public function forgot_password_post(Request $request)
    {
        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $random_pass = rand(11111111, 99999999);
            $user->password = Hash::make($random_pass);
            $user->save();

            $user->password = $random_pass;
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Plase check your email');
        } else {
            return redirect()->back()->with('error', 'Email Not Found');
        }
    }
    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);

        $user->save();
        return redirect('/')->with('success', 'Register Success');
    }

    public function CheckEmail()
    {
        $email = request()->input('email');
        $isExists = User::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->is_role == '1') {
                return redirect()->intended('admin/dashboard');
            } else if (Auth::User()->is_role == '0') {
                return redirect()->intended('employee/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credential');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
