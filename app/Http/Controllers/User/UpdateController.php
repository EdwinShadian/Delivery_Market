<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->back()->with('status', 'User data was changed successfully!');
    }
}
