<?php

namespace App\Models\Evidence\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Alcohol
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property int liter
 * @property string created_at
 * @property string updated_at
 */
class Alcohol extends Model
{
    use HasFactory;

    public const MODEL_LABEL = 'Алкоголь';

    protected $table = 'alcohols';

    protected $fillable = [
        'name',
        'liter',
    ];

    public function evidence(): MorphOne
    {
        return $this->morphOne(Evidence::class, 'resource', 'resource_type', 'resource_id');
    }
}
