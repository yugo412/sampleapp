<?php

namespace App\Actions\Account;

use App\Events\User\AccountUpdated;
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

        event(new AccountUpdated($user));

        return $user;
    }
}
