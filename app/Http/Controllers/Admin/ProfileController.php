<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Admin Profile Edit ============
    public function editProfile()
    {
        return view('Admin.profile.profile_edit');
    }
    // Admin profile update ===========
    public function updateProfile(Request $request)
    {
        // validation
        $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'profile'      => 'image|mimes:jpg,png,jpeg,gif|max:3072',
        ]);
        // Update
        $adminUpdate               = User::find(Auth::id());
        $adminUpdate->name         = $request->name;
        $adminUpdate->email        = $request->email;
        $adminUpdate->phone_number = $request->phone_number;
        // profile
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            @unlink(public_path('Backend/assets/media/profile/' . $adminUpdate->profile));
            $profile_name = hexdec(uniqid()) . '.' . $request->profile->getClientOriginalExtension();
            $imagePath    = public_path('/Backend/assets/media/profile/');
            $profile->move($imagePath, $profile_name);
            $adminUpdate->profile = $profile_name;
        }
        $adminUpdate->about = $request->about;
        $adminUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Admin Password Change ===========
    public function PasswordChange()
    {
        return view('Admin.profile.password_change');
    }
    // Admin Password Update ===========
    public function PasswordUpdate(Request $request)
    {
        // validation
        $validation = $request->validate([
            'current_password' => 'required',
            'password'         => 'required',
        ]);
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            // validation
            $validation = $request->validate([
                'password' => 'required|confirmed',
            ]);
            // update
            $changePass           = User::find(Auth::user()->id);
            $changePass->password = Hash::make($request->password);
            $changePass->save();
            // logout
            Auth::logout();
            // Flash MSG
            $notification = array(
                'message'    => 'Your Password Update Successfully',
                'alert-type' => 'success',
            );
            // Redirect
            return redirect('/')->with($notification);

        } else {
            $notification = array(
                'message'    => 'Your Current Password Not Match',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

}
