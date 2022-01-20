<?php

namespace App\Actions\Account;

use Illuminate\Foundation\Auth\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class UpdateAccount
{
    use AsObject;

    /**
     * @param User $user
     * @param array $params
     * @return User
     */
    public function handle(User $user, array $params): User
    {
        $user->update($params);

        return $user;
    }
}
