<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;

class EditController extends BaseController
{
    public function __invoke(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }
}
