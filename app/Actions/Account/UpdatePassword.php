<?php

namespace App\Actions\Account;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsObject;

final class UpdatePassword
{
    use AsObject;

    /**
     * @param User $user
     * @param string $password
     * @return User
     */
    public function handle(User $user, string $password): User
    {
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }
}
