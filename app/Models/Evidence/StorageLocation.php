<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Division;

/**
 * Class EvidenceAppearance
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int evidence_id
 * @property string name
 * @property int division_id
 * @property string created_at
 * @property string updated_at
 */
class StorageLocation extends Model
{
    protected $table = 'storage_locations';

    protected $fillable = [
        'evidence_id',
        'name',
        'division_id',
    ];

//    public function evidence(): MorphOne
//    {
//        return $this->morphOne(Evidence::class, 'storage_location',  'evidence_id');
//    }
    public function evidences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Resources\Evidence::class, 'id', 'evidence_id');
    }

    public function division(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
//        return $this->morphOne(Evidence::class, 'resource', 'resource_type', 'resource_id');
        return $this->belongsTo(Division::class);
//        return $this->hasOne('Division','id','division_id');
    }
}
