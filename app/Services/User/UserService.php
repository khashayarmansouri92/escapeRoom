<?php

namespace App\Services\User;

use App\Traits\User\InteractsWithUser;
use Illuminate\Database\Eloquent\Model;

class UserService implements UserServiceInterface
{
    use InteractsWithUser;

    /**
     * @param $request
     * @return Model
     * @throws \Exception
     */
    public function store($request): Model
    {
        return $this->UserRepository()->store($request);
    }

    /**
     * @param $request
     * @return mixed
     * @throws \Exception
     */
    public function login($request)
    {
        return $this->UserRepository()->login($request);
    }
}
