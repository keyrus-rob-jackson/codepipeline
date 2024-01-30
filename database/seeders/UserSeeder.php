<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = Client::create([
            'name' => 'Straam Inc.',
        ]);
        $team = new Team();
        $team->name = 'Straam Inc.';
        $team->client()->associate($client);
        $team->save();

        $this->createSuperAdmin();
        $this->createAdmin($team);
        $this->createStaff($team);
    }

    private function createSuperAdmin(): void
    {
        $user = User::create([
            'first_name' => 'Super Admin',
            'last_name' => 'User',
            'email' => 'superadmin@straamdashboard.com',
            'password' => bcrypt('secret@123'),
            'email_verified_at' => now(),
        ]);

        $role = Role::where('name', Role::ROLE_SUPER_ADMIN)->first();
        $permission = Permission::where('name', Permission::SUPER_ADMIN)->first();
        $user->assignRole($role);
        $user->syncPermissions($permission);
    }

    private function createAdmin(Team $team): void
    {
        $role = Role::where('name', Role::ROLE_ADMIN)->first();
        $permissions = Permission::whereIn('name', [
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

        User::withoutEvents(function () use ($team, $role, $permissions) {
            $user = User::create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@straamdashboard.com',
                'password' => bcrypt('secret@123'),
                'email_verified_at' => now(),
                'current_team_id' => $team->id,
                'client_id' => $team->client->id,
            ]);

            $user->assignRole($role);
            $user->syncPermissions($permissions);
            $team->owner()->associate($user);
            $team->users()->attach($user);
            $team->save();
        });
    }

    private function createStaff(Team $team): void
    {
        $role = Role::where('name', Role::ROLE_STAFF)->first();
        $permissions = Permission::whereIn('name', [
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

        User::withoutEvents(function () use ($team, $role, $permissions) {
            $user = User::create([
                'first_name' => 'Staff',
                'last_name' => 'User',
                'email' => 'staff@straamdashboard.com',
                'password' => bcrypt('secret@123'),
                'email_verified_at' => now(),
                'current_team_id' => $team->id,
                'client_id' => $team->client->id,
            ]);

            $user->assignRole($role);
            $user->syncPermissions($permissions);
            $team->owner()->associate($user);
            $team->users()->attach($user);
            $team->save();
        });
    }
}
