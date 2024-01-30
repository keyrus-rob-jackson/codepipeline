<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Structure> $structures
 * @property-read int|null $structures_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project withoutTrashed()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sensor> $sensors
 * @property-read int|null $sensors_count
 * @property int $client_id
 * @property string|null $street_number
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $country
 * @property-read \App\Models\Client $client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereZip($value)
 *
 * @mixin \Eloquent
 */
class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'street_number',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'country',
        'description',
    ];

    const MEDIA_COLLECTION_LOGO = 'logo';

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function structures(): HasMany
    {
        return $this->hasMany(Structure::class);
    }

    public function sensors(): BelongsToMany
    {
        return $this
            ->belongsToMany(Sensor::class, ProjectSensor::class, 'project_id', 'sensor_id')
            ->using(ProjectSensor::class)
            ->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_LOGO)->singleFile();
    }
}
