<?php

namespace App\Concerns;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToUser
{
    /**
     * Boot the trait
     */
    protected static function bootMultitenantable(): void
    {
        if (auth()->user() && !(auth()->user()->hasRole(['super_admin']))) {

            static::addGlobalScope('user', function (Builder $query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->user()->user_id);
                    // or with a `user` relationship defined:
                    $query->whereBelongsTo(auth()->user()->user);
                }
            });
        }


        static::creating(function (Model $model) {
            if (auth()->check() && !(auth()->user()->hasRole(['super_admin']))) {
                if (empty($model->user_id)) {

                    $userId = auth()->user()?->user_id;

                    if (is_null($userId)) {
                        throw new Exception($model);
                    }

                    // or with a `user` relationship defined:
                    $model->user()->associate($userId);
                }
            }
        });
    }

    /**
     * Relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
