<?php

namespace App\Http\Controllers;

use App\Models\PendingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function ShowRole()
    {
        return Roles::where('role_name', '!=', 'admin')->get();
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email|unique:users_pending,email',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required',
            'certificate_code' => 'required|string'
        ]);

        // If the user submited the wrong certificate_code give back a error
        if (!DB::table('certificate')->where('certificate_code', $request->certificate_code)->exists()) {
            return back()->withErrors(['certificate_code' => 'Verkeerde certificaat code']);
        }
        PendingUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password)
        ]);

        DB::table('certificate')->where('certificate_code', $request->certificate_code)->delete();


        return redirect('/login')->with('succes', 'login succesfull');
    }
}
