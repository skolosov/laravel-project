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
 * @property string number_ud
 * @property string date_ud
 * @property string created_at
 * @property string updated_at
 */
class CriminalCase extends Model
{
    protected $table = 'criminal_cases';

    protected $fillable = [
        'evidence_id',
        'number_ud',
        'date_ud',
    ];
}
