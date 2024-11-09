<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Developer
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $level
 * @property int|null $weekly_work_limit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static Builder<static>|Developer newModelQuery()
 * @method static Builder<static>|Developer newQuery()
 * @method static Builder<static>|Developer onlyTrashed()
 * @method static Builder<static>|Developer query()
 * @method static Builder<static>|Developer whereCreatedAt($value)
 * @method static Builder<static>|Developer whereDeletedAt($value)
 * @method static Builder<static>|Developer whereId($value)
 * @method static Builder<static>|Developer whereLevel($value)
 * @method static Builder<static>|Developer whereName($value)
 * @method static Builder<static>|Developer whereUpdatedAt($value)
 * @method static Builder<static>|Developer whereWeeklyWorkLimit($value)
 * @method static Builder<static>|Developer withTrashed()
 * @method static Builder<static>|Developer withoutTrashed()
 * @mixin Eloquent
 */
class Developer extends Model
{
    use SoftDeletes;

    protected $table      = 'developer';
    protected $primaryKey = 'id';

    protected $fillable
        = [
            'id',
            'name',
            'level',
            'weekly_work_limit'
        ];
}
