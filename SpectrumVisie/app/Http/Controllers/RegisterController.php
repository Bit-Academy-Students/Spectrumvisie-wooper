<?php

namespace App\Http\Controllers;

use App\Models\PendingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;

class RegisterController extends Controller
{

    public function ShowRole()
    {
        return Roles::all();
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email|unique:users_pending,email',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ]);


        PendingUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/register')->with('succes', 'login succesfull');
    }
}
