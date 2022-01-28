<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait FilterSort
{
    /**
     * @param Builder $query
     * @param string|null $sort
     * @return void
     */
    public function scopeSort(Builder $query, ?string $sort = null): void
    {
        $query->when($sort, function ($query) use ($sort) {
            if (Str::contains($sort, ',')) {
                foreach (explode(',', $sort) as $sort) {
                    $this->filterSort($query, trim($sort));
                }
            } else {
                $this->filterSort($query, $sort);
            }
        });
    }

    /**
     * @param Builder $query
     * @param string $sort
     * @return void
     */
    private function filterSort(Builder $query, string $sort): void
    {
        if (Str::startsWith($sort, ['-'])) {
            $query->orderBy(str_replace('-', '', $sort));
        } else {
            $query->orderByDesc($sort);
        }
    }
}
