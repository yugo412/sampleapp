<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Concerns\AsObject;

final class GetUsers
{
    use AsObject;

    /**
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function handle(array $filters): LengthAwarePaginator
    {
        return User::paginate($filters['limit'] ?? 20);
    }
}
