<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Structure
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Structure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Structure withoutTrashed()
 *
 * @property int $project_id
 * @property string|null $street_number
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $country
 * @property-read \App\Models\Project $project
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Structure whereZip($value)
 *
 * @mixin \Eloquent
 */
class Structure extends Model implements HasMedia
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
    ];

    const MEDIA_COLLECTION_LOGO = 'logo';

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_LOGO)->singleFile();
    }
}
