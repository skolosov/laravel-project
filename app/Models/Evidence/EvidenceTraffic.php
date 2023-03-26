<?php

namespace App\Models\Evidence;

use App\Models\Evidence\Resources\Evidence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EvidenceAppearance
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
}
