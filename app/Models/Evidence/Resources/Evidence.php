<?php

namespace App\Models\Evidence\Resources;

use App\Models\Evidence\EvidenceAppearance;
use App\Models\Evidence\StorageLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Evidence
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int resource_id
 * @property int resource_type
 * @property int storage_location_id
 * @property string created_at
 * @property string updated_at
 *
 * @property BelongsTo $evidenceType
 */
class Evidence extends Model
{
    use HasFactory;

    protected $table = 'evidences';

    protected $fillable = [
        'resource_id',
        'resource_type',
        'storage_location_id'
    ];

    public function resource(): MorphTo
    {
        return $this->morphTo();
    }

    public function storageLocation(): BelongsTo
    {
        return $this->belongsTo(StorageLocation::class,'storage_location_id','id');
    }

    public function evidenceAppearances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EvidenceAppearance::class,'evidence_id','id');
    }
}
