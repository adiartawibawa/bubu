<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'user']);

        $rolesWithPermissions = '[
            {"name":"super_admin","guard_name":"web","permissions":["view_desa","view_any_desa","create_desa","update_desa","restore_desa","restore_any_desa","replicate_desa","reorder_desa","delete_desa","delete_any_desa","force_delete_desa","force_delete_any_desa","view_kabupaten","view_any_kabupaten","create_kabupaten","update_kabupaten","restore_kabupaten","restore_any_kabupaten","replicate_kabupaten","reorder_kabupaten","delete_kabupaten","delete_any_kabupaten","force_delete_kabupaten","force_delete_any_kabupaten","view_kecamatan","view_any_kecamatan","create_kecamatan","update_kecamatan","restore_kecamatan","restore_any_kecamatan","replicate_kecamatan","reorder_kecamatan","delete_kecamatan","delete_any_kecamatan","force_delete_kecamatan","force_delete_any_kecamatan","view_provinsi","view_any_provinsi","create_provinsi","update_provinsi","restore_provinsi","restore_any_provinsi","replicate_provinsi","reorder_provinsi","delete_provinsi","delete_any_provinsi","force_delete_provinsi","force_delete_any_provinsi","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},
            {"name":"panel_user","guard_name":"web","permissions":[]},
            {"name":"user","guard_name":"web","permissions":[]},
            ]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (!blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (!blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (!blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
