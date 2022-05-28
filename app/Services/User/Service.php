<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    /**
     * @param User $user
     * @param $data
     * @return void
     */
    public function update(User $user, $data): void
    {
        $data['password'] = Hash::make($data['password']);

        $user->update($data);
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data): void
    {
        User::create([
            'role_id' => $data['role_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
