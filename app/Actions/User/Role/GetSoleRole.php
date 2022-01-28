<?php

namespace App\Actions\User\Role;

use Lorisleiva\Actions\Concerns\AsObject;
use Spatie\Permission\Models\Role;

final class GetSoleRole
{
    use AsObject;

    /**
     * @param integer $id
     * @return Role
     */
    public function handle(int $id): Role
    {
        return Role::withCount('users')
            ->whereKey($id)
            ->sole();
    }
}
