<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(User $user, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->service->update($user, $data);

        return redirect()->back()->with('status', 'User data was changed successfully!');
    }
}
