<?php

namespace App\Actions\Account;

use App\Events\User\AccountDeleted;
use Illuminate\Foundation\Auth\User;
use Lorisleiva\Actions\Concerns\AsObject;

final class DeleteAccountPermanently
{
    use AsObject;

    public function handle(User $user): bool
    {
        $deleted = $user->delete();

        event(new AccountDeleted($user));

        return $deleted;
    }
}
