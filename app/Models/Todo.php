<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $level
 * @property int|null $estimated_duration
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @property int|null $provider_id
 * @method static Builder<static>|Todo newModelQuery()
 * @method static Builder<static>|Todo newQuery()
 * @method static Builder<static>|Todo onlyTrashed()
 * @method static Builder<static>|Todo query()
 * @method static Builder<static>|Todo whereCreatedAt($value)
 * @method static Builder<static>|Todo whereDeletedAt($value)
 * @method static Builder<static>|Todo whereEstimatedDuration($value)
 * @method static Builder<static>|Todo whereId($value)
 * @method static Builder<static>|Todo whereLevel($value)
 * @method static Builder<static>|Todo whereName($value)
 * @method static Builder<static>|Todo whereProviderId($value)
 * @method static Builder<static>|Todo whereUpdatedAt($value)
 * @method static Builder<static>|Todo withTrashed()
 * @method static Builder<static>|Todo withoutTrashed()
 * @mixin \Eloquent
 */
class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todo';
    protected $fillable
                     = [
            'provider_id',
            'name',
            'level',
            'estimated_duration'
        ];
}
