<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Evidence
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int resource_id
 * @property int resource_type
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
    ];


    protected $with = ['evidenceType'];

    public function evidenceType(): BelongsTo
    {
        return $this->belongsTo(EvidenceType::class, 'resource_type', 'id');
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo($this->evidenceType->model_namespace, 'resource_id', 'id');
    }
}
