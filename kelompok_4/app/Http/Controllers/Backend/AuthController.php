<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmChangePassword;
use App\Models\PasswordReset;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Login';

        return view('backend.auth.login', compact('title'));
    }

    public function authenticate(Request $request)
    {
        $message = config('validation_message');
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], $message);

        $credentials = $request->only('email', 'password');
        $remember    = ($request->remember) ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed...
            return redirect()->intended(route('backend.index'));
        }

        return back()->withInput($request->only('email'))->with('wrong_password', 'Password salah.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function register_form()
    {
        $title = 'Register';

        return view('backend.auth.register', compact('title'));
    }

    public function register(Request $request)
    {
        $message = config('validation_message');

        $request->validate([
            'nama'            => 'required|string',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|string|min:6',
            'ulangi_password' => 'required|string|min:6|same:password',
        ], $message);

        $data = [
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ];

        User::create($data);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('backend.index'));
        }

        return back();
    }

    public function forgotPasswordForm()
    {
        $title = 'Lupa Password';

        return view('backend.auth.forgot_password', compact('title'));
    }

    public function forgotPassword(Request $request)
    {
        $message = config('validation_message');
        $message['exists'] = ':Attribute tidak terdaftar.';
        $request->validate(['email' => 'required|email|exists:users,email'], $message);

        $email = encrypt($request->email);

        return redirect()->route('backend.confirm_reset_password', compact('email'));
    }

    public function confirmResetPassword($email)
    {
        $email = decrypt($email);
        $user  = User::where('email', $email)->first();

        $passwordReset = PasswordReset::where('email', $email)->first();

        if (!$passwordReset) {
            $passwordReset = DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => rand(100000, 999999),
            ]);
        }

        Mail::to($user)->send(new ConfirmChangePassword($user, $passwordReset['token']));

        $title = 'Lupa Password';

        return view('backend.auth.confirm_change_password', compact('email', 'title'));
    }

    public function resetPasswordForm($email)
    {
        $passwordReset = PasswordReset::where('email', decrypt($email))->firstOrFail();

        $title = 'Reset Password';

        return view('backend.auth.reset_password', compact('passwordReset', 'title'));
    }

    public function resetPassword(Request $request)
    {
        $message = config('validation_message');
        $request->validate([
            'kode_verifikasi' => 'required|numeric|digits:6|exists:password_resets,token',
            'password_baru'   => 'required|string|min:6',
            'ulangi_password' => 'required|string|same:password_baru',
        ], $message);

        $user = User::where('email', $request->email)->firstOrFail();

        $user->update(['password' => bcrypt($request->password_baru)]);

        PasswordReset::where([
            'email' => $request->email,
            'token' => $request->kode_verifikasi,
        ])->delete();

        return redirect()->route('login');
    }
}
