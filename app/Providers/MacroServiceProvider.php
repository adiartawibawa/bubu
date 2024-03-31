<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blueprint::macro('assignUser', function () {
            return tap(
                $this->foreignUuid('user_id'),
                fn (ForeignIdColumnDefinition $column) =>
                $column
                    ->constrained()
                    ->cascadeOnDelete()
            );
        });

        Blueprint::macro('dropUser', function () {
            $this->dropForeign(['user_id']);
            $this->dropColumn('user_id');

            return $this;
        });
    }
}
