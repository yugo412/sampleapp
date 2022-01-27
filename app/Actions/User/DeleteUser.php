<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class DeleteUser
{
    use AsObject;

    /**
     * @param integer $id
     * @return User
     */
    public function handle(int $id): User
    {
        $user = GetSoleUser::run($id);
        $user->delete();

        return $user;
    }
}
