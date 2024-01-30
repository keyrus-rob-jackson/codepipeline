<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::whereIn('name', [
            Permission::CAN_VIEW_TEAM,
            Permission::CAN_UPDATE_TEAM,
            Permission::CAN_ASSIGN_TEAM_MEMBER,
            Permission::CAN_CREATE_CLIENT,
            Permission::CAN_VIEW_CLIENT,
            Permission::CAN_UPDATE_CLIENT,
            Permission::CAN_DELETE_CLIENT,
            Permission::CAN_CREATE_PROJECT,
            Permission::CAN_VIEW_PROJECT,
            Permission::CAN_UPDATE_PROJECT,
            Permission::CAN_DELETE_PROJECT,
            Permission::CAN_CREATE_STRUCTURE,
            Permission::CAN_VIEW_STRUCTURE,
            Permission::CAN_UPDATE_STRUCTURE,
            Permission::CAN_DELETE_STRUCTURE,
            Permission::CAN_CREATE_SENSOR,
            Permission::CAN_VIEW_SENSOR,
            Permission::CAN_UPDATE_SENSOR,
            Permission::CAN_DELETE_SENSOR,
        ])->get();
        $roleAdmin = Role::create(['name' => Role::ROLE_ADMIN]);
        $roleAdmin->syncPermissions($adminPermissions);

        $roleSuperAdmin = Role::create(['name' => Role::ROLE_SUPER_ADMIN]);
        $roleSuperAdmin->givePermissionTo(Permission::where('name', Permission::SUPER_ADMIN)->first());

        $staffPermissions = Permission::whereIn('name', [
            Permission::CAN_CREATE_PROJECT,
            Permission::CAN_VIEW_PROJECT,
            Permission::CAN_UPDATE_PROJECT,
            Permission::CAN_DELETE_PROJECT,
            Permission::CAN_CREATE_STRUCTURE,
            Permission::CAN_VIEW_STRUCTURE,
            Permission::CAN_UPDATE_STRUCTURE,
            Permission::CAN_DELETE_STRUCTURE,
            Permission::CAN_CREATE_SENSOR,
            Permission::CAN_VIEW_SENSOR,
            Permission::CAN_UPDATE_SENSOR,
            Permission::CAN_DELETE_SENSOR,
        ])->get();
        $roleStaff = Role::create(['name' => Role::ROLE_STAFF]);
        $roleStaff->syncPermissions($staffPermissions);
    }
}
