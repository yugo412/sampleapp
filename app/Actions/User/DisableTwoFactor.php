<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class DisableTwoFactor
{
    use AsObject;

    public function handle(int $id): User
    {
        $user = GetSoleUser::run($id);

        $user->fill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
        ]);
        $user->save();

        return $user;
    }
}
