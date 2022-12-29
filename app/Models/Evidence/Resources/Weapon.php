<?php

namespace App\Models\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Weapon
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property string brand
 * @property string series
 * @property string number
 * @property string detail
 * @property string release_date
 * @property string created_at
 * @property string updated_at
 */
class Weapon extends Model
{
    use HasFactory;

    protected $table = 'weapons';

    protected $fillable = [
        'name',
        'brand',
        'series',
        'number',
        'detail',
        'release_date',
    ];

    public function evidence(): MorphOne
    {
        return $this->morphOne(Evidence::class, 'resource', 'resource_type', 'resource_id');
    }
}
