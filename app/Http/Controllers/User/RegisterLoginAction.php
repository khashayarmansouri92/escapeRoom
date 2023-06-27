<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRegisterRequest;
use App\Traits\User\InteractsWithUser;
use Illuminate\Http\JsonResponse;

class RegisterLoginAction
{
    use InteractsWithUser;

    /**
     * @param UserRegisterRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function __invoke(UserRegisterRequest $request): JsonResponse
    {
        $user = $this->UserService()->store([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'birthday' => $request->birthday,
        ]);

        $token = $user->createToken('Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }
}
