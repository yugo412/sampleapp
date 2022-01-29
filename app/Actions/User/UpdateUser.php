<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class UpdateUser
{
    use AsObject;

    /**
     * @param integer $id
     * @param array $params
     * @return User
     */
    public function handle(int $id, array $params): User
    {
        $user = GetSoleUser::run($id, true);
        $user->fill($params);
        $user->save();

        return $user;
    }
}
