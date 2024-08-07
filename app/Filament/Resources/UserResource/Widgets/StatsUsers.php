<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Filament\Resources\UserResource\Pages\ListUsers;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsUsers extends BaseWidget
{
    use InteractsWithPageTable;

    /**
     * Define the page that the widget will interact with.
     *
     * @return string
     */
    protected function getTablePage(): string
    {
        return ListUsers::class;
    }

    /**
     * Retrieve the statistics to be displayed in the widget.
     *
     * @return array
     */
    protected function getStats(): array
    {
        return [
            $this->registeredUser(),
            $this->verifiedUser()
        ];
    }

    /**
     * Calculate and return the statistics for registered users.
     *
     * @return Stat
     */
    private function registeredUser()
    {
        // Get the query for the page table
        $query = $this->getPageTableQuery();

        // Count the total number of users
        $totalUsersCount = $query->count();

        // Retrieve and format the creation dates of users
        $usersByDate = $query->select('created_at')->get();
        $formattedData = $usersByDate->map(function ($user) {
            return $user->created_at->format('Y-m-d'); // Format date to 'Y-m-d'
        });

        // Count users grouped by their creation date
        $groupedByDate = $formattedData->countBy();

        // Create a Stat instance for total users
        return Stat::make('Total Users', $totalUsersCount)
            ->description('Total users in the system')
            ->descriptionIcon('heroicon-o-users')
            ->chart($groupedByDate->toArray()) // Convert data to array for the chart
            ->color('info');
    }

    /**
     * Calculate and return the statistics for verified users.
     *
     * @return Stat
     */
    private function verifiedUser()
    {
        // Get the query for the page table
        $query = $this->getPageTableQuery();

        // Count the number of verified users
        $verifiedUsersCount = $query->whereNotNull('email_verified_at')->count();

        // Retrieve and format the verification dates of users
        $usersVerifByDate = $query->select('email_verified_at')->whereNotNull('email_verified_at')->get();
        $formattedData = $usersVerifByDate->map(function ($user) {
            return $user->email_verified_at->format('Y-m-d'); // Format date to 'Y-m-d'
        });

        // Count users grouped by their verification date
        $groupedByDate = $formattedData->countBy();

        // Create a Stat instance for verified users
        return Stat::make('Verified Users', $verifiedUsersCount)
            ->description('Users who have verified their email')
            ->descriptionIcon('heroicon-o-check-circle')
            ->chart($groupedByDate->toArray()) // Convert data to array for the chart
            ->color('info');
    }
}
