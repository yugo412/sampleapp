<?php

namespace App\Actions\User\Permission;

use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsObject;
use Spatie\Permission\Models\Permission;

final class GetPermissions
{
    use AsObject;

    /**
     * @return Collection|null
     */
    public function handle(): ?Collection
    {
        return Permission::all();
    }
}
