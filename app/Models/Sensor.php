<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Sensor
 *
 * @property int $id
 * @property int $structure_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereStructureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor withoutTrashed()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereName($value)
 *
 * @property int $sturcture_id
 * @property-read \App\Models\Structure|null $structure
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sensor whereSturctureId($value)
 *
 * @mixin \Eloquent
 */
class Sensor extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }
}
