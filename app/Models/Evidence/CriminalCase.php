<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvidenceAppearance
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int evidence_id
 * @property string ud_number
 * @property string ud_date
 * @property string created_at
 * @property string updated_at
 */
class CriminalCase extends Model
{
    protected $table = 'criminal_cases';

    protected $fillable = [
        'evidence_id',
        'ud_number',
        'ud_date',
    ];
}
