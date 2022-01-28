<?php

namespace App\Actions\User\Role;

use Lorisleiva\Actions\Concerns\AsObject;
use Spatie\Permission\Models\Role;

final class UpdateRole
{
    use AsObject;

    public function handle(int $id, array $params): Role
    {
        $role = GetSoleRole::run($id);
        $role->fill($params);
        $role->save();

        return $role;
    }
}
