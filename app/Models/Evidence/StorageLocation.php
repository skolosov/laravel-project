<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evidence\Resources\Evidence;

/**
 * Class StorageLocation
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 * @property int division_id
 * @property string created_at
 * @property string updated_at
 */
class StorageLocation extends Model
{
    use HasFactory;

    protected $table = 'storage_locations';

    protected $fillable = [
        'name',
        'division_id',
    ];

    public function evidences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Evidence::class, 'storage_location_id', 'id');
    }

    public function division(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Division::class,'division_id','id');
    }

    public function evidenceTrafficsFrom(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EvidenceTraffic::class, 'from_storage_id', 'id');
    }

    public function evidenceTrafficsTo(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EvidenceTraffic::class, 'to_storage_id', 'id');
    }
}
