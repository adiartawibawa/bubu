<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    use ExposesTableToWidgets;

    // Menentukan resource yang digunakan
    protected static string $resource = UserResource::class;

    // Mendefinisikan actions pada header, dalam hal ini hanya ada action untuk membuat user baru
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // Mendapatkan widgets untuk header dari resource
    protected function getHeaderWidgets(): array
    {
        return static::$resource::getWidgets();
    }

    // Mendefinisikan tabs yang akan ditampilkan
    public function getTabs(): array
    {
        $user = auth()->user();

        // Menentukan tabs default
        $tabs = [
            null => Tab::make('All'), // Tab untuk semua user
            'admin' => Tab::make()->query(fn ($query) => $query->with('roles')->whereRelation('roles', 'name', '=', 'admin')), // Tab untuk user dengan role 'admin'
        ];

        // Jika user yang login adalah super admin, tambahkan tab khusus untuk super admin
        if ($user->isSuperAdmin()) {
            $tabs['super admin'] = Tab::make()->query(fn ($query) => $query->with('roles')->whereRelation('roles', 'name', '=', config('filament-shield.super_admin.name')));
        }

        return $tabs;
    }

    // Mendefinisikan query untuk tabel user
    protected function getTableQuery(): Builder
    {
        $user = auth()->user();
        // Mengambil model User dengan relasi 'roles' dan mengecualikan user yang sedang login
        $model = (new (static::$resource::getModel()))->with('roles')->where('id', '!=', auth()->user()->id);

        // Jika user yang login bukan super admin, tambahkan kondisi untuk mengecualikan user dengan role 'super_admin'
        if (!$user->isSuperAdmin()) {
            $model = $model->whereDoesntHave('roles', function ($query) {
                $query->where('name', '=', config('filament-shield.super_admin.name'));
            });
        }

        return $model;
    }
}
