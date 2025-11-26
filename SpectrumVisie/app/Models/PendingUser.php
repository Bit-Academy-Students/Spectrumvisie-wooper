<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;

class PendingUser extends Model
{
    protected $table = 'users_pending';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    // make password hidden so it doesnt get exposed when using things like "return PendingUser::all()"

    protected $hidden = [
        'password',
    ];


    public function roles()
    {
        //Put role_id behind it becouse of the way laravel checks for fk
        //it checks the name of the model and searches for model namd + id but the db is named roles
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
