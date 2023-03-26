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
 * @property int appearance_id
 * @property string condition
 * @property string created_at
 * @property string updated_at
 */
class EvidenceAppearance extends Model
{
    protected $table = 'evidence_appearances';

    protected $fillable = [
        'evidence_id',
        'appearance_id',
        'condition',
    ];

    public function evidence(): BelongsTo
    {
        return $this->belongsTo(Evidence::class,'evidence_id','id');
    }

    public function appearance(): BelongsTo
    {
        return $this->belongsTo(Appearance::class,'appearance_id','id');
    }
}
