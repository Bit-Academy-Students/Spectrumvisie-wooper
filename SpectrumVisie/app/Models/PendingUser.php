<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{
    protected $table = 'users_pending';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    // make password hidden so it doesnt get exposed when using things like "return PendingUser::all()"

    protected $hidden = [
        'password',
    ];
}
