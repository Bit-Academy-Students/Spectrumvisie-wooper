<?php

namespace App\Http\Controllers;

use App\Models\PendingUser;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function ShowAllUsers()
    {
        return PendingUser::all();
    }
}
