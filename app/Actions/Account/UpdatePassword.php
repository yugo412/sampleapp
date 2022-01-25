<?php

namespace App\Actions\Account;

use App\Events\User\PasswordUpdated;
use Exception;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        try {
            $user->password = Hash::make($password);
            $user->save();

            event(new PasswordUpdated($user));

            Auth::logoutOtherDevices($password);

            return $user;
        } catch (Exception $e) {
            Log::error($e);

            abort(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }
}
