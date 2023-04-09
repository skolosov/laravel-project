<?php

namespace App\Models\Evidence;

use App\Models\Evidence\Resources\Evidence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EvidenceTraffic
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int evidence_id
 * @property int decision_id
 * @property string decision_date
 * @property int from_storage_id
 * @property int to_storage_id
 * @property boolean delivered
 * @property int employee_id
 * @property string doc_number
 * @property string doc_date
 * @property string created_at
 * @property string updated_at
 */

class EvidenceTraffic extends Model
{
    use HasFactory;

    protected $table = 'evidence_traffic';

    protected $fillable = [
        'evidence_id',
        'decision_id',
        'decision_date',
        'from_storage_id',
        'to_storage_id',
        'delivered',
        'employee_id',
        'doc_number',
        'doc_date',
    ];

    public function evidence(): BelongsTo
    {
       return $this->belongsTo(Evidence::class,'evidence_id','id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function fromStorage(): BelongsTo
    {
        return $this->belongsTo(StorageLocation::class,'from_storage_id','id');
    }

    public function toStorage(): BelongsTo
    {
        return $this->belongsTo(StorageLocation::class,'to_storage_id','id');
    }
}
