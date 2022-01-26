<?php

namespace App\Actions\Account;

use App\Events\User\TokenCreated;
use Illuminate\Foundation\Auth\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class CreateToken
{
    use AsObject;

    /**
     * @param User $user
     * @param array $params
     * @return User
     */
    public function handle(User $user, array $params): User
    {
        $user->createToken($params['name']);

        event(new TokenCreated($user));

        return $user;
    }
}
