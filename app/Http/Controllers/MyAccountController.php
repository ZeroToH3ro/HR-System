<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MyAccountController extends Controller
{
    public function my_account()
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('my_account.update', $data);
    }

    public function update(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if (!empty($request->file('profile_image'))) {
            if (!empty($user->profile_image) && file_exists(public_path('images/profile' . $user->profile_image))) {
                unlink('images/profile/' . $user->profile_image);
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/profile');
            $file->move($destinationPath, $fileName);
            $user->profile_image = $fileName;
        }
        $user->save();

        return redirect('admin/my_account')->with('success', 'My Account Successful Update');
    }

    public function profile()
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('employees.my_account.update', $data);
    }

    public function update_profile(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if (!empty($request->file('profile_image'))) {
            if (!empty($user->profile_image) && file_exists(public_path('images/profile' . $user->profile_image))) {
                unlink('images/profile/' . $user->profile_image);
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/profile');
            $file->move($destinationPath, $fileName);
            $user->profile_image = $fileName;
        }
        $user->save();

        return redirect('employee/my_account')->with('success', 'My Account Successful Update');
    }
}
