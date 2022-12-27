<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ReferenceType
 * @package App\Models
 *
 * @property integer id
 * @property integer evidence_type_id
 * @property string name
 */
class ReferenceType extends Model
{
    use HasFactory;

    protected $table = 'reference_types';

    protected $fillable = [
        'evidence_type_id',
        'type_name',
    ];

    public $timestamps = false;

    public function evidenceType(): BelongsTo
    {
        return $this->belongsTo(EvidenceType::class, 'evidence_type_id', 'id');
    }

    public function evidenceResources()
    {

    }
}
