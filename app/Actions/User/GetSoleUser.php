<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Lorisleiva\Actions\Concerns\AsObject;

final class GetSoleUser
{
    use AsObject;

    /**
     * @param integer $id
     * @param boolean $inTrash
     * @return User
     */
    public function handle(int $id, bool $inTrash = false): User
    {
        return User::whereId($id)
            ->when($inTrash, fn(Builder $builder) => $builder->withTrashed())
            ->sole();
    }
}
