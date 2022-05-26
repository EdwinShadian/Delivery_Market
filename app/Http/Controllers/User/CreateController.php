<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }
}
