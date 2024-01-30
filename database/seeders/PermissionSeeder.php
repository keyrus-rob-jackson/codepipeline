<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            Permission::CAN_CREATE_TEAM,
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
            Permission::SUPER_ADMIN,
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
