<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, SpatiePermission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutRole($roles, $guard = null)
 *
 * @mixin \Eloquent
 */
class Permission extends SpatiePermission
{
    use HasFactory;

    const CAN_CREATE_TEAM = 'Create Team';

    const CAN_VIEW_TEAM = 'View Team';

    const CAN_UPDATE_TEAM = 'Update Team';

    const CAN_ASSIGN_TEAM_MEMBER = 'Assign Team Member';

    const CAN_DELETE_TEAM = 'Delete Team';

    const CAN_CREATE_CLIENT = 'Create Client';

    const CAN_VIEW_CLIENT = 'View Client';

    const CAN_UPDATE_CLIENT = 'Update Client';

    const CAN_DELETE_CLIENT = 'Delete Admin';

    const CAN_CREATE_PROJECT = 'Create Project';

    const CAN_VIEW_PROJECT = 'View Project';

    const CAN_UPDATE_PROJECT = 'Update Project';

    const CAN_DELETE_PROJECT = 'Delete Project';

    const CAN_CREATE_STRUCTURE = 'Create Structure';

    const CAN_VIEW_STRUCTURE = 'View Structure';

    const CAN_UPDATE_STRUCTURE = 'Update Structure';

    const CAN_DELETE_STRUCTURE = 'Delete Structure';

    const CAN_CREATE_SENSOR = 'Create Sensor';

    const CAN_VIEW_SENSOR = 'View Sensor';

    const CAN_UPDATE_SENSOR = 'Update Sensor';

    const CAN_DELETE_SENSOR = 'Delete Sensor';

    const SUPER_ADMIN = 'Super Admin';
}
