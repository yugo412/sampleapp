<?php

namespace App\Actions\User\Role;

use Lorisleiva\Actions\Concerns\AsObject;
use Spatie\Permission\Models\Role;

final class CreateRole
{
    use AsObject;

    /**
     * @param string $name
     * @param array $permissions
     * @return Role
     */
    public function handle(string $name, array $permissions = []): Role
    {
        return Role::firstOrCreate(['name' => $name]);
    }
}
