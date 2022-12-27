<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evidence\Evidence;

/**
 * Class EvidenceAppearance
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int evidance_id
 * @property int decision_id
 * @property date decision_date
 * @property int storage_location_id
 * @property int staff_id
 * @property string doc_number
 * @property date doc_date
 * @property string created_at
 * @property string updated_at
 */
class EvidenceTraffic extends Model
{
    protected $table = 'evidence_traffics';

    protected $fillable = [
        'evidence_id',
        'decision_id',
        'decision_date',
        'storage_location_id',
        'staff_id',
        'doc_number',
        'doc_date',
    ];

    public function evidence()
    {
        return $this->belongsTo(Evidence::class);
    }
}
