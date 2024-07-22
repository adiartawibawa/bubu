<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserAuthScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     * Restrict query results to the authenticated user's records
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) {
            $builder->where('user_id', Auth::id());
        }
    }
}
