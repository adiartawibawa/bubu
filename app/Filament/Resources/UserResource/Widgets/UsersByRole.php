<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\Role;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UsersByRole extends BaseWidget
{
    /**
     * Retrieve and return the statistics to be displayed in the widget.
     *
     * @return array
     */
    protected function getStats(): array
    {
        // Get all roles except 'super_admin'
        $roles = Role::where('name', '!=', 'super_admin')->get();
        $stats = [];

        // Iterate through each role to gather user statistics
        foreach ($roles as $role) {
            // Create a query to get users with the current role
            $query = User::role($role->name);

            // Exclude users with 'super_admin' role if the current user is not a super admin
            if (!Auth::user()->isSuperAdmin()) {
                $query->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'super_admin');
                });
            }

            // Add a Stat instance for the current role with the count of users
            $stats[] = Stat::make(Str::upper($role->name) . ' Users', $query->count())
                ->description("Users with role {$role->name}")
                ->descriptionIcon('heroicon-o-shield-check');
        }

        // Return the array of statistics
        return $stats;
    }
}
