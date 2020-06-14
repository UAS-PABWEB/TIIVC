<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.user.edit_form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userID = $user->id;
        $message = config('validation_message');
        $request->validate([
            'foto'     => "nullable|image",
            'nama'     => "required|string",
            'nomor_hp' => "nullable|numeric|digits_between:11,15|unique:users,phone,$userID",
            'email'    => "required|email|unique:users,email,$userID",
            'alamat'   => "nullable|string",
        ], $message);
// dd(filter_var('$user->image', FILTER_VALIDATE_URL));
        if ($request->foto) {
            $path = $request->file('foto')->store('public/user');

            // delete old image
            if (Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
        } else {
            $path = (Storage::exists($user->image) || filter_var($user->image, FILTER_VALIDATE_URL))
                ? $user->image
                : null;
        }

        $user->update([
            'image'   => $path,
            'name'    => $request->nama,
            'phone'   => $request->nomor_hp,
            'email'   => $request->email,
            'address' => $request->alamat,
        ]);

        return redirect()->route('user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Change Password Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm()
    {
        return view('backend.user.change_password');
    }

    /**
     * Change Password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $message = config('validation_message');
        $request->validate([
            'password'        => 'required|string|min:6|password',
            'password_baru'   => 'required|string|min:6',
            'ulangi_password' => 'required|string|min:6|same:password_baru',
        ], $message);

        Auth::user()->update(['password' => bcrypt($request->password)]);

        return redirect()->route('user.show', Auth::id());
    }
}
