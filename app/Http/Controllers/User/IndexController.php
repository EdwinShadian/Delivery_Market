<?php

namespace App\Http\Controllers\User;

use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
}
