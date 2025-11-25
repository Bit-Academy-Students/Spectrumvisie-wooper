<?php

namespace App\Http\Controllers;

use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function ShowAllPendingUsers()
    {
        return PendingUser::all();
    }

    public function AcceptUser($id)
    {
        $pending = PendingUser::findOrFail($id);

        $user = User::Create([
            'name' => $pending->name,
            'email' => $pending->email,
            'password' => $pending->password,
            'role' => $pending->role
        ]);

        $pending->delete();
        return redirect()->back()->with('success', "Je hebt {$pending->name} geregistreerd");
    }
}
