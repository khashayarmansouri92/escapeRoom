<?php

namespace App\Http\Controllers\User;

use App\Traits\User\InteractsWithUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserLoginAction
{
    use InteractsWithUser;
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $token = $this->UserService()->login($request);

        if ($token) {
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
