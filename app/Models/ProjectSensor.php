<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ProjectSensor
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor query()
 *
 * @property int $id
 * @property int $project_id
 * @property int $sensor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor whereSensorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectSensor whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ProjectSensor extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_sensors';
}
