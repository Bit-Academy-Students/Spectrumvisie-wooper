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

        $user->save;
    }


    public function activate($id)
    {
        $user = User::FindOrFail($id);

        $user->expires_at = now()->addYear();
        $user->is_active = true;

        $user->save;
    }
}
