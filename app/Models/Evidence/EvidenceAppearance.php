<?php

namespace App\Models\Evidence;

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
        'evidance_id',
        'appearance_id',
        'condition',
    ];
}
