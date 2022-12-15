<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evidence
 * @package App\Models\Evidence
 *
 * @property int id
 * @property int resource_id
 * @property int resource_type
 * @property string created_at
 * @property string updated_at
 */
class Evidence extends Model
{
    protected $table = 'evidences';

    protected $fillable = [
        'resource_id',
        'resource_type',
    ];
}
