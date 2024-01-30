<?php

namespace App\Observers;

use App\Mail\UserInvitedMail;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        $role = $user->role;
        unset($user->role);

        if ($role) {
            $permissions = $role === Role::ROLE_ADMIN ? $this->getAdminPermissions() : $this->getStaffPermissions();
            $permissions = Permission::whereIn('name', $permissions)->get();

            $user->currentTeam()->associate($user->client->team);
            $user->assignRole($role);
            $user->syncPermissions($permissions);

            Mail::to($user->email)->send(new UserInvitedMail($user));
        }
    }

    public function created(User $user): void
    {
        $team = $user->client->team;
        $team->users()->attach($user);
        $team->save();
    }

    private function getAdminPermissions(): array
    {
        return [
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
        ];
    }

    private function getStaffPermissions(): array
    {
        return [
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
        ];
    }
}
