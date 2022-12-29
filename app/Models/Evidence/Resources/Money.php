<?php

namespace App\Models\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Money
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property double amount
 * @property string created_at
 * @property string updated_at
 */
class Money extends Model
{
    use HasFactory;

    protected $table = 'moneys';

    protected $fillable = [
        'name',
        'amount',
    ];

    public function evidence(): MorphOne
    {
        return $this->morphOne(Evidence::class, 'resource', 'resource_type', 'resource_id');
    }
}
