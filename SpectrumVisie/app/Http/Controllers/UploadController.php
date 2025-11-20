<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UploadController extends Controller
{

    protected function profileImagePath(Request $request)
    {
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            return $request->file('profile_picture')->store('avatars', 'public');
        }

        return 'avatars/defaultavatar.png';
    }

    public function setProfile(Request $request)
    {
        $user = Auth::user();

        // The $rules array are default rules that will always be applied to specified fields
        $rules = [
            'profile_picture' => 'image|mimes:jpg,jpeg,png|max:2048',
            'about_me' => 'string',
            'gender' => 'string',
            'sexuality' => 'string',
        ];

        if ($user->first_login) {
            foreach (['profile_picture', 'about_me', 'gender', 'sexuality'] as $field) {
                $rules[$field] = 'required|' . $rules[$field];
            }
        }

        $request->validate($rules);

        $profile = Profile::firstOrNew(['user_id' => Auth::id()]);

        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            if ($profile->exists && $profile->profile_picture !== 'avatars/defaultavatar.png') {
                Storage::disk('public')->delete($profile->profile_picture);
            }

            $profilePicturePath = $request->file('profile_picture')->store('avatars', 'public');
        } else {
            $profilePicturePath = $profile->profile_picture ?? 'avatars/defaultavatar.png';
        }

        $profile->fill([
            'user_id' => Auth::id(),
            'about_me' => $request->about_me,
            'profile_picture' => $profilePicturePath,
            'gender' => $request->gender,
            'sexuality' => $request->sexuality
        ]);

        $profile->save();

        return redirect()->route('home')->with('success', 'Succesfully set up your profile!');
    }
}
