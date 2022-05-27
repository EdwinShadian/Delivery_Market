<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('users.index')->with('status', 'User adding successfully!');
    }
}
