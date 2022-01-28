<?php

namespace App\Actions\User\Role;

use Lorisleiva\Actions\Concerns\AsObject;
use Spatie\Permission\Models\Role;

final class DeleteRole
{
    use AsObject;

    /**
     * @param integer $id
     * @return Role
     */
    public function handle(int $id): Role
    {
        $role = GetSoleRole::run($id);
        $role->delete();

        return $role;
    }
}
