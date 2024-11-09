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
 * @property int|null $endpoint
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static Builder<static>|Provider newModelQuery()
 * @method static Builder<static>|Provider newQuery()
 * @method static Builder<static>|Provider onlyTrashed()
 * @method static Builder<static>|Provider query()
 * @method static Builder<static>|Provider whereCreatedAt($value)
 * @method static Builder<static>|Provider whereDeletedAt($value)
 * @method static Builder<static>|Provider whereEndpoint($value)
 * @method static Builder<static>|Provider whereId($value)
 * @method static Builder<static>|Provider whereName($value)
 * @method static Builder<static>|Provider whereUpdatedAt($value)
 * @method static Builder<static>|Provider withTrashed()
 * @method static Builder<static>|Provider withoutTrashed()
 * @mixin \Eloquent
 */
class Provider extends Model
{
    use SoftDeletes;

    protected $table = 'provider';
    protected $fillable
                     = [
            'id',
            'name',
            'endpoint',
        ];
}
