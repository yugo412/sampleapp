<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class GetSoleUser
{
    use AsObject;

    /**
     * @param integer $id
     * @return User
     */
    public function handle(int $id): User
    {
        return User::whereUserId($id)->sole();
    }
}
