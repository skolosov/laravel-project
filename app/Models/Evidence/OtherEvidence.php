<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OtherEvidence
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int type
 * @property int quantity
 * @property string unit_name
 * @property double amount
 * @property string number
 * @property string name
 * @property string created_at
 * @property string updated_at
 */
class OtherEvidence extends Model
{
    protected $table = 'other_evidences';

    protected $fillable = [
        'type',
        'quantity',
        'unit_name',
        'amount',
        'number',
        'name',
    ];
}
