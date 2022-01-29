<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class DeleteUser
{
    use AsObject;

    /**
     * @param integer $id
     * @param boolean $permanent
     * @return User
     */
    public function handle(int $id, bool $permanent = false): User
    {
        $user = GetSoleUser::run($id);
        if ($permanent === true) {
            $user->forceDelete();
        } else {
            $user->delete();
        } 

        return $user;
    }
}
