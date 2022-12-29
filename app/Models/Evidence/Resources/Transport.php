<?php

namespace App\Models\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Transport
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property string engine_number
 * @property string registration_number
 * @property string brand
 * @property string color
 * @property string release_date
 * @property string created_at
 * @property string updated_at
 */
class Transport extends Model
{
    use HasFactory;

    protected $table = 'transports';

    protected $fillable = [
        'name',
        'engine_number',
        'registration_number',
        'brand',
        'color',
        'release_date',
    ];

    public function evidence(): MorphOne
    {
        return $this->morphOne(Evidence::class, 'resource', 'resource_type', 'resource_id');
    }
}
