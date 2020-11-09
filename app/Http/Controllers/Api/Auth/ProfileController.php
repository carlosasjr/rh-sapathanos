<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Auth\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;

class ProfileController extends Controller
{
    use AuthTrait;

    public function register(StoreUpdateUserFormRequest $request, User $user)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user->create($data);

        return $this->login();
    }

    public function update(StoreUpdateUserFormRequest $request)
    {
        $response = $this->getUser();

        if (!$this->isAuthenticated($response))
            return response()->json([$response['response'], $response['status']]);

        $user = $response['response'];

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->update($data);

        return response()->json($user);
    }
}
