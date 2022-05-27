<?php

namespace App\Http\Controllers\User;

use App\Models\Role;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }
}
