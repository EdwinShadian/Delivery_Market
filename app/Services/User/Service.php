<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function update(User $user, $data)
    {
        $data['password'] = Hash::make($data['password']);

        $user->update($data);
    }

    public function store($data)
    {
        User::create([
            'role_id' => $data['role_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
