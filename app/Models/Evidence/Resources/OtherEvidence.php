<?php

namespace App\Models\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class OtherEvidence
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property int quantity
 * @property string unit_name
 * @property double amount
 * @property string number
 * @property string name
 * @property string created_at
 * @property string updated_at
 */
class OtherEvidence extends Model
{
    use HasFactory;

    protected $table = 'other_evidences';

    protected $fillable = [
        'name',
        'quantity',
        'unit_name',
        'amount',
        'number',
        'name',
    ];

    public function evidence(): MorphOne
    {
        return $this->morphOne(Evidence::class, 'resource', 'resource_type', 'resource_id');
    }
}
