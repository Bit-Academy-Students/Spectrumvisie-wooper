<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountStatusController extends Controller
{
    public function deactivate($id)
    {
        $user = User::FindOrFail($id);

        $user->is_active = false;
        $user->expires_at = null;

        if ($user->save()) {
            return redirect()->back()->with('succes', 'Gebruiker succesvol gedeactiveerd');
        }
    }


    public function activate($id)
    {
        $user = User::FindOrFail($id);

        $user->expires_at = now()->addYear();
        $user->is_active = true;

        if ($user->save()) {
            return redirect()->back()->with('succes', 'Gebruiker succesvol gedeactiveerd');
        }
    }
}
