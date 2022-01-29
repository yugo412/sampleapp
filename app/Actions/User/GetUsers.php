<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Lorisleiva\Actions\Concerns\AsObject;

final class GetUsers
{
    use AsObject;

    /**
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function handle(array $filters = []): LengthAwarePaginator
    {
        return User::when(!empty($filters['role']), fn (Builder $builder): Builder => $builder->role($filters['role']))
            ->when(!empty($filters['sort']), fn (Builder $builder): Builder => $builder->sort($filters['sort']))
            ->when(!empty($filters['trashed']), fn (Builder $builder): Builder => $builder->withTrashed())
            ->when(!empty($filters['query']), function (Builder $builder) use ($filters) {
                return $builder->where('name', 'like', "%{$filters['query']}%")
                    ->orWhere('email', 'like', "%{$filters['query']}%");
            })
            ->with('roles')
            ->paginate($filters['limit'] ?? 20);
    }
}
