<?php

namespace App\Models\Evidence;

use App\Models\Evidence\Resources\Evidence;
use Illuminate\Database\Eloquent\Model;
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

    public function evidences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Evidence::class, 'evidence_id', 'id');
    }

    public function appearance(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Appearance::class,'appearance_id','id');
    }
}
