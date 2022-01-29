<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class RestoreUser
{
    use AsObject;

    /**
     * @param integer $id
     * @return User
     */
    public function handle(int $id): User
    {
        $user = GetSoleUser::run($id, true);
        $user->restore();

        return $user;
    }
}
