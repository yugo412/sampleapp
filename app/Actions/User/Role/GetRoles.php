<?php

namespace App\Actions\User\Role;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Concerns\AsObject;
use Spatie\Permission\Models\Role;

final class GetRoles
{
    use AsObject;

    /**
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function handle(array $filters = []): LengthAwarePaginator
    {
        return Role::withCount('users')
            ->paginate($filters['limit'] ?? 20);
    }
}
